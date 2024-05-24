<?php
/**
 * @package dompdf
 * @link    http://dompdf.github.com/
 * @author  Benj Carson <benjcarson@digitaljunkies.ca>
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */
namespace Dompdf\FrameReflower;

use Dompdf\FrameDecorator\Block as BlockFrameDecorator;
<<<<<<< HEAD
use Dompdf\FrameDecorator\ListBullet as ListBulletFrameDecorator;
=======
use Dompdf\FrameDecorator\AbstractFrameDecorator;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * Reflows list bullets
 *
 * @package dompdf
 */
class ListBullet extends AbstractFrameReflower
{

    /**
     * ListBullet constructor.
<<<<<<< HEAD
     * @param ListBulletFrameDecorator $frame
     */
    function __construct(ListBulletFrameDecorator $frame)
=======
     * @param AbstractFrameDecorator $frame
     */
    function __construct(AbstractFrameDecorator $frame)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        parent::__construct($frame);
    }

    /**
     * @param BlockFrameDecorator|null $block
     */
    function reflow(BlockFrameDecorator $block = null)
    {
<<<<<<< HEAD
        /** @var ListBulletFrameDecorator */
        $frame = $this->_frame;
        $style = $frame->get_style();

        $style->width = $frame->get_width();
        $frame->position();

        if ($style->list_style_position === "inside") {
            $block->add_frame_to_line($frame);
        } else {
            $block->add_dangling_marker($frame);
=======
        $style = $this->_frame->get_style();

        $style->width = $this->_frame->get_width();
        $this->_frame->position();

        if ($style->list_style_position === "inside") {
            $p = $this->_frame->find_block_parent();
            $p->add_frame_to_line($this->_frame);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }
    }
}
