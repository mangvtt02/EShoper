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

class License {
    /** @var string */
    private $name;

    /** @var Url */
    private $url;

    public function __construct(string $name, Url $url) {
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

class License {
    /**
     * @var string
     */
    private $name;

    /**
     * @var Url
     */
    private $url;

    public function __construct($name, Url $url) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->name = $name;
        $this->url  = $url;
    }

<<<<<<< HEAD
    public function getName(): string {
        return $this->name;
    }

    public function getUrl(): Url {
=======
    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return Url
     */
    public function getUrl() {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return $this->url;
    }
}
