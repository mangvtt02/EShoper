<<<<<<< HEAD
<?php declare(strict_types = 1);
namespace PharIo\Version;

class VersionConstraintValue {
    /** @var VersionNumber */
    private $major;

    /** @var VersionNumber */
    private $minor;

    /** @var VersionNumber */
    private $patch;

    /** @var string */
    private $label = '';

    /** @var string */
    private $buildMetaData = '';

    /** @var string */
    private $versionString = '';

    public function __construct(string $versionString) {
=======
<?php

namespace PharIo\Version;

class VersionConstraintValue {
    /**
     * @var VersionNumber
     */
    private $major;

    /**
     * @var VersionNumber
     */
    private $minor;

    /**
     * @var VersionNumber
     */
    private $patch;

    /**
     * @var string
     */
    private $label = '';

    /**
     * @var string
     */
    private $buildMetaData = '';

    /**
     * @var string
     */
    private $versionString = '';

    /**
     * @param string $versionString
     */
    public function __construct($versionString) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->versionString = $versionString;

        $this->parseVersion($versionString);
    }

<<<<<<< HEAD
    public function getLabel(): string {
        return $this->label;
    }

    public function getBuildMetaData(): string {
        return $this->buildMetaData;
    }

    public function getVersionString(): string {
        return $this->versionString;
    }

    public function getMajor(): VersionNumber {
        return $this->major;
    }

    public function getMinor(): VersionNumber {
        return $this->minor;
    }

    public function getPatch(): VersionNumber {
        return $this->patch;
    }

    private function parseVersion(string $versionString): void {
        $this->extractBuildMetaData($versionString);
        $this->extractLabel($versionString);
        $this->stripPotentialVPrefix($versionString);

        $versionSegments = \explode('.', $versionString);
        $this->major     = new VersionNumber(\is_numeric($versionSegments[0]) ? (int)$versionSegments[0] : null);

        $minorValue = isset($versionSegments[1]) && \is_numeric($versionSegments[1]) ? (int)$versionSegments[1] : null;
        $patchValue = isset($versionSegments[2]) && \is_numeric($versionSegments[2]) ? (int)$versionSegments[2] : null;
=======
    /**
     * @return string
     */
    public function getLabel() {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getBuildMetaData() {
        return $this->buildMetaData;
    }

    /**
     * @return string
     */
    public function getVersionString() {
        return $this->versionString;
    }

    /**
     * @return VersionNumber
     */
    public function getMajor() {
        return $this->major;
    }

    /**
     * @return VersionNumber
     */
    public function getMinor() {
        return $this->minor;
    }

    /**
     * @return VersionNumber
     */
    public function getPatch() {
        return $this->patch;
    }

    /**
     * @param $versionString
     */
    private function parseVersion($versionString) {
        $this->extractBuildMetaData($versionString);
        $this->extractLabel($versionString);

        $versionSegments = explode('.', $versionString);
        $this->major = new VersionNumber($versionSegments[0]);

        $minorValue = isset($versionSegments[1]) ? $versionSegments[1] : null;
        $patchValue = isset($versionSegments[2]) ? $versionSegments[2] : null;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        $this->minor = new VersionNumber($minorValue);
        $this->patch = new VersionNumber($patchValue);
    }

<<<<<<< HEAD
    private function extractBuildMetaData(string &$versionString): void {
        if (\preg_match('/\+(.*)/', $versionString, $matches) === 1) {
            $this->buildMetaData = $matches[1];
            $versionString       = \str_replace($matches[0], '', $versionString);
        }
    }

    private function extractLabel(string &$versionString): void {
        if (\preg_match('/-(.*)/', $versionString, $matches) === 1) {
            $this->label   = $matches[1];
            $versionString = \str_replace($matches[0], '', $versionString);
        }
    }

    private function stripPotentialVPrefix(string &$versionString): void {
        if ($versionString[0] !== 'v') {
            return;
        }
        $versionString = \substr($versionString, 1);
    }
=======
    /**
     * @param string $versionString
     */
    private function extractBuildMetaData(&$versionString) {
        if (preg_match('/\+(.*)/', $versionString, $matches) == 1) {
            $this->buildMetaData = $matches[1];
            $versionString = str_replace($matches[0], '', $versionString);
        }
    }

    /**
     * @param string $versionString
     */
    private function extractLabel(&$versionString) {
        if (preg_match('/\-(.*)/', $versionString, $matches) == 1) {
            $this->label = $matches[1];
            $versionString = str_replace($matches[0], '', $versionString);
        }
    }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
