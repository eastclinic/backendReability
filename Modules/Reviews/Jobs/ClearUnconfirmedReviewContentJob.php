<?php

namespace Modules\Reviews\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Storage;
use Modules\Reviews\Entities\ReviewContent;
use Modules\Reviews\Services\ContentPreviewService;

class ClearUnconfirmedReviewContentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected ?ReviewContent $content = null;
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

        if(!$this->content ) return;
        //if content already remove return
        if(!$nowContent = ReviewContent::where('id', $this->content->id)->where('confirm', 0)->first())return;
        //clear original file

        Storage::disk('reviewContent')->delete($nowContent->file);
        //clear previews files
        (new ContentPreviewService($nowContent))->removePreviews();
        $nowContent->delete();
        //
    }
}
