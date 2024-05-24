<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * FileBag is a container for uploaded files.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Bulat Shakirzyanov <mallluhuct@gmail.com>
 */
class FileBag extends ParameterBag
{
<<<<<<< HEAD
    private const FILE_KEYS = ['error', 'name', 'size', 'tmp_name', 'type'];
=======
    private static $fileKeys = ['error', 'name', 'size', 'tmp_name', 'type'];
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * @param array|UploadedFile[] $parameters An array of HTTP files
     */
    public function __construct(array $parameters = [])
    {
        $this->replace($parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function replace(array $files = [])
    {
        $this->parameters = [];
        $this->add($files);
    }

    /**
     * {@inheritdoc}
     */
    public function set($key, $value)
    {
        if (!\is_array($value) && !$value instanceof UploadedFile) {
            throw new \InvalidArgumentException('An uploaded file must be an array or an instance of UploadedFile.');
        }

        parent::set($key, $this->convertFileInformation($value));
    }

    /**
     * {@inheritdoc}
     */
    public function add(array $files = [])
    {
        foreach ($files as $key => $file) {
            $this->set($key, $file);
        }
    }

    /**
     * Converts uploaded files to UploadedFile instances.
     *
     * @param array|UploadedFile $file A (multi-dimensional) array of uploaded file information
     *
     * @return UploadedFile[]|UploadedFile|null A (multi-dimensional) array of UploadedFile instances
     */
    protected function convertFileInformation($file)
    {
        if ($file instanceof UploadedFile) {
            return $file;
        }

<<<<<<< HEAD
        $file = $this->fixPhpFilesArray($file);
        $keys = array_keys($file);
        sort($keys);

        if (self::FILE_KEYS == $keys) {
            if (\UPLOAD_ERR_NO_FILE == $file['error']) {
                $file = null;
            } else {
                $file = new UploadedFile($file['tmp_name'], $file['name'], $file['type'], $file['error'], false);
            }
        } else {
            $file = array_map(function ($v) { return $v instanceof UploadedFile || \is_array($v) ? $this->convertFileInformation($v) : $v; }, $file);
            if (array_keys($keys) === $keys) {
                $file = array_filter($file);
=======
        if (\is_array($file)) {
            $file = $this->fixPhpFilesArray($file);
            $keys = array_keys($file);
            sort($keys);

            if ($keys == self::$fileKeys) {
                if (\UPLOAD_ERR_NO_FILE == $file['error']) {
                    $file = null;
                } else {
                    $file = new UploadedFile($file['tmp_name'], $file['name'], $file['type'], $file['error'], false);
                }
            } else {
                $file = array_map([$this, 'convertFileInformation'], $file);
                if (array_keys($keys) === $keys) {
                    $file = array_filter($file);
                }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }
        }

        return $file;
    }

    /**
     * Fixes a malformed PHP $_FILES array.
     *
     * PHP has a bug that the format of the $_FILES array differs, depending on
     * whether the uploaded file fields had normal field names or array-like
     * field names ("normal" vs. "parent[child]").
     *
     * This method fixes the array to look like the "normal" $_FILES array.
     *
     * It's safe to pass an already converted array, in which case this method
     * just returns the original array unmodified.
     *
     * @param array $data
     *
     * @return array
     */
    protected function fixPhpFilesArray($data)
    {
<<<<<<< HEAD
        // Remove extra key added by PHP 8.1.
        unset($data['full_path']);
        $keys = array_keys($data);
        sort($keys);

        if (self::FILE_KEYS != $keys || !isset($data['name']) || !\is_array($data['name'])) {
=======
        $keys = array_keys($data);
        sort($keys);

        if (self::$fileKeys != $keys || !isset($data['name']) || !\is_array($data['name'])) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return $data;
        }

        $files = $data;
<<<<<<< HEAD
        foreach (self::FILE_KEYS as $k) {
=======
        foreach (self::$fileKeys as $k) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            unset($files[$k]);
        }

        foreach ($data['name'] as $key => $name) {
            $files[$key] = $this->fixPhpFilesArray([
                'error' => $data['error'][$key],
                'name' => $name,
                'type' => $data['type'][$key],
                'tmp_name' => $data['tmp_name'][$key],
                'size' => $data['size'][$key],
            ]);
        }

        return $files;
    }
}
