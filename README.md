<div align="center">
  <img src="./resources/logo.svg" width="200px" alt="The PHP Average Color Picker Library">
  <p>A simple, lightweight and fast PHP function that uses the GD library to extract the average color of an image.</p>
</div>

> [!NOTE]
> Keep in mind that this function will return the average color of an image, not the main color.

## 📖 Requirements
* PHP 7.0 or higher
* [Composer](https://getcomposer.org) is required for installation
* PHP Extensions: `ext-mbstring`, `ext-gd`

## 📦 Installation

Install the library using Composer:

```shell
$ composer require richarddobron/php-avg-color-picker
```

## 👀 Example

### Input - The Image Path

![Input](https://raw.githubusercontent.com/tooleks/php-avg-color-picker/master/resources/input.jpg)

### Output - The Image Average Color

![Output](https://raw.githubusercontent.com/tooleks/php-avg-color-picker/master/resources/output.jpg)

## ⚡️ Quick Start

Here’s how to use the library to determine the average color of an image:

```php
<?php

use Dobron\AvgColorPicker\Gd\AvgColorPicker;

$imageAvgRgbColor = (new AvgColorPicker)->getImageAvgRgbByPath($imagePath);
// or
$imageAvgRgbColor = (new AvgColorPicker)->getImageAvgRgbByResource($gdImageResource);
// or
$imageAvgRgbColor = (new AvgColorPicker)->getImageAvgRgb($imagePath);
// or
$imageAvgRgbColor = (new AvgColorPicker)->getImageAvgRgb($gdImageResource);

var_dump($imageAvgRgbColor); // array(255, 255, 255)
```

```php
<?php

use Dobron\AvgColorPicker\Gd\AvgColorPicker;

$imageAvgHexColor = (new AvgColorPicker)->getImageAvgHexByPath($imagePath);
// or
$imageAvgHexColor = (new AvgColorPicker)->getImageAvgHexByResource($gdImageResource);
// or
$imageAvgHexColor = (new AvgColorPicker)->getImageAvgHex($imagePath);
// or
$imageAvgHexColor = (new AvgColorPicker)->getImageAvgHex($gdImageResource);

var_dump($imageAvgHexColor); // string(7) "#ffffff"
```

## 🧪 Testing

```shell
$ composer tests
```

## 🤝 Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


## ⚖️ License
This repository is MIT licensed, as found in the [LICENSE](LICENSE) file.
