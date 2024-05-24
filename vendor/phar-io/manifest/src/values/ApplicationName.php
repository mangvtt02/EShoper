<<<<<<< HEAD
<?php declare(strict_types = 1);
/*
 * This file is part of PharIo\Manifest.
 *
 * Copyright (c) Arne Blankerts <arne@blankerts.de>, Sebastian Heuer <sebastian@phpeople.de>, Sebastian Bergmann <sebastian@phpunit.de> and contributors
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */
namespace PharIo\Manifest;

use function preg_match;
use function sprintf;

class ApplicationName {
    /** @var string */
    private $name;

    public function __construct(string $name) {
=======
<?php
/*
 * This file is part of PharIo\Manifest.
 *
 * (c) Arne Blankerts <arne@blankerts.de>, Sebastian Heuer <sebastian@phpeople.de>, Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PharIo\Manifest;

class ApplicationName {
    /**
     * @var string
     */
    private $name;

    /**
     * ApplicationName constructor.
     *
     * @param string $name
     *
     * @throws InvalidApplicationNameException
     */
    public function __construct($name) {
        $this->ensureIsString($name);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->ensureValidFormat($name);
        $this->name = $name;
    }

<<<<<<< HEAD
    public function asString(): string {
        return $this->name;
    }

    public function isEqual(ApplicationName $name): bool {
        return $this->name === $name->name;
    }

    private function ensureValidFormat(string $name): void {
=======
    /**
     * @return string
     */
    public function __toString() {
        return $this->name;
    }

    public function isEqual(ApplicationName $name) {
        return $this->name === $name->name;
    }

    /**
     * @param string $name
     *
     * @throws InvalidApplicationNameException
     */
    private function ensureValidFormat($name) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        if (!preg_match('#\w/\w#', $name)) {
            throw new InvalidApplicationNameException(
                sprintf('Format of name "%s" is not valid - expected: vendor/packagename', $name),
                InvalidApplicationNameException::InvalidFormat
            );
        }
    }
<<<<<<< HEAD
=======

    private function ensureIsString($name) {
        if (!is_string($name)) {
            throw new InvalidApplicationNameException(
                'Name must be a string',
                InvalidApplicationNameException::NotAString
            );
        }
    }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
