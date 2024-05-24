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

abstract class Type {
<<<<<<< HEAD
    public static function application(): Application {
        return new Application;
    }

    public static function library(): Library {
        return new Library;
    }

    public static function extension(ApplicationName $application, VersionConstraint $versionConstraint): Extension {
        return new Extension($application, $versionConstraint);
    }

    /** @psalm-assert-if-true Application $this */
    public function isApplication(): bool {
        return false;
    }

    /** @psalm-assert-if-true Library $this */
    public function isLibrary(): bool {
        return false;
    }

    /** @psalm-assert-if-true Extension $this */
    public function isExtension(): bool {
=======
    /**
     * @return Application
     */
    public static function application() {
        return new Application;
    }

    /**
     * @return Library
     */
    public static function library() {
        return new Library;
    }

    /**
     * @param ApplicationName   $application
     * @param VersionConstraint $versionConstraint
     *
     * @return Extension
     */
    public static function extension(ApplicationName $application, VersionConstraint $versionConstraint) {
        return new Extension($application, $versionConstraint);
    }

    /**
     * @return bool
     */
    public function isApplication() {
        return false;
    }

    /**
     * @return bool
     */
    public function isLibrary() {
        return false;
    }

    /**
     * @return bool
     */
    public function isExtension() {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return false;
    }
}
