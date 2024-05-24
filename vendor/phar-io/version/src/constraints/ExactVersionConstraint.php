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

class ExactVersionConstraint extends AbstractVersionConstraint {
    public function complies(Version $version): bool {
        $other = $version->getVersionString();

        if ($version->hasBuildMetaData()) {
            $other .= '+' . $version->getBuildMetaData()->asString();
        }

        return $this->asString() === $other;
=======

namespace PharIo\Version;

class ExactVersionConstraint extends AbstractVersionConstraint {
    /**
     * @param Version $version
     *
     * @return bool
     */
    public function complies(Version $version) {
        return $this->asString() == $version->getVersionString();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
