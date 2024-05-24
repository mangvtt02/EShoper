<?php
/**
 * @package php-svg-lib
 * @link    http://github.com/PhenX/php-svg-lib
<<<<<<< HEAD
 * @author  Fabien MÃ©nager <fabien.menager@gmail.com>
=======
 * @author  Fabien Ménager <fabien.menager@gmail.com>
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 * @license GNU LGPLv3+ http://www.gnu.org/copyleft/lesser.html
 */

namespace Svg\Tag;

class Circle extends Shape
{
    protected $cx = 0;
    protected $cy = 0;
    protected $r;

    public function start($attributes)
    {
        if (isset($attributes['cx'])) {
            $this->cx = $attributes['cx'];
        }
        if (isset($attributes['cy'])) {
            $this->cy = $attributes['cy'];
        }
        if (isset($attributes['r'])) {
            $this->r = $attributes['r'];
        }

        $this->document->getSurface()->circle($this->cx, $this->cy, $this->r);
    }
<<<<<<< HEAD
} 
=======
} 
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
