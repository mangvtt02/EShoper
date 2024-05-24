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

use DOMDocument;
use DOMElement;
<<<<<<< HEAD
use Throwable;
use function count;
use function file_get_contents;
use function is_file;
use function libxml_clear_errors;
use function libxml_get_errors;
use function libxml_use_internal_errors;
use function sprintf;

class ManifestDocument {
    public const XMLNS = 'https://phar.io/xml/manifest/1.0';

    /** @var DOMDocument */
    private $dom;

    public static function fromFile(string $filename): ManifestDocument {
        if (!is_file($filename)) {
=======

class ManifestDocument {
    const XMLNS = 'https://phar.io/xml/manifest/1.0';

    /**
     * @var DOMDocument
     */
    private $dom;

    /**
     * ManifestDocument constructor.
     *
     * @param DOMDocument $dom
     */
    private function __construct(DOMDocument $dom) {
        $this->ensureCorrectDocumentType($dom);

        $this->dom = $dom;
    }

    public static function fromFile($filename) {
        if (!file_exists($filename)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            throw new ManifestDocumentException(
                sprintf('File "%s" not found', $filename)
            );
        }

        return self::fromString(
            file_get_contents($filename)
        );
    }

<<<<<<< HEAD
    public static function fromString(string $xmlString): ManifestDocument {
        $prev = libxml_use_internal_errors(true);
        libxml_clear_errors();

        try {
            $dom = new DOMDocument();
            $dom->loadXML($xmlString);
            $errors = libxml_get_errors();
            libxml_use_internal_errors($prev);
        } catch (Throwable $t) {
            throw new ManifestDocumentException($t->getMessage(), 0, $t);
        }
=======
    public static function fromString($xmlString) {
        $prev = libxml_use_internal_errors(true);
        libxml_clear_errors();

        $dom = new DOMDocument();
        $dom->loadXML($xmlString);

        $errors = libxml_get_errors();
        libxml_use_internal_errors($prev);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        if (count($errors) !== 0) {
            throw new ManifestDocumentLoadingException($errors);
        }

        return new self($dom);
    }

<<<<<<< HEAD
    private function __construct(DOMDocument $dom) {
        $this->ensureCorrectDocumentType($dom);

        $this->dom = $dom;
    }

    public function getContainsElement(): ContainsElement {
=======
    public function getContainsElement() {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return new ContainsElement(
            $this->fetchElementByName('contains')
        );
    }

<<<<<<< HEAD
    public function getCopyrightElement(): CopyrightElement {
=======
    public function getCopyrightElement() {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return new CopyrightElement(
            $this->fetchElementByName('copyright')
        );
    }

<<<<<<< HEAD
    public function getRequiresElement(): RequiresElement {
=======
    public function getRequiresElement() {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return new RequiresElement(
            $this->fetchElementByName('requires')
        );
    }

<<<<<<< HEAD
    public function hasBundlesElement(): bool {
        return $this->dom->getElementsByTagNameNS(self::XMLNS, 'bundles')->length === 1;
    }

    public function getBundlesElement(): BundlesElement {
=======
    public function hasBundlesElement() {
        return $this->dom->getElementsByTagNameNS(self::XMLNS, 'bundles')->length === 1;
    }

    public function getBundlesElement() {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return new BundlesElement(
            $this->fetchElementByName('bundles')
        );
    }

<<<<<<< HEAD
    private function ensureCorrectDocumentType(DOMDocument $dom): void {
=======
    private function ensureCorrectDocumentType(DOMDocument $dom) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $root = $dom->documentElement;

        if ($root->localName !== 'phar' || $root->namespaceURI !== self::XMLNS) {
            throw new ManifestDocumentException('Not a phar.io manifest document');
        }
    }

<<<<<<< HEAD
    private function fetchElementByName(string $elementName): DOMElement {
=======
    /**
     * @param $elementName
     *
     * @return DOMElement
     *
     * @throws ManifestDocumentException
     */
    private function fetchElementByName($elementName) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $element = $this->dom->getElementsByTagNameNS(self::XMLNS, $elementName)->item(0);

        if (!$element instanceof DOMElement) {
            throw new ManifestDocumentException(
                sprintf('Element %s missing', $elementName)
            );
        }

        return $element;
    }
}
