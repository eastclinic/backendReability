<?php


namespace Modules\Content\Services\ContentConverters;


use App\DataStructures\Content\CreatePreviewContentStructure;
use FFMpeg\Format\Video\X264;
use Illuminate\Support\Facades\Storage;
//use Intervention\Image\Image;
//use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic as Image;
use Modules\Content\Entities\Content;
use Modules\Content\Services\ContentService;
use Modules\Reviews\Entities\ReviewContent;
//use Modules\Reviews\Jobs\CreatePreviewJob;
use ProtoneMedia\LaravelFFMpeg\Exporters\EncodingException;
use ProtoneMedia\LaravelFFMpeg\Filters\WatermarkFactory;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use function Symfony\Component\Finder\name;
use Illuminate\Support\Facades\File;

class VideoContentConverter extends ContentConverterAbstract
{
    public ?ReviewContent $content = null;
    protected array $possibleExtensions = ["mp4", "mov", 'webm'];
    protected string $extensionPreview = 'webm';

    const EXTENSION_FFMPEG = [
        'webm' => \FFMpeg\Format\Video\WebM::class,
        'mp4' => X264::class,
        ];



    public function generatePreviews():bool {
        if( !$this->originalContentId || !$this->key)       return false;
        try {

            $contentService = new ContentService();
            //get fresh original and preview content from db
            $originalContent = Content::where('id', $this->originalContentId)->first();

            if(!$originalContent || !$originalContent->id ) return false;
            $disk = $contentService->getStorageDisk();
            $fileOriginalFullPath = $contentService->getOriginalDisk()->path($originalContent->file);
            if( !file_exists($fileOriginalFullPath) ) {
                throw new \Exception('Not exists original file');
            }
            $fileInfo= pathinfo($originalContent->file);
            $originalFileExtension = mb_strtolower($fileInfo['extension']);
            $originalFileFolder = $fileInfo['dirname'];
            if(!in_array($originalFileExtension, $this->possibleExtensions)) return false;
            $extension = ($this->extensionPreview && in_array($this->extensionPreview, $this->possibleExtensions)) ? $this->extensionPreview : $originalFileExtension;
            $previewFilename = md5_file($fileOriginalFullPath).'.'.$extension;
            $previewFileFullPath = $originalFileFolder.DIRECTORY_SEPARATOR.$previewFilename;
            $previewFileFullUrl = $originalFileFolder.DIRECTORY_SEPARATOR.$previewFilename;
//            $previewFileFullPath = $disk->path($previewFile);
//https://github.com/protonemedia/laravel-ffmpeg
            $ffmpeg = FFMpeg::fromDisk($contentService->diskNameOriginal())
                ->open($originalContent->file)
//                ->addWatermark(function(WatermarkFactory $watermark) {
//                    $watermark->openUrl('https://eastclinic.ru/favicon.png?v=2');
//                })
                ->export()
                ->toDisk($contentService->diskName());
            $handler = $this->getFormat($extension);
            $ffmpeg->inFormat(new $handler());
                 if($this->width && $this->height) {
                     $ffmpeg->resize($this->width, $this->height);
                 }
            if (!$disk->exists($originalFileFolder)) {
                // If the folder doesn't exist, create it
                $disk->makeDirectory($originalFileFolder);
            }
            $ffmpeg->save($previewFileFullPath);

            $previewFileInfo = new CreatePreviewContentStructure(
                [
                    'file' => $previewFileFullPath,
                    'url' => $disk->url($previewFileFullUrl),
                    'type' =>$this->key,
                    'typeFile' => $contentService->getFileType($previewFilename),
                    'confirm' => 1,
                    'published' => $originalContent->published,
                    'targetClass' => $originalContent->targetClass,
                    'contentable_type' => $originalContent->contentable_type,
                    'contentable_id' => $originalContent->contentable_id,
                    'parent_id' => $originalContent->id,
                    'mime' => $contentService->getMime($previewFilename),
                    'is_preview_for'=>($this->parentReplicaId) ?? '',
                ]
            );

            Content::create($previewFileInfo->toArray());

        }catch (\Throwable $e){
            error_log($e->getMessage());
        }
        return true;
    }


    public function getPossibleOriginalType():string  {
        return 'video';
    }


    protected function getFormat(string $extension ):string   {
        return self::EXTENSION_FFMPEG[$extension];
    }

    public function withPreview(ContentConverterAbstract $converter):self  {
        $this->previewConverter = $converter;
        return $this;
    }





}
