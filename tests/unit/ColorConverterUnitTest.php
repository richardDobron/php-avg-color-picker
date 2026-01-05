<?php

namespace Dobron\AvgColorPicker\Tests\unit;

use Dobron\AvgColorPicker\ColorConverter;

/**
 * Class ColorConverterUnitTest.
 */
class ColorConverterUnitTest extends UnitTestCase
{
    /**
     * @dataProvider validColorsProvider
     * @param string $hex
     * @param array $rgb
     */
    public function testHex2Rgb(string $hex, array $rgb): void
    {
        $this->assertEquals($rgb, (new ColorConverter())->hex2rgb($hex));
    }

    /**
     * @dataProvider validColorsProvider
     * @param string $hex
     * @param array $rgb
     */
    public function testRgb2Hex(string $hex, array $rgb): void
    {
        $this->assertEquals($hex, (new ColorConverter())->rgb2hex($rgb));
    }

    /**
     * @dataProvider invalidHexProvider
     * @param string $hex
     */
    public function testHex2RgbFromInvalidValue(string $hex): void
    {
        $this->expectException(\RuntimeException::class);

        (new ColorConverter())->hex2rgb($hex);
    }

    /**
     * @dataProvider invalidRgbProvider
     * @param array $rgb
     */
    public function testRgb2HexFromInvalidValue(array $rgb): void
    {
        $this->expectException(\RuntimeException::class);

        (new ColorConverter())->rgb2hex($rgb);
    }
}
