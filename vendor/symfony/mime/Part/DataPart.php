<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mime\Part;

use Symfony\Component\Mime\Exception\InvalidArgumentException;
use Symfony\Component\Mime\Header\Headers;
use Symfony\Component\Mime\MimeTypes;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
class DataPart extends TextPart
{
<<<<<<< HEAD
    /** @internal */
    protected $_parent;

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    private static $mimeTypes;

    private $filename;
    private $mediaType;
    private $cid;
    private $handle;

    /**
     * @param resource|string $body
     */
<<<<<<< HEAD
    public function __construct($body, ?string $filename = null, ?string $contentType = null, ?string $encoding = null)
    {
        unset($this->_parent);

        if (null === $contentType) {
            $contentType = 'application/octet-stream';
        }
        [$this->mediaType, $subtype] = explode('/', $contentType);

        parent::__construct($body, null, $subtype, $encoding);

        if (null !== $filename) {
            $this->filename = $filename;
            $this->setName($filename);
        }
        $this->setDisposition('attachment');
    }

    public static function fromPath(string $path, ?string $name = null, ?string $contentType = null): self
    {
=======
    public function __construct($body, string $filename = null, string $contentType = null, string $encoding = null)
    {
        if (null === $contentType) {
            $contentType = 'application/octet-stream';
        }
        list($this->mediaType, $subtype) = explode('/', $contentType);

        parent::__construct($body, null, $subtype, $encoding);

        $this->filename = $filename;
        $this->setName($filename);
        $this->setDisposition('attachment');
    }

    public static function fromPath(string $path, string $name = null, string $contentType = null): self
    {
        // FIXME: if file is not readable, exception?

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        if (null === $contentType) {
            $ext = strtolower(substr($path, strrpos($path, '.') + 1));
            if (null === self::$mimeTypes) {
                self::$mimeTypes = new MimeTypes();
            }
            $contentType = self::$mimeTypes->getMimeTypes($ext)[0] ?? 'application/octet-stream';
        }

<<<<<<< HEAD
        if ((is_file($path) && !is_readable($path)) || is_dir($path)) {
=======
        if (false === is_readable($path)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            throw new InvalidArgumentException(sprintf('Path "%s" is not readable.', $path));
        }

        if (false === $handle = @fopen($path, 'r', false)) {
            throw new InvalidArgumentException(sprintf('Unable to open path "%s".', $path));
        }
<<<<<<< HEAD

        if (!is_file($path)) {
            $cache = fopen('php://temp', 'r+');
            stream_copy_to_stream($handle, $cache);
            $handle = $cache;
        }

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $p = new self($handle, $name ?: basename($path), $contentType);
        $p->handle = $handle;

        return $p;
    }

    /**
     * @return $this
     */
    public function asInline()
    {
        return $this->setDisposition('inline');
    }

    public function getContentId(): string
    {
        return $this->cid ?: $this->cid = $this->generateContentId();
    }

    public function hasContentId(): bool
    {
        return null !== $this->cid;
    }

    public function getMediaType(): string
    {
        return $this->mediaType;
    }

    public function getPreparedHeaders(): Headers
    {
        $headers = parent::getPreparedHeaders();

        if (null !== $this->cid) {
            $headers->setHeaderBody('Id', 'Content-ID', $this->cid);
        }

        if (null !== $this->filename) {
            $headers->setHeaderParameter('Content-Disposition', 'filename', $this->filename);
        }

        return $headers;
    }

    public function asDebugString(): string
    {
        $str = parent::asDebugString();
        if (null !== $this->filename) {
            $str .= ' filename: '.$this->filename;
        }

        return $str;
    }

    private function generateContentId(): string
    {
        return bin2hex(random_bytes(16)).'@symfony';
    }

    public function __destruct()
    {
        if (null !== $this->handle && \is_resource($this->handle)) {
            fclose($this->handle);
        }
    }

    /**
     * @return array
     */
    public function __sleep()
    {
        // converts the body to a string
        parent::__sleep();

        $this->_parent = [];
        foreach (['body', 'charset', 'subtype', 'disposition', 'name', 'encoding'] as $name) {
            $r = new \ReflectionProperty(TextPart::class, $name);
            $r->setAccessible(true);
            $this->_parent[$name] = $r->getValue($this);
        }
        $this->_headers = $this->getHeaders();

        return ['_headers', '_parent', 'filename', 'mediaType'];
    }

    public function __wakeup()
    {
        $r = new \ReflectionProperty(AbstractPart::class, 'headers');
        $r->setAccessible(true);
        $r->setValue($this, $this->_headers);
        unset($this->_headers);

<<<<<<< HEAD
        if (!\is_array($this->_parent)) {
            throw new \BadMethodCallException('Cannot unserialize '.__CLASS__);
        }
        foreach (['body', 'charset', 'subtype', 'disposition', 'name', 'encoding'] as $name) {
            if (null !== $this->_parent[$name] && !\is_string($this->_parent[$name])) {
                throw new \BadMethodCallException('Cannot unserialize '.__CLASS__);
            }
=======
        foreach (['body', 'charset', 'subtype', 'disposition', 'name', 'encoding'] as $name) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $r = new \ReflectionProperty(TextPart::class, $name);
            $r->setAccessible(true);
            $r->setValue($this, $this->_parent[$name]);
        }
        unset($this->_parent);
    }
}
