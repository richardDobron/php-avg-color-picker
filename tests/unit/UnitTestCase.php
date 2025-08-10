<?php

/**
 * Class UnitTestCase.
 */
abstract class UnitTestCase extends \PHPUnit\Framework\TestCase
{
    public static function validColorsProvider(): array
    {
        return [
            ['#000000', [0, 0, 0]],
            ['#ffffff', [255, 255, 255]],
        ];
    }

    public static function invalidHexProvider(): array
    {
        return [
            ['#00000'],
            ['#0000000'],
            ['-000000'],
            ['#000QK0'],
        ];
    }

    public static function invalidRgbProvider(): array
    {
        return [
            [[0, 0]],
            [[0, 0, 0, 0]],
            [[-1, -1, -1]],
            [[256, 256, 256]],
        ];
    }

    public static function validImageProvider(): array
    {
        return [
            [
                'resource' => imagecreatefromgif(__DIR__ . '/../samples/valid_image.gif'),
                'path' => __DIR__ . '/../samples/valid_image.gif',
                'width' => 400,
                'height' => 225,
                'hex' => '#754635',
                'rgb' => [117, 70, 53],
            ],
            [
                'resource' => imagecreatefromjpeg(__DIR__ . '/../samples/valid_image.jpg'),
                'path' => __DIR__ . '/../samples/valid_image.jpg',
                'width' => 400,
                'height' => 225,
                'hex' => '#6d4635',
                'rgb' => [109, 70, 53],
            ],
            [
                'resource' => imagecreatefrompng(__DIR__ . '/../samples/valid_image.png'),
                'path' => __DIR__ . '/../samples/valid_image.png',
                'width' => 400,
                'height' => 225,
                'hex' => '#6d4635',
                'rgb' => [109, 70, 53],
            ],
        ];
    }

    public static function invalidImageResourceProvider(): array
    {
        return [
            ['invalid_resource'],
        ];
    }

    public static function invalidMimeTypeImagePathProvider(): array
    {
        return [
            [__DIR__ . '/../samples/invalid_image.jpg'],
        ];
    }

    public static function imageInvalidPathProvider(): array
    {
        return [
            ['invalid/path'],
        ];
    }
}
