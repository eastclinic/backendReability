<?php

namespace Modules\Reviews\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Content\Services\PreviewServices\PreviewsServiceAbstract;

class CreatePreviewJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected PreviewsServiceAbstract $previewService;

    /**
     * CreatePreviewJob constructor.
     * @param PreviewsServiceAbstract $previewService
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
