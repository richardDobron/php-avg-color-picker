<?php

namespace Dobron\AvgColorPicker\Tests\unit\gd;

use Dobron\AvgColorPicker\Exceptions\InvalidArgumentException;
use Dobron\AvgColorPicker\Exceptions\InvalidMimeTypeException;
use Dobron\AvgColorPicker\Gd\Image;
use Dobron\AvgColorPicker\Tests\unit\UnitTestCase;

/**
 * Class GdImageUnitTest.
 */
class GdImageUnitTest extends UnitTestCase
{
    /**
     * @dataProvider invalidMimeTypeImagePathProvider
     * @param string $path
     */
    public function testCreateFromInvalidImagePath(string $path): void
    {
        $this->expectException(InvalidMimeTypeException::class);

        Image::createFromPath($path);
    }

    /**
     * @dataProvider imageInvalidPathProvider
     * @param string $path
     */
    public function testCreateFromImageInvalidPath(string $path): void
    {
        $this->expectException(InvalidArgumentException::class);

        Image::createFromPath($path);
    }

    /**
     * @dataProvider validImageProvider
     * @param \GdImage $resource
     * @param string $path
     * @param int $width
     * @param int $height
     * @param string $hex
     * @param array $rgb
     */
    public function testCreateFromValidImage(\GdImage $resource, string $path, int $width, int $height, string $hex, array $rgb): void
    {
        $this->assertInstanceOf(Image::class, Image::createFromPath($path));
        $this->assertInstanceOf(Image::class, Image::createFromResource($resource));
    }

    /**
     * @dataProvider validImageProvider
     * @param \GdImage $resource
     * @param string $path
     * @param int $width
     * @param int $height
     * @param string $hex
     * @param array $rgb
     */
    public function testGetImageWidth(\GdImage $resource, string $path, int $width, int $height, string $hex, array $rgb): void
    {
        $this->assertEquals($width, Image::createFromPath($path)->getWidth());
        $this->assertEquals($width, Image::createFromResource($resource)->getWidth());
    }

    /**
     * @dataProvider validImageProvider
     * @param \GdImage $resource
     * @param string $path
     * @param int $width
     * @param int $height
     * @param string $hex
     * @param array $rgb
     */
    public function testGetImageHeight(\GdImage $resource, string $path, int $width, int $height, string $hex, array $rgb): void
    {
        $this->assertEquals($height, Image::createFromPath($path)->getHeight());
        $this->assertEquals($height, Image::createFromResource($resource)->getHeight());
    }

    /**
     * @dataProvider validImageProvider
     * @param \GdImage $resource
     * @param string $path
     * @param int $width
     * @param int $height
     * @param string $hex
     * @param array $rgb
     */
    public function testGetImageAvgHex(\GdImage $resource, string $path, int $width, int $height, string $hex, array $rgb): void
    {
        $this->assertEquals($hex, Image::createFromPath($path)->getAvgHex());
        $this->assertEquals($hex, Image::createFromResource($resource)->getAvgHex());
    }

    /**
     * @dataProvider validImageProvider
     * @param \GdImage $resource
     * @param string $path
     * @param int $width
     * @param int $height
     * @param string $hex
     * @param array $rgb
     */
    public function testGetImageAvgRgb(\GdImage $resource, string $path, int $width, int $height, string $hex, array $rgb): void
    {
        $this->assertEquals($rgb, Image::createFromPath($path)->getAvgRgb());
        $this->assertEquals($rgb, Image::createFromResource($resource)->getAvgRgb());
    }
}
