<?php


namespace Modules\Reviews\Services;


use Illuminate\Support\Facades\Storage;
//use Intervention\Image\Image;
//use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic as Image;
use Modules\Reviews\Entities\ReviewContent;
use function Symfony\Component\Finder\name;
use Illuminate\Support\Facades\File;

class ContentPreviewService
{
    public ?ReviewContent $content = null;

    public function __construct( ?ReviewContent $content = null) {
        $this->content = $content;
    }

    public function generatePreviews():bool {
        if( !$this->content )       return false;
        //again get content from db, because info possible change
        $content = ReviewContent::find($this->content->id);
        $filePath = (new ReviewContentStorage())->forContent($content)->storageFolder($content->file);
        if( !$content || !file_exists($filePath)) return false;
        $fileInfo= pathinfo($content->file);
        $originalFileName = $fileInfo['filename'];
        $originalFileExtension = mb_strtolower($fileInfo['extension']);
        try {

            switch ($originalFileExtension){
                case 'jpg': case 'png': case 'jpeg':

                $preview = Image::make($filePath)
                    ->fit(300, 300)
                    ->encode('webp', 100);



                $storageUrl = (new ReviewContentStorage())->forContent($content)->contentUrl('previews');
                $previewFolder = (new ReviewContentStorage())->forContent($content)->contentFolder('previews').DIRECTORY_SEPARATOR.'300x300';



                $previewFilename = $fileInfo['filename'].'.webp';

                $previewFile = $previewFolder.DIRECTORY_SEPARATOR.$previewFilename;
                $previewFileFullPath = (new ReviewContentStorage())->forContent($content)->storageFolder($previewFolder);
                $previewFileUrl = $storageUrl.'/300x300/'.$previewFilename;
//                Storage::disk('reviewContent')->putFileAs((new ReviewContentStorage())->forContent($content)->reviewContentFolder('previews'), (string)$preview, $previewFilename);

                if (!is_dir($previewFileFullPath)) {
                    mkdir($previewFileFullPath, 666, true);
                }
                $preview->save($previewFileFullPath.DIRECTORY_SEPARATOR.$previewFilename);
                $reviewContentData  = [
                    'review_id' => $content->review_id,
                    'message_id'=> $content->message_id,
                    'parent_content_id' => $content->id,
                    'file' => $previewFile,
                    'url' => $previewFileUrl,
                    'type' => '300x300',
                ];
                ReviewContent::create($reviewContentData);

                break;
            }
        }catch (\Exception $e){
            error_log($e->getMessage());
        }
        return true;
    }

    public function removePreviews():bool {
        if( !$this->content )       return false;
        if(!$previews = ReviewContent::where('parent_content_id', $this->content->id)->get())  return true;
        foreach ($previews as $preview){
            Storage::disk('reviewContent')->delete($preview->file);
            $preview->delete();
        }
//        ReviewContent::where('parent_content_id', $this->content->parent_content_id)->delete();
        return true;
    }

}
