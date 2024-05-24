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

use PharIo\Version\Exception as VersionException;
use PharIo\Version\Version;
use PharIo\Version\VersionConstraintParser;
use Throwable;
use function sprintf;

class ManifestDocumentMapper {
    public function map(ManifestDocument $document): Manifest {
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

use PharIo\Version\Version;
use PharIo\Version\Exception as VersionException;
use PharIo\Version\VersionConstraintParser;

class ManifestDocumentMapper {
    /**
     * @param ManifestDocument $document
     *
     * @returns Manifest
     *
     * @throws ManifestDocumentMapperException
     */
    public function map(ManifestDocument $document) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        try {
            $contains          = $document->getContainsElement();
            $type              = $this->mapType($contains);
            $copyright         = $this->mapCopyright($document->getCopyrightElement());
            $requirements      = $this->mapRequirements($document->getRequiresElement());
            $bundledComponents = $this->mapBundledComponents($document);

            return new Manifest(
                new ApplicationName($contains->getName()),
                new Version($contains->getVersion()),
                $type,
                $copyright,
                $requirements,
                $bundledComponents
            );
<<<<<<< HEAD
        } catch (Throwable $e) {
            throw new ManifestDocumentMapperException($e->getMessage(), (int)$e->getCode(), $e);
        }
    }

    private function mapType(ContainsElement $contains): Type {
=======
        } catch (VersionException $e) {
            throw new ManifestDocumentMapperException($e->getMessage(), $e->getCode(), $e);
        } catch (Exception $e) {
            throw new ManifestDocumentMapperException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @param ContainsElement $contains
     *
     * @return Type
     *
     * @throws ManifestDocumentMapperException
     */
    private function mapType(ContainsElement $contains) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        switch ($contains->getType()) {
            case 'application':
                return Type::application();
            case 'library':
                return Type::library();
            case 'extension':
                return $this->mapExtension($contains->getExtensionElement());
        }

        throw new ManifestDocumentMapperException(
            sprintf('Unsupported type %s', $contains->getType())
        );
    }

<<<<<<< HEAD
    private function mapCopyright(CopyrightElement $copyright): CopyrightInformation {
        $authors = new AuthorCollection();

        foreach ($copyright->getAuthorElements() as $authorElement) {
            $authors->add(
                new Author(
                    $authorElement->getName(),
                    $authorElement->hasEMail() ? new Email($authorElement->getEmail()) : null
=======
    /**
     * @param CopyrightElement $copyright
     *
     * @return CopyrightInformation
     *
     * @throws InvalidUrlException
     * @throws InvalidEmailException
     */
    private function mapCopyright(CopyrightElement $copyright) {
        $authors = new AuthorCollection();

        foreach($copyright->getAuthorElements() as $authorElement) {
            $authors->add(
                new Author(
                    $authorElement->getName(),
                    new Email($authorElement->getEmail())
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                )
            );
        }

        $licenseElement = $copyright->getLicenseElement();
        $license        = new License(
            $licenseElement->getType(),
            new Url($licenseElement->getUrl())
        );

        return new CopyrightInformation(
            $authors,
            $license
        );
    }

<<<<<<< HEAD
    private function mapRequirements(RequiresElement $requires): RequirementCollection {
=======
    /**
     * @param RequiresElement $requires
     *
     * @return RequirementCollection
     *
     * @throws ManifestDocumentMapperException
     */
    private function mapRequirements(RequiresElement $requires) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $collection = new RequirementCollection();
        $phpElement = $requires->getPHPElement();
        $parser     = new VersionConstraintParser;

        try {
            $versionConstraint = $parser->parse($phpElement->getVersion());
        } catch (VersionException $e) {
            throw new ManifestDocumentMapperException(
                sprintf('Unsupported version constraint - %s', $e->getMessage()),
<<<<<<< HEAD
                (int)$e->getCode(),
=======
                $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $e
            );
        }

        $collection->add(
            new PhpVersionRequirement(
                $versionConstraint
            )
        );

        if (!$phpElement->hasExtElements()) {
            return $collection;
        }

<<<<<<< HEAD
        foreach ($phpElement->getExtElements() as $extElement) {
=======
        foreach($phpElement->getExtElements() as $extElement) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $collection->add(
                new PhpExtensionRequirement($extElement->getName())
            );
        }

        return $collection;
    }

<<<<<<< HEAD
    private function mapBundledComponents(ManifestDocument $document): BundledComponentCollection {
=======
    /**
     * @param ManifestDocument $document
     *
     * @return BundledComponentCollection
     */
    private function mapBundledComponents(ManifestDocument $document) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $collection = new BundledComponentCollection();

        if (!$document->hasBundlesElement()) {
            return $collection;
        }

<<<<<<< HEAD
        foreach ($document->getBundlesElement()->getComponentElements() as $componentElement) {
=======
        foreach($document->getBundlesElement()->getComponentElements() as $componentElement) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $collection->add(
                new BundledComponent(
                    $componentElement->getName(),
                    new Version(
                        $componentElement->getVersion()
                    )
                )
            );
        }

        return $collection;
    }

<<<<<<< HEAD
    private function mapExtension(ExtensionElement $extension): Extension {
        try {
            $versionConstraint = (new VersionConstraintParser)->parse($extension->getCompatible());
=======
    /**
     * @param ExtensionElement $extension
     *
     * @return Extension
     *
     * @throws ManifestDocumentMapperException
     */
    private function mapExtension(ExtensionElement $extension) {
        try {
            $parser            = new VersionConstraintParser;
            $versionConstraint = $parser->parse($extension->getCompatible());
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            return Type::extension(
                new ApplicationName($extension->getFor()),
                $versionConstraint
            );
        } catch (VersionException $e) {
            throw new ManifestDocumentMapperException(
                sprintf('Unsupported version constraint - %s', $e->getMessage()),
<<<<<<< HEAD
                (int)$e->getCode(),
=======
                $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $e
            );
        }
    }
}
