<?php


namespace Modules\Reviews\Services;


use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Filesystem\Filesystem;
//use Intervention\Image\Image;
//use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic as Image;
use Modules\Reviews\Entities\ReviewContent;
use function Symfony\Component\Finder\name;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;

class ImagePreviewsService extends PreviewsServiceAbstract
{
    public ?ReviewContent $content = null;
    protected ?string $modelContent = null;
    protected string $extension = '';
    protected string $type = '';
    protected ?string $fileOriginal = '';
    protected ?int $width = null;
    protected ?int $height = null;
    protected ?Filesystem $storage = null;


    public function generatePreviews():bool {
        if( !$this->modelContent )       return false;
        try {
            //again get content from db, because info possible change
            $content = ReviewContent::find($this->content->id);
            $filePath = (new ReviewContentStorage())->forContent($content)->storageFolderForFile($content->file);
            if( !$content || !file_exists($filePath)) return false;
            $fileInfo= pathinfo($content->file);
            $originalFileName = $fileInfo['filename'];
            $originalFileExtension = mb_strtolower($fileInfo['extension']);
            if(!in_array($originalFileExtension, ["jpg", "png", "jpeg"])) return false;

            $preview = Image::make($filePath)
                ->fit(300, 300)
                ->encode('webp', 100);


            $storageUrl = (new ReviewContentStorage())->forContent($content)->contentUrl('previews');
            $previewFolder = (new ReviewContentStorage())->forContent($content)->contentFolder('previews').DIRECTORY_SEPARATOR.'300x300';



            $previewFilename = $fileInfo['filename'].'.webp';

            $previewFile = $previewFolder.DIRECTORY_SEPARATOR.$previewFilename;
            $previewFileFullPath = (new ReviewContentStorage())->forContent($content)->storageFolderForFile($previewFolder);
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

        }catch (\Exception $e){
            error_log($e->getMessage());
        }
        return true;
    }


    public function forModelClass( string $modelContent ):self     {
        $this->modelContent = $modelContent;
        return $this;
    }

    public function withExtension( string $extension):self     {
        $this->extension = $extension;
        return $this;
    }

    public function withType( string $type ):self     {
        $this->type = $type;
        return $this;
    }
    public function withWidth( int $width ):self     {
        $this->width = $width;
        return $this;
    }
    public function withHeight( int $height ):self     {
        $this->height = $height;
        return $this;
    }
    public function withStorage( Filesystem $storage ):self     {
        $this->storage = $storage;
        return $this;
    }
    public function forFileOriginal( string $fileOriginal ):self     {
        $this->fileOriginal = $fileOriginal;
        return $this;
    }

}
