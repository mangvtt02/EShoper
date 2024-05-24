Symfony Polyfill / Php72
========================

This component provides functions added to PHP 7.2 core:

- [`spl_object_id`](https://php.net/spl_object_id)
- [`stream_isatty`](https://php.net/stream_isatty)

<<<<<<< HEAD
And also functions added to PHP 7.2 mbstring:

- [`mb_ord`](https://php.net/mb_ord)
- [`mb_chr`](https://php.net/mb_chr)
- [`mb_scrub`](https://php.net/mb_scrub)

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
On Windows only:

- [`sapi_windows_vt100_support`](https://php.net/sapi_windows_vt100_support)

Moved to core since 7.2 (was in the optional XML extension earlier):

- [`utf8_encode`](https://php.net/utf8_encode)
- [`utf8_decode`](https://php.net/utf8_decode)

Also, it provides constants added to PHP 7.2:
<<<<<<< HEAD

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
- [`PHP_FLOAT_*`](https://php.net/reserved.constants#constant.php-float-dig)
- [`PHP_OS_FAMILY`](https://php.net/reserved.constants#constant.php-os-family)

More information can be found in the
<<<<<<< HEAD
[main Polyfill README](https://github.com/symfony/polyfill/blob/main/README.md).
=======
[main Polyfill README](https://github.com/symfony/polyfill/blob/master/README.md).
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

License
=======

This library is released under the [MIT license](LICENSE).
