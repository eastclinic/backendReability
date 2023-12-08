<?php


namespace Modules\Content\Services\PreviewServices;


use Illuminate\Support\Facades\Storage;
//use Intervention\Image\Image;
//use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic as Image;
use Modules\Content\Entities\Content;
use Modules\Reviews\Entities\ReviewContent;
use function Symfony\Component\Finder\name;
use Illuminate\Support\Facades\File;

abstract class PreviewsServiceAbstract
{
    protected string|null $originalContentId = null;
    protected string|null $previewId = null;
    protected string $extensionPreview = '';
    protected string $key = '';
//    protected ?string $fileOriginal = '';
    protected ?int $width = null;
    protected ?int $height = null;
    protected int $quality = 100;
    public ?self $bannerPreviewService = null;
    abstract public function generatePreviews();
    abstract public function getPossibleOriginalType();


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

    public function confirmPreviewsByContentIds(array $contentIds):bool     {
        if(!$previews = ReviewContent::whereIn('parent_content_id',$contentIds)->get())  return true;
        foreach ($previews as $preview){
            $preview->update(['confirm' => 1]);
        }
        return true;
    }




//    public function forOriginalContent( Content $originalContent ):self     {
//        $this->originalContent = $originalContent;
//        return $this;
//    }

    public function forOriginalContentId( string $id ):self     {
        $this->originalContentId = $id;
        return $this;
    }

    public function forPreviewId( string $id):self    {
        $this->previewId = $id;
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



}
