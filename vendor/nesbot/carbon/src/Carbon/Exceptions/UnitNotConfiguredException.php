<?php

/**
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD

namespace Carbon\Exceptions;

use Throwable;
=======
namespace Carbon\Exceptions;

use Exception;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

class UnitNotConfiguredException extends UnitException
{
    /**
<<<<<<< HEAD
     * The unit.
     *
     * @var string
     */
    protected $unit;

    /**
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * Constructor.
     *
     * @param string         $unit
     * @param int            $code
<<<<<<< HEAD
     * @param Throwable|null $previous
     */
    public function __construct($unit, $code = 0, Throwable $previous = null)
    {
        $this->unit = $unit;

        parent::__construct("Unit $unit have no configuration to get total from other units.", $code, $previous);
    }

    /**
     * Get the unit.
     *
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }
=======
     * @param Exception|null $previous
     */
    public function __construct($unit, $code = 0, Exception $previous = null)
    {
        parent::__construct("Unit $unit have no configuration to get total from other units.", $code, $previous);
    }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
