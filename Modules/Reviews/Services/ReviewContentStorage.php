<?php


namespace Modules\Reviews\Services;


use Illuminate\Support\Facades\Storage;
use Modules\Reviews\Entities\ReviewContent;

class ReviewContentStorage
{

    protected string $storageFolderPath;
    protected string $storageUrlPath;
    protected string $contentFolderPath;

    public function forContent( ReviewContent $content ):self {
        $this->storageFolderPath = Storage::disk('reviewContent')->path($content->review_id);
        $this->storageUrlPath = Storage::disk('reviewContent')->url($content->review_id);
        $this->contentFolderPath = $content->review_id;
        return $this;
    }


    public function storageFolder(string $addPath = ''):string {
        if(!$this->storageFolderPath) new \Exception('Not set content');
        if($addPath) $addPath = DIRECTORY_SEPARATOR.trim($addPath, '/\\');
        return $this->storageFolderPath.$addPath;
        return Storage::disk('reviewContent')->path($addPath);
    }
    public function contentFolder(string $addPath = ''):string {
        if(!$this->contentFolderPath) new \Exception('Not set content');
        if($addPath) $addPath = DIRECTORY_SEPARATOR.trim($addPath, '/\\');
        return $this->contentFolderPath.$addPath;
    }

    public function storageFolderForFile(string $filePath):string {
        return Storage::disk('reviewContent')->path(trim($filePath, '/\\'));
    }

    public function storageUrl(string $addPath = ''):string {
        if(!$this->storageUrlPath) new \Exception('Not set content');
        if($addPath) $addPath = '/'.trim($addPath, '/');
        return $this->storageUrlPath.$addPath;
    }
    public function contentUrl(string $addPath = ''):string {
        if(!$this->storageUrlPath) new \Exception('Not set content');
        if($addPath) $addPath = '/'.trim($addPath, '/');
        return $this->storageUrlPath.$addPath;
    }

}
