# ChangeLog

All notable changes are documented in this file using the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

<<<<<<< HEAD
## [3.0.5] - 2022-09-14

### Fixed

* [#102](https://github.com/sebastianbergmann/comparator/pull/102): Fix `float` comparison precision

## [3.0.4] - 2022-09-14

### Fixed

* [#99](https://github.com/sebastianbergmann/comparator/pull/99): Fix weak comparison between `'0'` and `false`

## [3.0.3] - 2020-11-30

### Changed

* Changed PHP version constraint in `composer.json` from `^7.1` to `>=7.1`

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
## [3.0.2] - 2018-07-12

### Changed

* By default, `MockObjectComparator` is now tried before all other (default) comparators

## [3.0.1] - 2018-06-14

### Fixed

<<<<<<< HEAD
* [#53](https://github.com/sebastianbergmann/comparator/pull/53): `DOMNodeComparator` ignores `$ignoreCase` parameter
* [#58](https://github.com/sebastianbergmann/comparator/pull/58): `ScalarComparator` does not handle extremely ugly string comparison edge cases
=======
* Fixed [#53](https://github.com/sebastianbergmann/comparator/pull/53): `DOMNodeComparator` ignores `$ignoreCase` parameter
* Fixed [#58](https://github.com/sebastianbergmann/comparator/pull/58): `ScalarComparator` does not handle extremely ugly string comparison edge cases
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

## [3.0.0] - 2018-04-18

### Fixed

<<<<<<< HEAD
* [#48](https://github.com/sebastianbergmann/comparator/issues/48): `DateTimeComparator` does not support fractional second deltas
=======
* Fixed [#48](https://github.com/sebastianbergmann/comparator/issues/48): `DateTimeComparator` does not support fractional second deltas
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

### Removed

* Removed support for PHP 7.0

## [2.1.3] - 2018-02-01

### Changed

* This component is now compatible with version 3 of `sebastian/diff`

## [2.1.2] - 2018-01-12

### Fixed

* Fix comparison of `DateTimeImmutable` objects

## [2.1.1] - 2017-12-22

### Fixed

<<<<<<< HEAD
* [phpunit/#2923](https://github.com/sebastianbergmann/phpunit/issues/2923): Unexpected failed date matching
=======
* Fixed [phpunit/#2923](https://github.com/sebastianbergmann/phpunit/issues/2923): Unexpected failed date matching
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

## [2.1.0] - 2017-11-03

### Added

* Added `SebastianBergmann\Comparator\Factory::reset()` to unregister all non-default comparators
* Added support for `phpunit/phpunit-mock-objects` version `^5.0`

<<<<<<< HEAD
[3.0.5]: https://github.com/sebastianbergmann/comparator/compare/3.0.4...3.0.5
[3.0.4]: https://github.com/sebastianbergmann/comparator/compare/3.0.3...3.0.4
[3.0.3]: https://github.com/sebastianbergmann/comparator/compare/3.0.2...3.0.3
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
[3.0.2]: https://github.com/sebastianbergmann/comparator/compare/3.0.1...3.0.2
[3.0.1]: https://github.com/sebastianbergmann/comparator/compare/3.0.0...3.0.1
[3.0.0]: https://github.com/sebastianbergmann/comparator/compare/2.1.3...3.0.0
[2.1.3]: https://github.com/sebastianbergmann/comparator/compare/2.1.2...2.1.3
[2.1.2]: https://github.com/sebastianbergmann/comparator/compare/2.1.1...2.1.2
[2.1.1]: https://github.com/sebastianbergmann/comparator/compare/2.1.0...2.1.1
[2.1.0]: https://github.com/sebastianbergmann/comparator/compare/2.0.2...2.1.0
