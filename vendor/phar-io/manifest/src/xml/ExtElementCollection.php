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

class ExtElementCollection extends ElementCollection {
    public function current(): ExtElement {
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

class ExtElementCollection extends ElementCollection {
    public function current() {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return new ExtElement(
            $this->getCurrentElement()
        );
    }
<<<<<<< HEAD
=======

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
