<<<<<<< HEAD
[![PHPUnit tests](https://github.com/dompdf/php-font-lib/actions/workflows/phpunit.yml/badge.svg)](https://github.com/dompdf/php-font-lib/actions/workflows/phpunit.yml)

# PHP Font Lib

=======
# PHP Font Lib

[![Build Status](https://travis-ci.org/PhenX/php-font-lib.svg?branch=master)](https://travis-ci.org/PhenX/php-font-lib)


>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
This library can be used to:
 * Read TrueType, OpenType (with TrueType glyphs), WOFF font files
 * Extract basic info (name, style, etc)
 * Extract advanced info (horizontal metrics, glyph names, glyph shapes, etc)
 * Make an Adobe Font Metrics (AFM) file from a font

<<<<<<< HEAD
=======
You can find a demo GUI [here](http://pxd.me/php-font-lib/www/font_explorer.html).

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
This project was initiated by the need to read font files in the [DOMPDF project](https://github.com/dompdf/dompdf).

Usage Example
-------------

<<<<<<< HEAD
### Base font information

```php
$font = \FontLib\Font::load('fontfile.ttf');
=======
```
$font = \FontLib\Font::load('../../fontfile.ttf');
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
$font->parse();  // for getFontWeight() to work this call must be done first!
echo $font->getFontName() .'<br>';
echo $font->getFontSubfamily() .'<br>';
echo $font->getFontSubfamilyID() .'<br>';
echo $font->getFontFullName() .'<br>';
echo $font->getFontVersion() .'<br>';
echo $font->getFontWeight() .'<br>';
echo $font->getFontPostscriptName() .'<br>';
<<<<<<< HEAD
$font->close();
```

### Font Metrics Generation

```php
$font = FontLib\Font::load('fontfile.ttf');
$font->parse();
$font->saveAdobeFontMetrics('fontfile.ufm');
```

### Create a font subset

```php
$font = FontLib\Font::load('fontfile.ttf');
$font->parse();
$font->setSubset("abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ.:,;' (!?)+-*/== 1234567890"); // characters to include
$font->reduce();
touch('fontfile.subset.ttf');
$font->open('fontfile.subset.ttf', FontLib\BinaryStream::modeReadWrite);
$font->encode(array("OS/2"));
$font->close();
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
```
