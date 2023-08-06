<?php

namespace Modules\Reviews\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Reviews\Entities\ReviewContent;

class HandleReviewsContentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected array $passibleFileExtension = ['jpg' => 'photo', 'png' => 'photo', 'jpeg' => 'photo', 'avi' => 'video'];
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

        if(!$this->content->file_extension || !$fileType = $passibleFileExtension[$this->content->file_extension]){
            return;
        }

        switch ($fileType){
            case 'photo':
                $img = Image::make($this->content->file);
// resize the image to a width of 300 and constrain aspect ratio (auto height)
                $img->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbnail->save(Storage::path('/public/image/news/').'thumbnail/'.$filename);

                break;
        }




        error_log('HandleReviewsContentJob !!!');
    }
}
