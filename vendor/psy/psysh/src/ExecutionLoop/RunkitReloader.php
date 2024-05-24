<?php

/*
 * This file is part of Psy Shell.
 *
<<<<<<< HEAD
 * (c) 2012-2023 Justin Hileman
=======
 * (c) 2012-2020 Justin Hileman
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Psy\ExecutionLoop;

use Psy\Exception\ParseErrorException;
use Psy\ParserFactory;
use Psy\Shell;

/**
 * A runkit-based code reloader, which is pretty much magic.
<<<<<<< HEAD
 *
 * @todo Remove RunkitReloader once we drop support for PHP 7.x :(
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 */
class RunkitReloader extends AbstractListener
{
    private $parser;
    private $timestamps = [];

    /**
     * Only enabled if Runkit is installed.
<<<<<<< HEAD
     */
    public static function isSupported(): bool
    {
        // runkit_import was removed in runkit7-4.0.0a1
        return \extension_loaded('runkit') || \extension_loaded('runkit7') && \function_exists('runkit_import');
=======
     *
     * @return bool
     */
    public static function isSupported()
    {
        return \extension_loaded('runkit');
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Construct a Runkit Reloader.
<<<<<<< HEAD
     */
    public function __construct()
    {
        $this->parser = (new ParserFactory())->createParser();
=======
     *
     * @todo Pass in Parser Factory instance for dependency injection?
     */
    public function __construct()
    {
        $parserFactory = new ParserFactory();
        $this->parser = $parserFactory->createParser();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Reload code on input.
     *
     * @param Shell  $shell
     * @param string $input
     */
<<<<<<< HEAD
    public function onInput(Shell $shell, string $input)
=======
    public function onInput(Shell $shell, $input)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->reload($shell);
    }

    /**
     * Look through included files and update anything with a new timestamp.
     *
     * @param Shell $shell
     */
    private function reload(Shell $shell)
    {
        \clearstatcache();
        $modified = [];

        foreach (\get_included_files() as $file) {
            $timestamp = \filemtime($file);

            if (!isset($this->timestamps[$file])) {
                $this->timestamps[$file] = $timestamp;
                continue;
            }

            if ($this->timestamps[$file] === $timestamp) {
                continue;
            }

            if (!$this->lintFile($file)) {
                $msg = \sprintf('Modified file "%s" could not be reloaded', $file);
                $shell->writeException(new ParseErrorException($msg));
                continue;
            }

            $modified[] = $file;
            $this->timestamps[$file] = $timestamp;
        }

        // switch (count($modified)) {
        //     case 0:
        //         return;

        //     case 1:
        //         printf("Reloading modified file: \"%s\"\n", str_replace(getcwd(), '.', $file));
        //         break;

        //     default:
        //         printf("Reloading %d modified files\n", count($modified));
        //         break;
        // }

        foreach ($modified as $file) {
<<<<<<< HEAD
            $flags = (
=======
            runkit_import($file, (
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                RUNKIT_IMPORT_FUNCTIONS |
                RUNKIT_IMPORT_CLASSES |
                RUNKIT_IMPORT_CLASS_METHODS |
                RUNKIT_IMPORT_CLASS_CONSTS |
                RUNKIT_IMPORT_CLASS_PROPS |
                RUNKIT_IMPORT_OVERRIDE
<<<<<<< HEAD
            );

            // these two const cannot be used with RUNKIT_IMPORT_OVERRIDE  in runkit7
            if (\extension_loaded('runkit7')) {
                $flags &= ~RUNKIT_IMPORT_CLASS_PROPS & ~RUNKIT_IMPORT_CLASS_STATIC_PROPS;
                runkit7_import($file, $flags);
            } else {
                runkit_import($file, $flags);
            }
=======
            ));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }
    }

    /**
     * Should this file be re-imported?
     *
     * Use PHP-Parser to ensure that the file is valid PHP.
     *
     * @param string $file
<<<<<<< HEAD
     */
    private function lintFile(string $file): bool
=======
     *
     * @return bool
     */
    private function lintFile($file)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        // first try to parse it
        try {
            $this->parser->parse(\file_get_contents($file));
<<<<<<< HEAD
        } catch (\Throwable $e) {
=======
        } catch (\Exception $e) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return false;
        }

        return true;
    }
}
