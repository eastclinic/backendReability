<?php

namespace Modules\Reviews\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Reviews\Services\PreviewFileService;

class CreateReviewsPreviewsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected PreviewFileService $previewService;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(PreviewFileService $previewService)
    {
        $this->previewService = $previewService;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->previewService->handle();
        return;
    }

}
