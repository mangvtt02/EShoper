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

use Svg\Style;

class ClipPath extends AbstractTag
{
    protected function before($attributes)
    {
        $surface = $this->document->getSurface();

        $surface->save();

        $style = $this->makeStyle($attributes);

        $this->setStyle($style);
        $surface->setStyle($style);

        $this->applyTransform($attributes);
    }

    protected function after()
    {
        $this->document->getSurface()->restore();
    }
<<<<<<< HEAD
} 
=======
} 
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
