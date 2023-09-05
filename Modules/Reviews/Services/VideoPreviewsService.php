<?php


namespace Modules\Reviews\Services;


use Illuminate\Support\Facades\Storage;
//use Intervention\Image\Image;
//use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic as Image;
use Modules\Reviews\Entities\ReviewContent;
use ProtoneMedia\LaravelFFMpeg\Exporters\EncodingException;
use ProtoneMedia\LaravelFFMpeg\Filters\WatermarkFactory;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use function Symfony\Component\Finder\name;
use Illuminate\Support\Facades\File;

class VideoPreviewsService extends PreviewsServiceAbstract
{
    public ?ReviewContent $content = null;


    public function generatePreviews():bool {
        if( !$this->content )       return false;
//again get content from db, because info possible change
        $content = ReviewContent::find($this->content->id);
        $filePath = (new ReviewContentStorage())->forContent($content)->storageFolderForFile($content->file);
        if( !$content || !file_exists($filePath)) return false;
        $fileInfo= pathinfo($content->file);
        $originalFileName = $fileInfo['filename'];
        $originalFileExtension = mb_strtolower($fileInfo['extension']);
        if( $originalFileExtension !== 'mp4' ) return true;

        //https://github.com/protonemedia/laravel-ffmpeg
        try {
echo (new ReviewContentStorage())->forContent($content)->contentFolder('videoPreviews').DIRECTORY_SEPARATOR.$originalFileName.'.webm';
            FFMpeg::fromDisk('reviewContent')
                ->open($content->file)
//                ->addWatermark(function(WatermarkFactory $watermark) {
//                    $watermark->openUrl('https://eastclinic.ru/favicon.png?v=2');
//                })
                ->export()
                ->toDisk('reviewContent')
                ->inFormat(new \FFMpeg\Format\Video\WebM)
                ->resize(1280, 720)
                ->save((new ReviewContentStorage())->forContent($content)->contentFolder('videoPreviews').DIRECTORY_SEPARATOR.$originalFileName.'.webm');

        } catch (EncodingException $exception) {
            $command = $exception->getCommand();
            $errorLog = $exception->getErrorOutput();
        }

        return true;
    }

}
