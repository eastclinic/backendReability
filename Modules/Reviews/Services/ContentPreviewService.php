<?php


namespace Modules\Reviews\Services;


use Illuminate\Support\Facades\Storage;
//use Intervention\Image\Image;
//use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic as Image;
use Modules\Reviews\Entities\ReviewContent;
use function Symfony\Component\Finder\name;

class ContentPreviewService
{
    public ?ReviewContent $content = null;
    protected bool $isCreate = false;
    protected bool $isDestroy = false;

    public function __construct( ?ReviewContent $content = null) {
        $this->content = $content;
    }

    public function generate():self {
        $this->isCreate = true;
        return $this;
    }

    public function destroy():self {
        $this->isDestroy = true;
        return $this;
    }

    public function forContentId($contentId):self {
        $this->contentId = $contentId;
        return $this;
    }

    public function handle():bool {
        if($this->isCreate){
            $this->createPreviews();
        }

        return false;
    }
    protected function createPreviews():bool {
        if( !$this->content )       return false;
        //again get content from db, because info possible change
        $content = ReviewContent::find($this->content->id);
        if( !$content || !file_exists($content->file)) return false;
        $fileInfo= pathinfo($content->file);
        $originalFileName = $fileInfo['filename'];
        $originalFileExtension = mb_strtolower($fileInfo['extension']);
        try {

            switch ($originalFileExtension){
                case 'jpg': case 'png': case 'jpeg':

                $preview = Image::make($content->file)
                    ->fit(300, 300)
                    ->encode('webp', 100);



                $storageUrl = (new ReviewContentStorage())->forContent($content)->storageUrl('previews');
                $previewFolder = (new ReviewContentStorage())->forContent($content)->storageFolder('previews').DIRECTORY_SEPARATOR.'300x300';



                $previewFilename = $fileInfo['filename'].'.webp';

                $previewFile = $previewFolder.DIRECTORY_SEPARATOR.$previewFilename;
                $previewFileUrl = $storageUrl.'/300x300/'.$previewFilename;
//                Storage::disk('reviewContent')->putFileAs((new ReviewContentStorage())->forContent($content)->reviewContentFolder('previews'), (string)$preview, $previewFilename);

                if (!is_dir($previewFolder)) {
                    mkdir($previewFolder, 666, true);
                }
                $preview->save($previewFile);
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

}
