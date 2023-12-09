<?php

namespace Modules\Reviews\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Content\Services\ContentConverters\ContentConverterAbstract;

class CreatePreviewJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected ContentConverterAbstract $previewService;

    /**
     * CreatePreviewJob constructor.
     * @param ContentConverterAbstract $previewService
     */
    public function __construct(ContentConverterAbstract $previewService)
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
