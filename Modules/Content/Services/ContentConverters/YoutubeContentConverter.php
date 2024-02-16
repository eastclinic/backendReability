<?php

namespace Modules\Content\Services\ContentConverters;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Modules\Content\Entities\Content;
use Modules\Content\Jobs\CreateReplicaJob;
use Modules\Content\Services\ContentService;
use Modules\Content\Services\YoutubeDownloaderService;
use YouTube\Exception\YouTubeException;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use App\DataStructures\Content\CreateReplicaContentStructure;

class YoutubeContentConverter extends ContentConverterAbstract
{
    protected string $previewSize = '';
    protected string $previewkey = '';
    public function generateReplicas():bool {
        if( !$this->originalContentId || !$this->key)       return false;
        $originalContent = Content::where('id', $this->originalContentId)->first();
        if(!$originalContent || !$originalContent->id ) return false;
        if($originalContent->typeFile !== 'videoLinkYoutube') {
            return false;
        }
        $downloadLink = 'https://www.youtube.com/watch?v=' . $originalContent->original_file_name;
        $link = '';
        //todo possible extension from youtube can be not equal mp4
        $extension = 'mp4';
        $youtubeService = new YouTubeDownloaderService();
        $thumbnails = null;
        try {
            $downloadOptions = $youtubeService->getDownloadLinks($downloadLink);
            if ($downloadOptions->getAllFormats()) {
                $link = $downloadOptions->getFullHdDownloadLink();
//                $info = $downloadOptions->getInfo();
                $thumbnails = $youtubeService->getThumbnails($originalContent->original_file_name);
            }
        } catch (YouTubeException $e) {
            echo 'Something went wrong: ' . $e->getMessage();
        }

        $disk = (new ContentService())->getStorageDisk();

       $fileFolderMD5 = $filePath =  md5(date('Y-m-d'));

        if (!$disk->exists($fileFolderMD5)) {
            // If the folder in disk doesn't exist, create it
            $disk->makeDirectory($fileFolderMD5);
        }
        $replicaFilename = uniqid().'.'.$extension;
        $replicaFilePath = $fileFolderMD5.DIRECTORY_SEPARATOR.$replicaFilename;

        try {
            // Send GET-request for file download
            $response = (new GuzzleClient([
                'verify' => false // Disable ssl
            ]))->get($link, ['sink' => $disk->path($replicaFilePath)]);

            // check status code response from youtube
            if ($response->getStatusCode() !== 200) {
                //todo send error report to telegram
                Log::error("Произошла ошибка при скачивании файла");
                return false;
            }
            //check content data through data structure
            $replicaFileInfo = new CreateReplicaContentStructure(
                [
                    'file' => $replicaFilePath,
                    'url' => $disk->url($fileFolderMD5.'/'.$replicaFilename),
                    'type' =>$this->key,
                    'typeFile' => 'video',
                    'confirm' => 1,
                    'published' => $originalContent->published,
                    'targetClass' => $originalContent->targetClass,
                    'contentable_type' => $originalContent->contentable_type,
                    'contentable_id' => $originalContent->contentable_id,
                    'parent_id' => $originalContent->id,
                    'mime' => 'video/mp4',

                ]
            );
            $content = Content::create($replicaFileInfo->toArray());
            //handle preview for video
            if($this->previewSize && $thumbnails && isset($thumbnails[$this->previewSize])){
                if($previewStructure = $this->savePreviewFromYouTubeUrl($thumbnails[$this->previewSize], $originalContent)){
                    Content::create($previewStructure->toArray());
                }
            } elseif($originalContent->preview && $originalContent->preview->id && $this->previewConverter && $content && $content->id){
                CreateReplicaJob::dispatch($this->previewConverter->forOriginalContentId($originalContent->preview->id)->asPreviewFor($content->id));
            }
            //run cache update for target class if exists
            $this->handleTargetModelCache($originalContent);
            return true;

        } catch (GuzzleException $e) {
            Log::error("Guzzle error during download file from youtube: " . $e->getMessage() );
            return false;
        }

    }

    protected function savePreviewFromYouTubeUrl( string $imageUrl, Content $originalContent):?CreateReplicaContentStructure{
        // Make an HTTP request to fetch the image
        $response = Http::withoutVerifying()->get($imageUrl);
        if (!$response->successful()) return null; //<<<<<<<<<<<<<<<<<<<<
        // Get the image content
        $preview = $response->body();
        $contentService = new ContentService();
        // Extract file extension
        $extension = pathinfo($imageUrl, PATHINFO_EXTENSION);
        $previewFilename = uniqid().'.'.$extension;
        $filePath =  md5(date('Y-m-d'));
        $disk = $contentService->getStorageDisk();
        $previewFile = $filePath.DIRECTORY_SEPARATOR.$previewFilename;
        $disk->put( $previewFile, $preview );
        return new CreateReplicaContentStructure(
            [
                'file' => $previewFile,
                'url' => $disk->url($previewFile),
                'type' =>($this->previewkey) ?? $this->previewSize,
                'typeFile' => $contentService->getFileType($previewFile),
                'confirm' => 1,
                'published' => $originalContent->published,
                'targetClass' => $originalContent->targetClass,
                'contentable_type' => $originalContent->contentable_type,
                'contentable_id' => $originalContent->contentable_id,
                'parent_id' => $originalContent->id,
                'is_preview_for'=>($this->parentReplicaId) ?? '',
                'mime' => $contentService->getMime($previewFile),
            ]
        );
    }

    public function getPossibleOriginalType(): string {
        return 'videoLinkYoutube';
    }


    public function withPreviewMax(string $customKey = ''):self    {
        $this->previewSize = 'maxres';
        if($customKey) $this->previewkey = $customKey;
        return $this;
    }

    public function withPreviewStandard(string $customKey = ''):self    {
        $this->previewSize = 'standard';
        if($customKey) $this->previewkey = $customKey;
        return $this;
    }

    public function withPreviewHigh(string $customKey = ''):self    {
        $this->previewSize = 'high';
        if($customKey) $this->previewkey = $customKey;
        return $this;
    }

    public function withPreviewMedium(string $customKey = ''):self    {
        $this->previewSize = 'medium';
        if($customKey) $this->previewkey = $customKey;
        return $this;
    }

    public function withPreviewDefault(string $customKey = ''):self    {
        $this->previewSize = 'default';
        if($customKey) $this->previewkey = $customKey;
        return $this;
    }
}
