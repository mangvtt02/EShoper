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

use DOMElement;
use DOMNodeList;
<<<<<<< HEAD
use function sprintf;

class ManifestElement {
    public const XMLNS = 'https://phar.io/xml/manifest/1.0';

    /** @var DOMElement */
    private $element;

=======

class ManifestElement {
    const XMLNS = 'https://phar.io/xml/manifest/1.0';

    /**
     * @var DOMElement
     */
    private $element;

    /**
     * ContainsElement constructor.
     *
     * @param DOMElement $element
     */
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function __construct(DOMElement $element) {
        $this->element = $element;
    }

<<<<<<< HEAD
    protected function getAttributeValue(string $name): string {
=======
    /**
     * @param string $name
     *
     * @return string
     *
     * @throws ManifestElementException
     */
    protected function getAttributeValue($name) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        if (!$this->element->hasAttribute($name)) {
            throw new ManifestElementException(
                sprintf(
                    'Attribute %s not set on element %s',
                    $name,
                    $this->element->localName
                )
            );
        }

        return $this->element->getAttribute($name);
    }

<<<<<<< HEAD
    protected function hasAttribute(string $name): bool {
        return $this->element->hasAttribute($name);
    }

    protected function getChildByName(string $elementName): DOMElement {
=======
    /**
     * @param $elementName
     *
     * @return DOMElement
     *
     * @throws ManifestElementException
     */
    protected function getChildByName($elementName) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $element = $this->element->getElementsByTagNameNS(self::XMLNS, $elementName)->item(0);

        if (!$element instanceof DOMElement) {
            throw new ManifestElementException(
                sprintf('Element %s missing', $elementName)
            );
        }

        return $element;
    }

<<<<<<< HEAD
    protected function getChildrenByName(string $elementName): DOMNodeList {
=======
    /**
     * @param $elementName
     *
     * @return DOMNodeList
     *
     * @throws ManifestElementException
     */
    protected function getChildrenByName($elementName) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $elementList = $this->element->getElementsByTagNameNS(self::XMLNS, $elementName);

        if ($elementList->length === 0) {
            throw new ManifestElementException(
                sprintf('Element(s) %s missing', $elementName)
            );
        }

        return $elementList;
    }

<<<<<<< HEAD
    protected function hasChild(string $elementName): bool {
=======
    /**
     * @param string $elementName
     *
     * @return bool
     */
    protected function hasChild($elementName) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return $this->element->getElementsByTagNameNS(self::XMLNS, $elementName)->length !== 0;
    }
}
