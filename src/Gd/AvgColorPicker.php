<?php

namespace Dobron\AvgColorPicker\Gd;

use Dobron\AvgColorPicker\Contracts\AvgColorPicker as AvgColorPickerContract;

/**
 * Class AvgColorPicker.
 *
 * @package Dobron\AvgColorPicker\Gd
 */
class AvgColorPicker implements AvgColorPickerContract
{
    /**
     * @inheritdoc
     */
    public function getImageAvgHexByPath(string $imagePath): string
    {
        $image = Image::createFromPath($imagePath);

        $hex = $image->getAvgHex();

        unset($image);

        return $hex;
    }

    /**
     * @inheritdoc
     */
    public function getImageAvgRgbByPath(string $imagePath): array
    {
        $image = Image::createFromPath($imagePath);

        $rgb = $image->getAvgRgb();

        unset($image);

        return $rgb;
    }

    /**
     * @inheritdoc
     */
    public function getImageAvgHexByResource(\GdImage $imageResource): string
    {
        $image = Image::createFromResource($imageResource);

        $hex = $image->getAvgHex();

        unset($image);

        return $hex;
    }

    /**
     * @inheritdoc
     */
    public function getImageAvgRgbByResource(\GdImage $imageResource): array
    {
        $image = Image::createFromResource($imageResource);

        $rgb = $image->getAvgRgb();

        unset($image);

        return $rgb;
    }

    /**
     * @inheritdoc
     */
    public function getImageAvgHex(\GdImage|string $image): string
    {
        return $image instanceof \GdImage ? $this->getImageAvgHexByResource($image) : $this->getImageAvgHexByPath($image);
    }

    /**
     * @inheritdoc
     */
    public function getImageAvgRgb(\GdImage|string $image): array
    {
        return $image instanceof \GdImage ? $this->getImageAvgRgbByResource($image) : $this->getImageAvgRgbByPath($image);
    }
}
