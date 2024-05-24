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

use PharIo\Version\Version;

class BundledComponent {
<<<<<<< HEAD
    /** @var string */
    private $name;

    /** @var Version */
    private $version;

    public function __construct(string $name, Version $version) {
=======
    /**
     * @var string
     */
    private $name;

    /**
     * @var Version
     */
    private $version;

    /**
     * @param string  $name
     * @param Version $version
     */
    public function __construct($name, Version $version) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->name    = $name;
        $this->version = $version;
    }

<<<<<<< HEAD
    public function getName(): string {
        return $this->name;
    }

    public function getVersion(): Version {
=======
    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return Version
     */
    public function getVersion() {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return $this->version;
    }
}
