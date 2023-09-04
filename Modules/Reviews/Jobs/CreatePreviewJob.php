<?php

namespace Modules\Reviews\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Reviews\Services\ImagePreviewsService;
use Modules\Reviews\Services\PreviewsServiceAbstract;

class CreatePreviewJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected PreviewsServiceAbstract $previewService;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(PreviewsServiceAbstract $previewService)
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
        $this->previewService->generatePreviews();
        return;
    }

}
