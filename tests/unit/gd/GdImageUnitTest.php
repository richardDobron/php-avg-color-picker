<?php

use Dobron\AvgColorPicker\Exceptions\InvalidArgumentException;
use Dobron\AvgColorPicker\Exceptions\InvalidMimeTypeException;
use Dobron\AvgColorPicker\Gd\Image;

/**
 * Class GdImageUnitTest.
 */
class GdImageUnitTest extends UnitTestCase
{
    /**
     * @dataProvider invalidMimeTypeImagePathProvider
     * @param string $path
     */
    public function testCreateFromInvalidImagePath(string $path)
    {
        $this->expectException(InvalidMimeTypeException::class);

        Image::createFromPath($path);
    }

    /**
     * @dataProvider imageInvalidPathProvider
     * @param string $path
     */
    public function testCreateFromImageInvalidPath(string $path)
    {
        $this->expectException(InvalidArgumentException::class);

        Image::createFromPath($path);
    }

    /**
     * @dataProvider invalidImageResourceProvider
     * @param \GdImage $resource
     */
    public function testCreateFromInvalidImageResource($resource)
    {
        $this->expectException(InvalidArgumentException::class);

        Image::createFromResource($resource);
    }

    /**
     * @dataProvider validImageProvider
     * @param $resource
     * @param string $path
     * @param int $width
     * @param int $height
     * @param string $hex
     * @param array $rgb
     */
    public function testCreateFromValidImage($resource, string $path, int $width, int $height, string $hex, array $rgb)
    {
        $this->assertInstanceOf(Image::class, Image::createFromPath($path));
        $this->assertInstanceOf(Image::class, Image::createFromResource($resource));
    }

    /**
     * @dataProvider validImageProvider
     * @param $resource
     * @param string $path
     * @param int $width
     * @param int $height
     * @param string $hex
     * @param array $rgb
     */
    public function testGetImageWidth($resource, string $path, int $width, int $height, string $hex, array $rgb)
    {
        $this->assertEquals($width, Image::createFromPath($path)->getWidth());
        $this->assertEquals($width, Image::createFromResource($resource)->getWidth());
    }

    /**
     * @dataProvider validImageProvider
     * @param $resource
     * @param string $path
     * @param int $width
     * @param int $height
     * @param string $hex
     * @param array $rgb
     */
    public function testGetImageHeight($resource, string $path, int $width, int $height, string $hex, array $rgb)
    {
        $this->assertEquals($height, Image::createFromPath($path)->getHeight());
        $this->assertEquals($height, Image::createFromResource($resource)->getHeight());
    }

    /**
     * @dataProvider validImageProvider
     * @param $resource
     * @param string $path
     * @param int $width
     * @param int $height
     * @param string $hex
     * @param array $rgb
     */
    public function testGetImageAvgHex($resource, string $path, int $width, int $height, string $hex, array $rgb)
    {
        $this->assertEquals($hex, Image::createFromPath($path)->getAvgHex());
        $this->assertEquals($hex, Image::createFromResource($resource)->getAvgHex());
    }

    /**
     * @dataProvider validImageProvider
     * @param $resource
     * @param string $path
     * @param int $width
     * @param int $height
     * @param string $hex
     * @param array $rgb
     */
    public function testGetImageAvgRgb($resource, string $path, int $width, int $height, string $hex, array $rgb)
    {
        $this->assertEquals($rgb, Image::createFromPath($path)->getAvgRgb());
        $this->assertEquals($rgb, Image::createFromResource($resource)->getAvgRgb());
    }
}
