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

class SpecificMajorAndMinorVersionConstraint extends AbstractVersionConstraint {
    /** @var int */
    private $major;

    /** @var int */
    private $minor;

    public function __construct(string $originalValue, int $major, int $minor) {
=======

namespace PharIo\Version;

class SpecificMajorAndMinorVersionConstraint extends AbstractVersionConstraint {
    /**
     * @var int
     */
    private $major = 0;

    /**
     * @var int
     */
    private $minor = 0;

    /**
     * @param string $originalValue
     * @param int $major
     * @param int $minor
     */
    public function __construct($originalValue, $major, $minor) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        parent::__construct($originalValue);

        $this->major = $major;
        $this->minor = $minor;
    }

<<<<<<< HEAD
    public function complies(Version $version): bool {
        if ($version->getMajor()->getValue() !== $this->major) {
            return false;
        }

        return $version->getMinor()->getValue() === $this->minor;
=======
    /**
     * @param Version $version
     *
     * @return bool
     */
    public function complies(Version $version) {
        if ($version->getMajor()->getValue() != $this->major) {
            return false;
        }

        return $version->getMinor()->getValue() == $this->minor;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
