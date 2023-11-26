<?php


namespace Modules\Content\Services\PreviewServices;


use App\DataStructures\Content\CreatePreviewContentStructure;
use Illuminate\Support\Facades\Storage;
//use Intervention\Image\Image;
//use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic as Image;
use Modules\Content\Entities\Content;
use Modules\Content\Services\ContentService;
use Modules\Reviews\Entities\ReviewContent;
use ProtoneMedia\LaravelFFMpeg\Exporters\EncodingException;
use ProtoneMedia\LaravelFFMpeg\Filters\WatermarkFactory;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use function Symfony\Component\Finder\name;
use Illuminate\Support\Facades\File;

class VideoPreviewsService extends PreviewsServiceAbstract
{
    public ?ReviewContent $content = null;
    protected array $possibleExtensions = ["mp4", "mov"];
    protected string $extensionPreview = 'webm';
    const EXTENSION_FFMPEG = ['webm' => \FFMpeg\Format\Video\WebM::class];



    public function generatePreviews():bool {
        if( !$this->originalContent || !$this->key)       return false;
        try {
            $contentService = new ContentService();
            $disk = $contentService->getStorageDisk();
            $fileOriginalFullPath = $disk->path($this->originalContent->file);
            if( !file_exists($fileOriginalFullPath) ) {
                throw new \Exception('Not exists original file');
            }
            $fileInfo= pathinfo($this->originalContent->file);
            $originalFileExtension = mb_strtolower($fileInfo['extension']);
            $originalFileFolder = $fileInfo['dirname'];
            if(!in_array($originalFileExtension, $this->possibleExtensions)) return false;
            $extension = ($this->extensionPreview && in_array($this->extensionPreview, $this->possibleExtensions)) ? $this->extensionPreview : $originalFileExtension;
            $previewFilename = md5_file($fileOriginalFullPath).'.'.$extension;
            $previewFile = $originalFileFolder.DIRECTORY_SEPARATOR.$previewFilename;
            $previewFileFullPath = $disk->path($previewFile);
//https://github.com/protonemedia/laravel-ffmpeg
            $ffmpeg = FFMpeg::fromDisk($contentService->diskName())
                ->open($this->originalContent->file)
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
            $ffmpeg->save($previewFileFullPath);

            $previewFileInfo = new CreatePreviewContentStructure(
                [
                    'file' => $previewFile,
                    'url' => $disk->url($previewFile),
                    'type' =>$this->key,
                    'typeFile' => $contentService->getFileType($previewFile),
                    'confirm' => 1,
                    'published' => $this->originalContent->published,
                    'contentable_type' => $this->originalContent->contentable_type,
                    'contentable_id' => $this->originalContent->contentable_id,
                    'parent_id' => $this->originalContent->id,
                    'mime' => $contentService->getMime($previewFile),

                ]
            );
            Content::create($previewFileInfo->toArray());

        }catch (\Throwable $e){
            error_log($e->getMessage());
        }
        return true;
    }


    public function getPossibleOriginalType():string  {
        return 'image';
    }


    protected function getFormat(string $extension ):string   {
        return self::EXTENSION_FFMPEG[$extension];
    }

}
