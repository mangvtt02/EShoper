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

class CopyrightElement extends ManifestElement {
    public function getAuthorElements(): AuthorElementCollection {
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

class CopyrightElement extends ManifestElement {
    public function getAuthorElements() {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return new AuthorElementCollection(
            $this->getChildrenByName('author')
        );
    }

<<<<<<< HEAD
    public function getLicenseElement(): LicenseElement {
=======
    public function getLicenseElement() {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return new LicenseElement(
            $this->getChildByName('license')
        );
    }
}
