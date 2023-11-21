<?php


namespace Modules\Content\Services\PreviewServices;


use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Filesystem\Filesystem;
//use Intervention\Image\Image;
//use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic as Image;
use Modules\Content\Entities\Content;
use function Symfony\Component\Finder\name;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;

class ImagePreviewsService extends PreviewsServiceAbstract
{
    protected ?Content $originalContent = null;
    protected string $extensionPreview = '';
    protected string $key = '';
//    protected ?string $fileOriginal = '';
    protected ?int $width = null;
    protected ?int $height = null;
    protected int $quality = 100;
    protected ?Filesystem $storage = null;


    public function generatePreviews():bool {

        $f = get_class($this->originalContent);
        error_log(print_r($f, 1));
        if( !$this->originalContent || !$this->storage || !$this->key)       return false;
        try {
            $fileOriginalFullPath = $this->storage->path($this->originalContent->file);
            if( !file_exists($fileOriginalFullPath) ) {
                throw new \Exception('Not exists original file');
            }
            $fileInfo= pathinfo($this->originalContent->file);
            $originalFileExtension = mb_strtolower($fileInfo['extension']);
            $originalFileFolder = $fileInfo['dirname'];
            if(!in_array($originalFileExtension, ["jpg", "png", "jpeg", 'webp'])) return false;
            $extension = ($this->extensionPreview && in_array($this->extensionPreview, ["jpg", "png", "jpeg", 'webp'])) ? $this->extensionPreview : $originalFileExtension;
            $previewFilename = md5_file($fileOriginalFullPath).'.'.$extension;

            $preview = Image::make($fileOriginalFullPath);

            if($this->width && $this->height) {
                $preview->fit($this->width, $this->height);
            }
            $preview ->encode($extension, $this->quality);

            $previewFile = $originalFileFolder.DIRECTORY_SEPARATOR.$previewFilename;
            $previewFileFullPath = $this->storage->path($previewFile);

            $preview->save( $previewFileFullPath );


//            $this->originalContent
//                ->fill([
//                    'file' => $previewFile,
//                    'url' => $this->storage->url($previewFile),
//                    ])
//                ->save();

        }catch (\Exception $e){
            error_log($e->getMessage());
        }
        return true;
    }


    public function forOriginalContent( Content $originalContent ):self     {
        $this->originalContent = $originalContent;
        return $this;
    }

    public function withExtension( string $extension):self     {
        $this->extensionPreview = $extension;
        return $this;
    }


    public function withSize( int $width, int $height ):self     {
        $this->width = $width;
        $this->height = $height;
        return $this;
    }
    public function forStorage( Filesystem $storage ):self     {
        $this->storage = $storage;
        return $this;
    }
//    public function forFileOriginal( string $fileOriginal ):self     {
//        $this->fileOriginal = $fileOriginal;
//        return $this;
//    }
    public function withQuality( int $quality = 100 ):self     {
        if($quality < 3) return $this; //<<<<<<<<<<<<<
        $this->quality = $quality;
        return $this;
    }

    public function withKey( string $key ):self     {
        $this->key = $key;
        return $this;
    }

    public function getPossibleOriginalType():string  {
        return 'image';
    }

}
