<<<<<<< HEAD
<?php declare(strict_types = 1);
=======
<?php
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
/*
 * This file is part of PharIo\Version.
 *
 * (c) Arne Blankerts <arne@blankerts.de>, Sebastian Heuer <sebastian@phpeople.de>, Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
namespace PharIo\Version;

class VersionNumber {

    /** @var ?int */
    private $value;

    public function __construct(?int $value) {
        $this->value = $value;
    }

    public function isAny(): bool {
        return $this->value === null;
    }

    public function getValue(): ?int {
=======

namespace PharIo\Version;

class VersionNumber {
    /**
     * @var int
     */
    private $value;

    /**
     * @param mixed $value
     */
    public function __construct($value) {
        if (is_numeric($value)) {
            $this->value = $value;
        }
    }

    /**
     * @return bool
     */
    public function isAny() {
        return $this->value === null;
    }

    /**
     * @return int
     */
    public function getValue() {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return $this->value;
    }
}
