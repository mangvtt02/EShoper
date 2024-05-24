<?php
<<<<<<< HEAD

/**
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
=======
/**
 * Mockery
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://github.com/padraic/mockery/blob/master/LICENSE
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to padraic@php.net so we can send you a copy immediately.
 *
 * @category   Mockery
 * @package    Mockery
 * @copyright  Copyright (c) 2010 Pádraic Brady (http://blog.astrumfutura.com)
 * @license    http://github.com/padraic/mockery/blob/master/LICENSE New BSD License
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 */

namespace Mockery\Loader;

use Mockery\Generator\MockDefinition;
<<<<<<< HEAD

use function array_diff;
use function class_exists;
use function file_exists;
use function file_put_contents;
use function glob;
use function realpath;
use function sprintf;
use function sys_get_temp_dir;
use function uniqid;
use function unlink;

use const DIRECTORY_SEPARATOR;

class RequireLoader implements Loader
{
    /**
     * @var string
     */
    protected $lastPath = '';

    /**
     * @var string
     */
=======
use Mockery\Loader\Loader;

class RequireLoader implements Loader
{
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    protected $path;

    public function __construct($path = null)
    {
        $this->path = realpath($path) ?: sys_get_temp_dir();
    }

<<<<<<< HEAD
    public function __destruct()
    {
        $files = array_diff(glob($this->path . DIRECTORY_SEPARATOR . 'Mockery_*.php') ?: [], [$this->lastPath]);

        foreach ($files as $file) {
            @unlink($file);
        }
    }

    /**
     * Load the given mock definition
     *
     * @return void
     */
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function load(MockDefinition $definition)
    {
        if (class_exists($definition->getClassName(), false)) {
            return;
        }

<<<<<<< HEAD
        $this->lastPath = sprintf('%s%s%s.php', $this->path, DIRECTORY_SEPARATOR, uniqid('Mockery_', false));

        file_put_contents($this->lastPath, $definition->getCode());

        if (file_exists($this->lastPath)) {
            require $this->lastPath;
        }
=======
        $tmpfname = $this->path . DIRECTORY_SEPARATOR . "Mockery_" . uniqid() . ".php";
        file_put_contents($tmpfname, $definition->getCode());

        require $tmpfname;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
