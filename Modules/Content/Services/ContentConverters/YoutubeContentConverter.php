<?php

namespace Modules\Content\Services\ContentConverters;

use Illuminate\Support\Facades\Log;
use Modules\Content\Entities\Content;
use Modules\Content\Services\ContentService;
use Modules\Content\Services\YoutubeDownloaderService;
use YouTube\Exception\YouTubeException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class YoutubeContentConverter extends ContentConverterAbstract
{
    public function generatePreviews() {
        if( !$this->originalContentId || !$this->key)       return false;
        $originalContent = Content::where('id', $this->originalContentId)->first();
        if(!$originalContent || !$originalContent->id ) return false;
        if($originalContent->typeFile !== 'text') {
            Log::info('not image ' . $originalContent->typeFile);
            return false;
        }
        $downloadLink = 'https://www.youtube.com/watch?v=' . str_replace('.txt', '', $originalContent->original_file_name);
        $link = '';
        $info = '';
        $extension = 'mp4';
        $youtube = new YouTubeDownloaderService();

        try {
            $downloadOptions = $youtube->getDownloadLinks($downloadLink);
            if ($downloadOptions->getAllFormats()) {
                $link = $downloadOptions->getFullHdDownloadLink();
                $info = $downloadOptions->getInfo();
            }
        } catch (YouTubeException $e) {
            echo 'Something went wrong: ' . $e->getMessage();
        }
        Log::info('info', (array)$info);
        Log::info('link', (array)$link);
//        return true;
        $contentService = new ContentService();
        $disk = $contentService->getStorageDisk();
        $fileOriginalFullPath = $contentService->getOriginalDisk()->path($originalContent->file);
        if( !file_exists($fileOriginalFullPath) ) {
            throw new \Exception('Not exists original file');
        }
        $fileInfo= pathinfo($originalContent->file);
        $originalFileExtension = mb_strtolower($fileInfo['extension']);
        $originalFileFolder = $fileInfo['dirname'];

        $client = new Client([
            'verify' => false // Отключаем проверку SSL-сертификата
        ]); // Создаем экземпляр клиента GuzzleHttp

        Log::info('$fileInfo', (array)$fileInfo);
        Log::info('$fileOriginalFullPath', (array)$fileOriginalFullPath);
        Log::info('$originalFileExtension', (array)$originalFileExtension);
        try {
            // Отправляем GET-запрос для скачивания файла
            $response = $client->get($link, ['sink' => str_replace($originalFileExtension, $extension, $fileOriginalFullPath)]);

            // Проверяем статус ответа
            if ($response->getStatusCode() === 200) {
                Log::info("Файл успешно скачан и сохранен по пути: $originalFileFolder");
            } else {
                Log::error("Произошла ошибка при скачивании файла");
                return false;
            }
        } catch (GuzzleException $e) {
            Log::error("Произошла ошибка: " . $e->getMessage() );
            return false;
        }
//        Log::info('response', (array)$response);
        return false;
        $previewFileInfo = new CreatePreviewContentStructure(
            [
                'file' => $previewFileFullPath,
                'url' => $disk->url($previewFileFullUrl),
                'type' =>$this->key,
                'typeFile' => 'mp4',
                'confirm' => 1,
                'published' => $originalContent->published,
                'targetClass' => $originalContent->targetClass,
                'contentable_type' => $originalContent->contentable_type,
                'contentable_id' => $originalContent->contentable_id,
                'parent_id' => $originalContent->id,
                'mime' => $contentService->getMime($previewFilename),

            ]
        );

        return false;
    }

    public function getPossibleOriginalType(): string {
        return 'text';
    }
}
