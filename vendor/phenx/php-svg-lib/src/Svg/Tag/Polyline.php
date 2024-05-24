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

class Polyline extends Shape
{
    public function start($attributes)
    {
        $tmp = array();
        preg_match_all('/([\-]*[0-9\.]+)/', $attributes['points'], $tmp);

        $points = $tmp[0];
        $count = count($points);

        $surface = $this->document->getSurface();
        list($x, $y) = $points;
        $surface->moveTo($x, $y);

        for ($i = 2; $i < $count; $i += 2) {
            $x = $points[$i];
            $y = $points[$i + 1];
            $surface->lineTo($x, $y);
        }
    }
<<<<<<< HEAD
} 
=======
} 
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
