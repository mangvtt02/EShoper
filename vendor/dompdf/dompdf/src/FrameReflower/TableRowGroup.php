<?php
/**
 * @package dompdf
 * @link    http://dompdf.github.com/
 * @author  Benj Carson <benjcarson@digitaljunkies.ca>
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */
namespace Dompdf\FrameReflower;

use Dompdf\FrameDecorator\Block as BlockFrameDecorator;
use Dompdf\FrameDecorator\Table as TableFrameDecorator;
<<<<<<< HEAD
use Dompdf\FrameDecorator\TableRowGroup as TableRowGroupFrameDecorator;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * Reflows table row groups (e.g. tbody tags)
 *
 * @package dompdf
 */
class TableRowGroup extends AbstractFrameReflower
{

    /**
     * TableRowGroup constructor.
<<<<<<< HEAD
     * @param TableRowGroupFrameDecorator $frame
     */
    function __construct(TableRowGroupFrameDecorator $frame)
=======
     * @param \Dompdf\Frame $frame
     */
    function __construct($frame)
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
        /** @var TableRowGroupFrameDecorator */
        $frame = $this->_frame;
        $page = $frame->get_root();

        // Counters and generated content
        $this->_set_content();

        $style = $frame->get_style();
        $cb = $frame->get_containing_block();

        foreach ($frame->get_children() as $child) {
            $child->set_containing_block($cb["x"], $cb["y"], $cb["w"], $cb["h"]);
            $child->reflow();

            // Check if a split has occurred
            $page->check_page_break($child);

            if ($page->is_full()) {
                break;
            }
        }

        $table = TableFrameDecorator::find_parent_table($frame);
        $cellmap = $table->get_cellmap();

        // Stop reflow if a page break has occurred before the frame, in which
        // case it is not part of its parent table's cell map yet
        if ($page->is_full() && !$cellmap->frame_exists_in_cellmap($frame)) {
            return;
        }

        $style->width = $cellmap->get_frame_width($frame);
        $style->height = $cellmap->get_frame_height($frame);

        $frame->set_position($cellmap->get_frame_position($frame));
=======
        $page = $this->_frame->get_root();

        $style = $this->_frame->get_style();

        // Our width is equal to the width of our parent table
        $table = TableFrameDecorator::find_parent_table($this->_frame);

        $cb = $this->_frame->get_containing_block();

        foreach ($this->_frame->get_children() as $child) {
            // Bail if the page is full
            if ($page->is_full()) {
                return;
            }

            $child->set_containing_block($cb["x"], $cb["y"], $cb["w"], $cb["h"]);
            $child->reflow();

            // Check if a split has occured
            $page->check_page_break($child);
        }

        if ($page->is_full()) {
            return;
        }

        $cellmap = $table->get_cellmap();
        $style->width = $cellmap->get_frame_width($this->_frame);
        $style->height = $cellmap->get_frame_height($this->_frame);

        $this->_frame->set_position($cellmap->get_frame_position($this->_frame));

        if ($table->get_style()->border_collapse === "collapse") {
            // Unset our borders because our cells are now using them
            $style->border_style = "none";
        }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
