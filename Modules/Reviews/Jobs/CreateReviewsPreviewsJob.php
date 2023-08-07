<?php

namespace Modules\Reviews\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Storage;
use Modules\Reviews\Entities\ReviewContent;
use Image;

class CreateReviewsPreviewsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected ReviewContent $content;



    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ReviewContent $content)
    {
        $this->content = $content;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //check type content
        if( !$this->content->file_extension || !$this->content->file_name)       return;
        //$filePath = str_replace($this->content->file_name);

        $storageFolder = Storage::disk('reviewContent')->path('').'reviews'.DIRECTORY_SEPARATOR.$this->content->review_id;
        $storageUrl = Storage::disk('reviewContent')->url('').'reviews/'.$this->content->review_id;



        try {

        switch ($this->content->file_extension){
            case 'jpg': case 'png': case 'jpeg':

    $preview = Image::make($this->content->file)
                    ->encode('webp', 100)
                    ->fit(300, 300);


                $previewFolder = $storageFolder.DIRECTORY_SEPARATOR.'300x300';
                $previewFilename = str_replace($this->content->file_extension, '', $this->content->file_name).'webp';
                $previewFile = $previewFolder.DIRECTORY_SEPARATOR.$previewFilename;
                $previewFileUrl = $storageUrl.'/300x300/'.$previewFilename;

                $preview->save($previewFilename);
                $reviewContentData  = [
                    'review_id' => $this->content->review_id,
                    'message_id'=> $this->content->message_id,
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



        error_log('HandleReviewsContentJob !!!');
    }

    public function sww()
    {
        return '';
    }
}
