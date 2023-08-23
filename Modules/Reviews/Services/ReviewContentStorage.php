<?php


namespace Modules\Reviews\Services;


use Illuminate\Support\Facades\Storage;
use Modules\Reviews\Entities\ReviewContent;

class ReviewContentStorage
{

    protected string $storageFolderPath;
    protected string $storageUrlPath;
    protected string $reviewContentFolderPath;

    public function forContent( ReviewContent $content ):self {
        $this->storageFolderPath = Storage::disk('reviewContent')->path($content->review_id);
        $this->storageUrlPath = Storage::disk('reviewContent')->url($content->review_id);
        $this->reviewContentFolderPath = $content->review_id;
        return $this;
    }

    public function reviewContentFolder(string $addPath = ''):string {
        if(!$this->reviewContentFolderPath) new \Exception('Not set content');
        if($addPath) $addPath = DIRECTORY_SEPARATOR.trim($addPath, '/\\');
        return $this->reviewContentFolderPath.$addPath;
    }

    public function storageFolder(string $addPath = ''):string {
        if(!$this->storageFolderPath) new \Exception('Not set content');
        if($addPath) $addPath = DIRECTORY_SEPARATOR.trim($addPath, '/\\');
        return $this->storageFolderPath.$addPath;
    }

    public function storageUrl(string $addPath = ''):string {
        if(!$this->storageUrlPath) new \Exception('Not set content');
        if($addPath) $addPath = '/'.trim($addPath, '/');
        return $this->storageUrlPath.$addPath;
    }

}
