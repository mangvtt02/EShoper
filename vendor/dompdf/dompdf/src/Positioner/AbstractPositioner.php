<?php
/**
 * @package dompdf
 * @link    http://dompdf.github.com/
 * @author  Benj Carson <benjcarson@digitaljunkies.ca>
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */

namespace Dompdf\Positioner;

use Dompdf\FrameDecorator\AbstractFrameDecorator;

/**
 * Base AbstractPositioner class
 *
 * Defines postioner interface
 *
 * @access  private
 * @package dompdf
 */
abstract class AbstractPositioner
{

    /**
     * @param AbstractFrameDecorator $frame
     * @return mixed
     */
    abstract function position(AbstractFrameDecorator $frame);

    /**
     * @param AbstractFrameDecorator $frame
<<<<<<< HEAD
     * @param float $offset_x
     * @param float $offset_y
=======
     * @param $offset_x
     * @param $offset_y
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @param bool $ignore_self
     */
    function move(AbstractFrameDecorator $frame, $offset_x, $offset_y, $ignore_self = false)
    {
        list($x, $y) = $frame->get_position();

        if (!$ignore_self) {
            $frame->set_position($x + $offset_x, $y + $offset_y);
        }

        foreach ($frame->get_children() as $child) {
            $child->move($offset_x, $offset_y);
        }
    }
}
