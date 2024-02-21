<?php

namespace Modules\Content\Services;
use YouTube\DownloadOptions;
class YoutubeDownloadOptionsService extends DownloadOptions
{
    /**
     * Find fullHD YouTube download link
     * @return string
     */
    public function getFullHdDownloadLink(): string
    {
        $url = '';
        $bitrate = 0;
        $quality = ['hd1080'=>'hd1080','tiny' => 'tiny', 'small' => 'small'];
        $formats = parent::getAllFormats();
        foreach ($formats as $item) {
            if ($item->quality == $quality['hd1080'] && $item->bitrate > $bitrate) {
                $url = $item->url;
                $bitrate = $item->bitrate;
            }
        }
        return $url;
    }
}
