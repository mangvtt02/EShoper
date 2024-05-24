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

namespace Psy\VarDumper;

use Symfony\Component\VarDumper\Caster\Caster;
<<<<<<< HEAD
use Symfony\Component\VarDumper\Cloner\Data;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Symfony\Component\VarDumper\Cloner\Stub;
use Symfony\Component\VarDumper\Cloner\VarCloner;

/**
 * A PsySH-specialized VarCloner.
 */
class Cloner extends VarCloner
{
    private $filter = 0;

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function cloneVar($var, $filter = 0): Data
=======
    public function cloneVar($var, $filter = 0)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->filter = $filter;

        return parent::cloneVar($var, $filter);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function castResource(Stub $stub, $isNested): array
=======
    protected function castResource(Stub $stub, $isNested)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return Caster::EXCLUDE_VERBOSE & $this->filter ? [] : parent::castResource($stub, $isNested);
    }
}
