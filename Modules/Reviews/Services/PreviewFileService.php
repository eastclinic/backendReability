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
        if( !$content || !file_exists($content->file)) return false;





        try {

            switch ($content->file_extension){
                case 'jpg': case 'png': case 'jpeg':

                $preview = Image::make($content->file)
                    ->fit(300, 300)
                    ->encode('webp', 100);



                $storageUrl = (new ReviewContentStorage())->forContent($content)->storageUrl('previews');
                $previewFolder = (new ReviewContentStorage())->forContent($content)->storageFolder('previews').DIRECTORY_SEPARATOR.'300x300';
                $previewFilename = str_replace($content->file_extension, '', $content->file_name).'webp';
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
                    'file_name'=> $previewFilename,
                    'file_extension'=> 'webp',
                    'file' => $previewFile,
                    'url' => $previewFileUrl,
                    'preview' => true,
                ];
                error_log(print_r($reviewContentData, 1));
                $reviewContent = ReviewContent::create($reviewContentData);

                break;
            }
        }catch (\Exception $e){
            error_log($e->getMessage());
        }
        return false;
    }

}
