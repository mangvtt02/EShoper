<?php
/**
 * @package dompdf
 * @link    http://dompdf.github.com/
 * @author  Benj Carson <benjcarson@digitaljunkies.ca>
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */
namespace Dompdf\FrameDecorator;

use Dompdf\Dompdf;
use Dompdf\Frame;

/**
 * Table row group decorator
 *
 * Overrides split() method for tbody, thead & tfoot elements
 *
 * @package dompdf
 */
class TableRowGroup extends AbstractFrameDecorator
{

    /**
     * Class constructor
     *
     * @param Frame $frame   Frame to decorate
     * @param Dompdf $dompdf Current dompdf instance
     */
    function __construct(Frame $frame, Dompdf $dompdf)
    {
        parent::__construct($frame, $dompdf);
    }

    /**
<<<<<<< HEAD
     * Split the row group at the given child and remove all subsequent child
     * rows and all subsequent row groups from the cellmap.
     */
    public function split(?Frame $child = null, bool $page_break = false, bool $forced = false): void
    {
        if (is_null($child)) {
            parent::split($child, $page_break, $forced);
=======
     * Override split() to remove all child rows and this element from the cellmap
     *
     * @param Frame $child
     * @param bool $force_pagebreak
     *
     * @return void
     */
    function split(Frame $child = null, $force_pagebreak = false)
    {
        if (is_null($child)) {
            parent::split();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return;
        }

        // Remove child & all subsequent rows from the cellmap
        $cellmap = $this->get_parent()->get_cellmap();
        $iter = $child;

        while ($iter) {
            $cellmap->remove_row($iter);
            $iter = $iter->get_next_sibling();
        }

<<<<<<< HEAD
        // Remove all subsequent row groups from the cellmap
        $iter = $this->get_next_sibling();

        while ($iter) {
            $cellmap->remove_row_group($iter);
            $iter = $iter->get_next_sibling();
        }

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        // If we are splitting at the first child remove the
        // table-row-group from the cellmap as well
        if ($child === $this->get_first_child()) {
            $cellmap->remove_row_group($this);
<<<<<<< HEAD
            parent::split(null, $page_break, $forced);
=======
            parent::split();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return;
        }

        $cellmap->update_row_group($this, $child->get_prev_sibling());
<<<<<<< HEAD
        parent::split($child, $page_break, $forced);
    }
}
=======
        parent::split($child);
    }
}

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
