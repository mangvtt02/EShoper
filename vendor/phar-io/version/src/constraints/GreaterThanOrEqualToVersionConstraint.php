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

class GreaterThanOrEqualToVersionConstraint extends AbstractVersionConstraint {
    /** @var Version */
    private $minimalVersion;

    public function __construct(string $originalValue, Version $minimalVersion) {
=======

namespace PharIo\Version;

class GreaterThanOrEqualToVersionConstraint extends AbstractVersionConstraint {
    /**
     * @var Version
     */
    private $minimalVersion;

    /**
     * @param string $originalValue
     * @param Version $minimalVersion
     */
    public function __construct($originalValue, Version $minimalVersion) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        parent::__construct($originalValue);

        $this->minimalVersion = $minimalVersion;
    }

<<<<<<< HEAD
    public function complies(Version $version): bool {
        return $version->getVersionString() === $this->minimalVersion->getVersionString()
=======
    /**
     * @param Version $version
     *
     * @return bool
     */
    public function complies(Version $version) {
        return $version->getVersionString() == $this->minimalVersion->getVersionString()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            || $version->isGreaterThan($this->minimalVersion);
    }
}
