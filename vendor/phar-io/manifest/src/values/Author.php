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

use function sprintf;

class Author {
    /** @var string */
    private $name;

    /** @var null|Email */
    private $email;

    public function __construct(string $name, ?Email $email = null) {
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

class Author {
    /**
     * @var string
     */
    private $name;

    /**
     * @var Email
     */
    private $email;

    /**
     * @param string $name
     * @param Email  $email
     */
    public function __construct($name, Email $email) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->name  = $name;
        $this->email = $email;
    }

<<<<<<< HEAD
    public function asString(): string {
        if (!$this->hasEmail()) {
            return $this->name;
        }

        return sprintf(
            '%s <%s>',
            $this->name,
            $this->email->asString()
        );
    }

    public function getName(): string {
=======
    /**
     * @return string
     */
    public function getName() {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return $this->name;
    }

    /**
<<<<<<< HEAD
     * @psalm-assert-if-true Email $this->email
     */
    public function hasEmail(): bool {
        return $this->email !== null;
    }

    public function getEmail(): Email {
        if (!$this->hasEmail()) {
            throw new NoEmailAddressException();
        }

        return $this->email;
    }
=======
     * @return Email
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @return string
     */
    public function __toString() {
        return sprintf(
            '%s <%s>',
            $this->name,
            $this->email
        );
    }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
