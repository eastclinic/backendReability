<?php

namespace Modules\Reviews\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Storage;
use Modules\Reviews\Entities\ReviewContent;
use Modules\Reviews\Services\ImagePreviewsService;
use Modules\Reviews\Services\ReviewContentService;

class ClearUnconfirmedContentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected ?ReviewContentService $contentService = null;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ReviewContentService $content)
    {
        $this->contentService = $content;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $this->contentService->remove();

        //
    }
}
