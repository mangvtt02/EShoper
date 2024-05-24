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

class SpecificMajorVersionConstraint extends AbstractVersionConstraint {
    /** @var int */
    private $major;

    public function __construct(string $originalValue, int $major) {
=======

namespace PharIo\Version;

class SpecificMajorVersionConstraint extends AbstractVersionConstraint {
    /**
     * @var int
     */
    private $major = 0;

    /**
     * @param string $originalValue
     * @param int $major
     */
    public function __construct($originalValue, $major) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        parent::__construct($originalValue);

        $this->major = $major;
    }

<<<<<<< HEAD
    public function complies(Version $version): bool {
        return $version->getMajor()->getValue() === $this->major;
=======
    /**
     * @param Version $version
     *
     * @return bool
     */
    public function complies(Version $version) {
        return $version->getMajor()->getValue() == $this->major;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
