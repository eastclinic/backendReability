<?php


namespace Modules\Reviews\Services;



use Illuminate\Support\Facades\Storage;
use Modules\Reviews\Entities\ReviewContent;
use Modules\Reviews\Jobs\CreateReviewsPreviewsJob;

class ReviewContentService
{
    public ?ReviewContent $content = null;
    protected string $extension;
    protected string $folder;
    protected string $fileName;
    protected string $url;




    public function saveFileForContent($file, ReviewContent $content):self {

        //if isset id, save to folder with name id
        //if not have id, that save in zero folder
        $this->forFile($file)->forContent($content);
        Storage::disk('reviewContent')->putFileAs((new ReviewContentStorage())->forContent($this->content)->reviewContentFolder('original'), $file, $this->getFileName());


        return $this;

        //todo run job with delay for clear not used reviews content data with files

        return true;

    }

    public function forContent( ReviewContent $content ):self {
        if($this->content)  new \Exception('Already exist ReviewContent');
        $this->content = $content;
        return $this;
    }

    public function forFile( $file ):self {
        $this->extension = $file->getClientOriginalExtension();
        $this->fileName = uniqid().'.'.$this->extension;
        return $this;
    }

    public function getUrl():string {
        if( !$this->content )  new \Exception('Not set ReviewContent');
        return (new ReviewContentStorage())->forContent($this->content)->storageUrl('original/'.$this->getFileName());

    }

    public function getFileName():string {
        if( !$this->fileName ) new \Exception('Not have file name, check it');
        return $this->fileName;
    }

    public function getFolder():string  {
        if( !$this->content ) new \Exception('Not set ReviewContent');
        return (new ReviewContentStorage())->forContent($this->content)->storageFolder('original');
    }

    public function getFileFullPath():string   {
        return $this->getFolder().DIRECTORY_SEPARATOR.$this->fileName;
    }

    public function getFileExtension():string   {
        if( !$this->extension ) new \Exception('Not have file extension, check it');
        return $this->extension;
    }


}
