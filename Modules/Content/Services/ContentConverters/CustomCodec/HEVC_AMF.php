<?php

/*
 * This file is part of PHP-FFmpeg.
 *
 * (c) Alchemy <info@alchemy.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Modules\Content\Services\ContentConverters\CustomCodec;
use FFMpeg\Format\Video\DefaultVideo;

/**
 * The HEVC_AMF video format.
 */
class HEVC_AMF extends DefaultVideo
{
    /** @var bool */
    private $bframesSupport = true;

    /** @var int */
    private $passes = 2;

    public function __construct($audioCodec = 'aac', $videoCodec = 'hevc_amf')
    {
        $this
            ->setAudioCodec($audioCodec)
            ->setVideoCodec($videoCodec);
    }

    /**
     * {@inheritDoc}
     */
    public function supportBFrames()
    {
        return $this->bframesSupport;
    }

    /**
     * @param $support
     *
     * @return HEVC_AMF
     */
    public function setBFramesSupport($support)
    {
        $this->bframesSupport = $support;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAvailableAudioCodecs()
    {
        return ['copy', 'aac', 'libvo_aacenc', 'libfaac', 'libmp3lame', 'libfdk_aac'];
    }

    /**
     * {@inheritDoc}
     */
    public function getAvailableVideoCodecs()
    {
        return ['hevc_amf'];
    }

    /**
     * @param $passes
     *
     * @return HEVC_AMF
     */
    public function setPasses($passes)
    {
        $this->passes = $passes;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPasses()
    {
        return 0 === $this->getKiloBitrate() ? 1 : $this->passes;
    }

    /**
     * @return int
     */
    public function getModulus()
    {
        return 2;
    }
}
