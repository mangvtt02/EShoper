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

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
namespace PharIo\Manifest;

use PharIo\Version\VersionConstraint;

class PhpVersionRequirement implements Requirement {
<<<<<<< HEAD
    /** @var VersionConstraint */
=======
    /**
     * @var VersionConstraint
     */
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    private $versionConstraint;

    public function __construct(VersionConstraint $versionConstraint) {
        $this->versionConstraint = $versionConstraint;
    }

<<<<<<< HEAD
    public function getVersionConstraint(): VersionConstraint {
=======
    /**
     * @return VersionConstraint
     */
    public function getVersionConstraint() {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return $this->versionConstraint;
    }
}
