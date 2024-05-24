<?php

declare(strict_types=1);

namespace League\MimeTypeDetection;

<<<<<<< HEAD
use const FILEINFO_MIME_TYPE;

use const PATHINFO_EXTENSION;
use finfo;

class FinfoMimeTypeDetector implements MimeTypeDetector, ExtensionLookup
{
    private const INCONCLUSIVE_MIME_TYPES = [
        'application/x-empty',
        'text/plain',
        'text/x-asm',
        'application/octet-stream',
        'inode/x-empty',
    ];
=======
use finfo;

use const FILEINFO_MIME_TYPE;
use const PATHINFO_EXTENSION;

class FinfoMimeTypeDetector implements MimeTypeDetector
{
    private const INCONCLUSIVE_MIME_TYPES = ['application/x-empty', 'text/plain', 'text/x-asm'];
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * @var finfo
     */
    private $finfo;

    /**
     * @var ExtensionToMimeTypeMap
     */
    private $extensionMap;

<<<<<<< HEAD
    /**
     * @var int|null
     */
    private $bufferSampleSize;

    /**
     * @var array<string>
     */
    private $inconclusiveMimetypes;

    public function __construct(
        string $magicFile = '',
        ExtensionToMimeTypeMap $extensionMap = null,
        ?int $bufferSampleSize = null,
        array $inconclusiveMimetypes = self::INCONCLUSIVE_MIME_TYPES
    ) {
        $this->finfo = new finfo(FILEINFO_MIME_TYPE, $magicFile);
        $this->extensionMap = $extensionMap ?: new GeneratedExtensionToMimeTypeMap();
        $this->bufferSampleSize = $bufferSampleSize;
        $this->inconclusiveMimetypes = $inconclusiveMimetypes;
=======
    public function __construct(string $magicFile = '', ExtensionToMimeTypeMap $extensionMap = null)
    {
        $this->finfo = new finfo(FILEINFO_MIME_TYPE, $magicFile);
        $this->extensionMap = $extensionMap ?: new GeneratedExtensionToMimeTypeMap();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    public function detectMimeType(string $path, $contents): ?string
    {
        $mimeType = is_string($contents)
<<<<<<< HEAD
            ? (@$this->finfo->buffer($this->takeSample($contents)) ?: null)
            : null;

        if ($mimeType !== null && ! in_array($mimeType, $this->inconclusiveMimetypes)) {
=======
            ? (@$this->finfo->buffer($contents) ?: null)
            : null;

        if ($mimeType !== null && ! in_array($mimeType, self::INCONCLUSIVE_MIME_TYPES)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return $mimeType;
        }

        return $this->detectMimeTypeFromPath($path);
    }

    public function detectMimeTypeFromPath(string $path): ?string
    {
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

        return $this->extensionMap->lookupMimeType($extension);
    }

    public function detectMimeTypeFromFile(string $path): ?string
    {
        return @$this->finfo->file($path) ?: null;
    }

    public function detectMimeTypeFromBuffer(string $contents): ?string
    {
<<<<<<< HEAD
        return @$this->finfo->buffer($this->takeSample($contents)) ?: null;
    }

    private function takeSample(string $contents): string
    {
        if ($this->bufferSampleSize === null) {
            return $contents;
        }

        return (string) substr($contents, 0, $this->bufferSampleSize);
    }

    public function lookupExtension(string $mimetype): ?string
    {
        return $this->extensionMap instanceof ExtensionLookup
            ? $this->extensionMap->lookupExtension($mimetype)
            : null;
    }

    public function lookupAllExtensions(string $mimetype): array
    {
        return $this->extensionMap instanceof ExtensionLookup
            ? $this->extensionMap->lookupAllExtensions($mimetype)
            : [];
    }
}
=======
        return @$this->finfo->buffer($contents) ?: null;
    }
}

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
