<?php


namespace Modules\Content\Services\PreviewServices;


use Illuminate\Support\Facades\Storage;
//use Intervention\Image\Image;
//use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic as Image;
use Modules\Reviews\Entities\ReviewContent;
use function Symfony\Component\Finder\name;
use Illuminate\Support\Facades\File;

abstract class PreviewsServiceAbstract
{
    public ?ReviewContent $content = null;

    public function __construct( ?ReviewContent $content = null) {
        $this->content = $content;
    }
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

}
