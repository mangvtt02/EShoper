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

use PharIo\Version\AnyVersionConstraint;
use PharIo\Version\Version;
use PharIo\Version\VersionConstraint;
use XMLWriter;
<<<<<<< HEAD
use function count;
use function file_put_contents;
use function str_repeat;

/** @psalm-suppress MissingConstructor */
class ManifestSerializer {
    /** @var XMLWriter */
    private $xmlWriter;

    public function serializeToFile(Manifest $manifest, string $filename): void {
=======

class ManifestSerializer {
    /**
     * @var XMLWriter
     */
    private $xmlWriter;

    public function serializeToFile(Manifest $manifest, $filename) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        file_put_contents(
            $filename,
            $this->serializeToString($manifest)
        );
    }

<<<<<<< HEAD
    public function serializeToString(Manifest $manifest): string {
=======
    public function serializeToString(Manifest $manifest) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->startDocument();

        $this->addContains($manifest->getName(), $manifest->getVersion(), $manifest->getType());
        $this->addCopyright($manifest->getCopyrightInformation());
        $this->addRequirements($manifest->getRequirements());
        $this->addBundles($manifest->getBundledComponents());

        return $this->finishDocument();
    }

<<<<<<< HEAD
    private function startDocument(): void {
=======
    private function startDocument() {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $xmlWriter = new XMLWriter();
        $xmlWriter->openMemory();
        $xmlWriter->setIndent(true);
        $xmlWriter->setIndentString(str_repeat(' ', 4));
        $xmlWriter->startDocument('1.0', 'UTF-8');
        $xmlWriter->startElement('phar');
        $xmlWriter->writeAttribute('xmlns', 'https://phar.io/xml/manifest/1.0');

        $this->xmlWriter = $xmlWriter;
    }

<<<<<<< HEAD
    private function finishDocument(): string {
=======
    private function finishDocument() {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->xmlWriter->endElement();
        $this->xmlWriter->endDocument();

        return $this->xmlWriter->outputMemory();
    }

<<<<<<< HEAD
    private function addContains(ApplicationName $name, Version $version, Type $type): void {
        $this->xmlWriter->startElement('contains');
        $this->xmlWriter->writeAttribute('name', $name->asString());
=======
    private function addContains($name, Version $version, Type $type) {
        $this->xmlWriter->startElement('contains');
        $this->xmlWriter->writeAttribute('name', $name);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->xmlWriter->writeAttribute('version', $version->getVersionString());

        switch (true) {
            case $type->isApplication(): {
                $this->xmlWriter->writeAttribute('type', 'application');
<<<<<<< HEAD

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                break;
            }

            case $type->isLibrary(): {
                $this->xmlWriter->writeAttribute('type', 'library');
<<<<<<< HEAD

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                break;
            }

            case $type->isExtension(): {
<<<<<<< HEAD
                $this->xmlWriter->writeAttribute('type', 'extension');
                /* @var $type Extension */
                $this->addExtension(
                    $type->getApplicationName(),
                    $type->getVersionConstraint()
                );

=======
                /* @var $type Extension */
                $this->xmlWriter->writeAttribute('type', 'extension');
                $this->addExtension($type->getApplicationName(), $type->getVersionConstraint());
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                break;
            }

            default: {
                $this->xmlWriter->writeAttribute('type', 'custom');
            }
        }

        $this->xmlWriter->endElement();
    }

<<<<<<< HEAD
    private function addCopyright(CopyrightInformation $copyrightInformation): void {
        $this->xmlWriter->startElement('copyright');

        foreach ($copyrightInformation->getAuthors() as $author) {
            $this->xmlWriter->startElement('author');
            $this->xmlWriter->writeAttribute('name', $author->getName());
            $this->xmlWriter->writeAttribute('email', $author->getEmail()->asString());
=======
    private function addCopyright(CopyrightInformation $copyrightInformation) {
        $this->xmlWriter->startElement('copyright');

        foreach($copyrightInformation->getAuthors() as $author) {
            $this->xmlWriter->startElement('author');
            $this->xmlWriter->writeAttribute('name', $author->getName());
            $this->xmlWriter->writeAttribute('email', (string) $author->getEmail());
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->xmlWriter->endElement();
        }

        $license = $copyrightInformation->getLicense();

        $this->xmlWriter->startElement('license');
        $this->xmlWriter->writeAttribute('type', $license->getName());
<<<<<<< HEAD
        $this->xmlWriter->writeAttribute('url', $license->getUrl()->asString());
=======
        $this->xmlWriter->writeAttribute('url', $license->getUrl());
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->xmlWriter->endElement();

        $this->xmlWriter->endElement();
    }

<<<<<<< HEAD
    private function addRequirements(RequirementCollection $requirementCollection): void {
        $phpRequirement = new AnyVersionConstraint();
        $extensions     = [];

        foreach ($requirementCollection as $requirement) {
            if ($requirement instanceof PhpVersionRequirement) {
                $phpRequirement = $requirement->getVersionConstraint();

=======
    private function addRequirements(RequirementCollection $requirementCollection) {
        $phpRequirement = new AnyVersionConstraint();
        $extensions     = [];

        foreach($requirementCollection as $requirement) {
            if ($requirement instanceof PhpVersionRequirement) {
                $phpRequirement = $requirement->getVersionConstraint();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                continue;
            }

            if ($requirement instanceof PhpExtensionRequirement) {
<<<<<<< HEAD
                $extensions[] = $requirement->asString();
=======
                $extensions[] = (string) $requirement;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }
        }

        $this->xmlWriter->startElement('requires');
        $this->xmlWriter->startElement('php');
        $this->xmlWriter->writeAttribute('version', $phpRequirement->asString());

<<<<<<< HEAD
        foreach ($extensions as $extension) {
=======
        foreach($extensions as $extension) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->xmlWriter->startElement('ext');
            $this->xmlWriter->writeAttribute('name', $extension);
            $this->xmlWriter->endElement();
        }

        $this->xmlWriter->endElement();
        $this->xmlWriter->endElement();
    }

<<<<<<< HEAD
    private function addBundles(BundledComponentCollection $bundledComponentCollection): void {
=======
    private function addBundles(BundledComponentCollection $bundledComponentCollection) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        if (count($bundledComponentCollection) === 0) {
            return;
        }
        $this->xmlWriter->startElement('bundles');

<<<<<<< HEAD
        foreach ($bundledComponentCollection as $bundledComponent) {
=======
        foreach($bundledComponentCollection as $bundledComponent) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->xmlWriter->startElement('component');
            $this->xmlWriter->writeAttribute('name', $bundledComponent->getName());
            $this->xmlWriter->writeAttribute('version', $bundledComponent->getVersion()->getVersionString());
            $this->xmlWriter->endElement();
        }

        $this->xmlWriter->endElement();
    }

<<<<<<< HEAD
    private function addExtension(ApplicationName $applicationName, VersionConstraint $versionConstraint): void {
        $this->xmlWriter->startElement('extension');
        $this->xmlWriter->writeAttribute('for', $applicationName->asString());
=======
    private function addExtension($application, VersionConstraint $versionConstraint) {
        $this->xmlWriter->startElement('extension');
        $this->xmlWriter->writeAttribute('for', $application);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->xmlWriter->writeAttribute('compatible', $versionConstraint->asString());
        $this->xmlWriter->endElement();
    }
}
