<?php


namespace Modules\Reviews\Services;


use Illuminate\Support\Facades\Storage;
//use Intervention\Image\Image;
//use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic as Image;
use Modules\Reviews\Entities\ReviewContent;

class PreviewFileService
{
    public ?string $contentId = null;
    public function forContentId($contentId):self {
        $this->contentId = $contentId;
        return $this;
    }

    public function handle():bool {
        if( !$this->contentId )       return false;
        $content = ReviewContent::find($this->contentId);
        if( !$content ) return false;

        $storageFolder = (new ReviewContentStorage())->forContent($content)->storageFolder('previews');
        $storageUrl = (new ReviewContentStorage())->forContent($content)->storageUrl('previews');



        try {

            switch ($content->file_extension){
                case 'jpg': case 'png': case 'jpeg':

                $preview = Image::make($content->file)
                    ->encode('webp', 100)
                    ->fit(300, 300);


                $previewFolder = $storageFolder.DIRECTORY_SEPARATOR.'300x300';
                $previewFilename = str_replace($content->file_extension, '', $content->file_name).'webp';
                $previewFile = $previewFolder.DIRECTORY_SEPARATOR.$previewFilename;
                $previewFileUrl = $storageUrl.'/300x300/'.$previewFilename;

                $preview->save($previewFilename);
                $reviewContentData  = [
                    'review_id' => $content->review_id,
                    'message_id'=> $content->message_id,
                    'file_name'=> $previewFilename,
                    'file_extension'=> 'webp',
                    'file' => $previewFile,
                    'url' => $previewFileUrl,

                ];
                $reviewContent = ReviewContent::create($reviewContentData);

                break;
            }
        }catch (\Exception $e){
            error_log($e->getMessage());
        }
        return false;
    }

}
