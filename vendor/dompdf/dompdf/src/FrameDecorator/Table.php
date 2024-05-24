<?php
/**
 * @package dompdf
 * @link    http://dompdf.github.com/
 * @author  Benj Carson <benjcarson@digitaljunkies.ca>
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */
namespace Dompdf\FrameDecorator;

use Dompdf\Cellmap;
use DOMNode;
<<<<<<< HEAD
use Dompdf\Css\Style;
use Dompdf\Dompdf;
use Dompdf\Frame;
=======
use Dompdf\Dompdf;
use Dompdf\Frame;
use Dompdf\Frame\Factory;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * Decorates Frames for table layout
 *
 * @package dompdf
 */
class Table extends AbstractFrameDecorator
{
<<<<<<< HEAD
    public static $VALID_CHILDREN = Style::TABLE_INTERNAL_TYPES;

    public static $ROW_GROUPS = [
        "table-row-group",
        "table-header-group",
        "table-footer-group"
=======
    public static $VALID_CHILDREN = [
        "table-row-group",
        "table-row",
        "table-header-group",
        "table-footer-group",
        "table-column",
        "table-column-group",
        "table-caption",
        "table-cell"
    ];

    public static $ROW_GROUPS = [
        'table-row-group',
        'table-header-group',
        'table-footer-group'
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    ];

    /**
     * The Cellmap object for this table.  The cellmap maps table cells
     * to rows and columns, and aids in calculating column widths.
     *
<<<<<<< HEAD
     * @var Cellmap
=======
     * @var \Dompdf\Cellmap
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected $_cellmap;

    /**
     * The minimum width of the table, in pt
     *
     * @var float
     */
    protected $_min_width;

    /**
     * The maximum width of the table, in pt
     *
     * @var float
     */
    protected $_max_width;

    /**
     * Table header rows.  Each table header is duplicated when a table
     * spans pages.
     *
<<<<<<< HEAD
     * @var TableRowGroup[]
=======
     * @var array
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected $_headers;

    /**
     * Table footer rows.  Each table footer is duplicated when a table
     * spans pages.
     *
<<<<<<< HEAD
     * @var TableRowGroup[]
=======
     * @var array
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected $_footers;

    /**
     * Class constructor
     *
     * @param Frame $frame the frame to decorate
     * @param Dompdf $dompdf
     */
    public function __construct(Frame $frame, Dompdf $dompdf)
    {
        parent::__construct($frame, $dompdf);
        $this->_cellmap = new Cellmap($this);

        if ($frame->get_style()->table_layout === "fixed") {
            $this->_cellmap->set_layout_fixed(true);
        }

        $this->_min_width = null;
        $this->_max_width = null;
        $this->_headers = [];
        $this->_footers = [];
    }

    public function reset()
    {
        parent::reset();
        $this->_cellmap->reset();
        $this->_min_width = null;
        $this->_max_width = null;
        $this->_headers = [];
        $this->_footers = [];
        $this->_reflower->reset();
    }

    //........................................................................

    /**
<<<<<<< HEAD
     * Split the table at $row.  $row and all subsequent rows will be
     * added to the clone.  This method is overridden in order to remove
     * frames from the cellmap properly.
     */
    public function split(?Frame $child = null, bool $page_break = false, bool $forced = false): void
    {
        if (is_null($child)) {
            parent::split($child, $page_break, $forced);
=======
     * split the table at $row.  $row and all subsequent rows will be
     * added to the clone.  This method is overidden in order to remove
     * frames from the cellmap properly.
     *
     * @param Frame $child
     * @param bool $force_pagebreak
     *
     * @return void
     */
    public function split(Frame $child = null, $force_pagebreak = false)
    {
        if (is_null($child)) {
            parent::split();

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return;
        }

        // If $child is a header or if it is the first non-header row, do
        // not duplicate headers, simply move the table to the next page.
<<<<<<< HEAD
        if (count($this->_headers)
            && !in_array($child, $this->_headers, true)
            && !in_array($child->get_prev_sibling(), $this->_headers, true)
=======
        if (count($this->_headers) && !in_array($child, $this->_headers, true) &&
            !in_array($child->get_prev_sibling(), $this->_headers, true)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        ) {
            $first_header = null;

            // Insert copies of the table headers before $child
            foreach ($this->_headers as $header) {

                $new_header = $header->deep_copy();

                if (is_null($first_header)) {
                    $first_header = $new_header;
                }

                $this->insert_child_before($new_header, $child);
            }

<<<<<<< HEAD
            parent::split($first_header, $page_break, $forced);

        } elseif (in_array($child->get_style()->display, self::$ROW_GROUPS, true)) {

            // Individual rows should have already been handled
            parent::split($child, $page_break, $forced);
=======
            parent::split($first_header);

        } elseif (in_array($child->get_style()->display, self::$ROW_GROUPS)) {

            // Individual rows should have already been handled
            parent::split($child);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        } else {

            $iter = $child;

            while ($iter) {
                $this->_cellmap->remove_row($iter);
                $iter = $iter->get_next_sibling();
            }

<<<<<<< HEAD
            parent::split($child, $page_break, $forced);
        }
    }

=======
            parent::split($child);
        }
    }

    /**
     * Return a copy of this frame with $node as its node
     *
     * @param DOMNode $node
     *
     * @return Frame
     */
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function copy(DOMNode $node)
    {
        $deco = parent::copy($node);

        // In order to keep columns' widths through pages
        $deco->_cellmap->set_columns($this->_cellmap->get_columns());
        $deco->_cellmap->lock_columns();

        return $deco;
    }

    /**
     * Static function to locate the parent table of a frame
     *
     * @param Frame $frame
     *
     * @return Table the table that is an ancestor of $frame
     */
    public static function find_parent_table(Frame $frame)
    {
        while ($frame = $frame->get_parent()) {
            if ($frame->is_table()) {
                break;
            }
        }

        return $frame;
    }

    /**
     * Return this table's Cellmap
     *
<<<<<<< HEAD
     * @return Cellmap
=======
     * @return \Dompdf\Cellmap
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function get_cellmap()
    {
        return $this->_cellmap;
    }

    /**
     * Return the minimum width of this table
     *
     * @return float
     */
    public function get_min_width()
    {
        return $this->_min_width;
    }

    /**
     * Return the maximum width of this table
     *
     * @return float
     */
    public function get_max_width()
    {
        return $this->_max_width;
    }

    /**
     * Set the minimum width of the table
     *
     * @param float $width the new minimum width
     */
    public function set_min_width($width)
    {
        $this->_min_width = $width;
    }

    /**
     * Set the maximum width of the table
     *
     * @param float $width the new maximum width
     */
    public function set_max_width($width)
    {
        $this->_max_width = $width;
    }

<<<<<<< HEAD
    //........................................................................

    /**
     * Check for text nodes between valid table children that only contain white
     * space, except if white space is to be preserved.
     *
     * @param AbstractFrameDecorator $frame
     *
     * @return bool
     */
    private function isEmptyTextNode(AbstractFrameDecorator $frame): bool
    {
        // This is based on the white-space pattern in `FrameReflower\Text`,
        // i.e. only match on collapsible white space
        $wsPattern = '/^[^\S\xA0\x{202F}\x{2007}]*$/u';
        $validChildOrNull = function ($frame) {
            return $frame === null
                || in_array($frame->get_style()->display, self::$VALID_CHILDREN, true);
        };

        return $frame->is_text_node() && !$frame->is_pre()
            && preg_match($wsPattern, $frame->get_text())
            && $validChildOrNull($frame->get_prev_sibling())
            && $validChildOrNull($frame->get_next_sibling());
    }

    /**
     * Restructure tree so that the table has the correct structure. Misplaced
     * children are appropriately wrapped in anonymous row groups, rows, and
     * cells.
     *
     * https://www.w3.org/TR/CSS21/tables.html#anonymous-boxes
     */
    public function normalize(): void
    {
        $column_caption = ["table-column-group", "table-column", "table-caption"];
        $children = iterator_to_array($this->get_children());
        $tbody = null;

        foreach ($children as $child) {
            $display = $child->get_style()->display;

            if (in_array($display, self::$ROW_GROUPS, true)) {
                // Reset anonymous tbody
                $tbody = null;
=======
    /**
     * Restructure tree so that the table has the correct structure.
     * Invalid children (i.e. all non-table-rows) are moved below the
     * table.
     *
     * @fixme #1363 Method has some bugs. $table_row has not been initialized and lookup most likely could return an
     * array of Style instead a Style Object
     */
    public function normalise()
    {
        // Store frames generated by invalid tags and move them outside the table
        $erroneous_frames = [];
        $anon_row = false;
        $iter = $this->get_first_child();
        while ($iter) {
            $child = $iter;
            $iter = $iter->get_next_sibling();

            $display = $child->get_style()->display;

            if ($anon_row) {

                if ($display === "table-row") {
                    // Add the previous anonymous row
                    $this->insert_child_before($table_row, $child);

                    $table_row->normalise();
                    $child->normalise();
                    $this->_cellmap->add_row();
                    $anon_row = false;
                    continue;
                }

                // add the child to the anonymous row
                $table_row->append_child($child);
                continue;

            } else {

                if ($display === "table-row") {
                    $child->normalise();
                    continue;
                }

                if ($display === "table-cell") {
                    $css = $this->get_style()->get_stylesheet();

                    // Create an anonymous table row group
                    $tbody = $this->get_node()->ownerDocument->createElement("tbody");

                    $frame = new Frame($tbody);

                    $style = $css->create_style();
                    $style->inherit($this->get_style());

                    // Lookup styles for tbody tags.  If the user wants styles to work
                    // better, they should make the tbody explicit... I'm not going to
                    // try to guess what they intended.
                    if ($tbody_style = $css->lookup("tbody")) {
                        $style->merge($tbody_style);
                    }
                    $style->display = 'table-row-group';

                    // Okay, I have absolutely no idea why I need this clone here, but
                    // if it's omitted, php (as of 2004-07-28) segfaults.
                    $frame->set_style($style);
                    $table_row_group = Factory::decorate_frame($frame, $this->_dompdf, $this->_root);

                    // Create an anonymous table row
                    $tr = $this->get_node()->ownerDocument->createElement("tr");

                    $frame = new Frame($tr);

                    $style = $css->create_style();
                    $style->inherit($this->get_style());

                    // Lookup styles for tr tags.  If the user wants styles to work
                    // better, they should make the tr explicit... I'm not going to
                    // try to guess what they intended.
                    if ($tr_style = $css->lookup("tr")) {
                        $style->merge($tr_style);
                    }
                    $style->display = 'table-row';

                    // Okay, I have absolutely no idea why I need this clone here, but
                    // if it's omitted, php (as of 2004-07-28) segfaults.
                    $frame->set_style(clone $style);
                    $table_row = Factory::decorate_frame($frame, $this->_dompdf, $this->_root);

                    // Add the cell to the row
                    $table_row->append_child($child, true);

                    // Add the tr to the tbody
                    $table_row_group->append_child($table_row, true);

                    $anon_row = true;
                    continue;
                }

                if (!in_array($display, self::$VALID_CHILDREN)) {
                    $erroneous_frames[] = $child;
                    continue;
                }

                // Normalise other table parts (i.e. row groups)
                foreach ($child->get_children() as $grandchild) {
                    if ($grandchild->get_style()->display === "table-row") {
                        $grandchild->normalise();
                    }
                }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

                // Add headers and footers
                if ($display === "table-header-group") {
                    $this->_headers[] = $child;
                } elseif ($display === "table-footer-group") {
                    $this->_footers[] = $child;
                }
<<<<<<< HEAD
                continue;
            }

            if (in_array($display, $column_caption, true)) {
                continue;
            }

            // Remove empty text nodes between valid children
            if ($this->isEmptyTextNode($child)) {
                $this->remove_child($child);
                continue;
            }

            // Catch consecutive misplaced frames within a single anonymous group
            if ($tbody === null) {
                $tbody = $this->create_anonymous_child("tbody", "table-row-group");
                $this->insert_child_before($tbody, $child);
            }

            $tbody->append_child($child);
        }

        // Handle empty table: Make sure there is at least one row group
        if (!$this->get_first_child()) {
            $tbody = $this->create_anonymous_child("tbody", "table-row-group");
            $this->append_child($tbody);
        }

        foreach ($this->get_children() as $child) {
            $display = $child->get_style()->display;

            if (in_array($display, self::$ROW_GROUPS, true)) {
                $this->normalizeRowGroup($child);
            }
        }
    }

    private function normalizeRowGroup(AbstractFrameDecorator $frame): void
    {
        $children = iterator_to_array($frame->get_children());
        $tr = null;

        foreach ($children as $child) {
            $display = $child->get_style()->display;

            if ($display === "table-row") {
                // Reset anonymous tr
                $tr = null;
                continue;
            }

            // Remove empty text nodes between valid children
            if ($this->isEmptyTextNode($child)) {
                $frame->remove_child($child);
                continue;
            }

            // Catch consecutive misplaced frames within a single anonymous row
            if ($tr === null) {
                $tr = $frame->create_anonymous_child("tr", "table-row");
                $frame->insert_child_before($tr, $child);
            }

            $tr->append_child($child);
        }

        // Handle empty row group: Make sure there is at least one row
        if (!$frame->get_first_child()) {
            $tr = $frame->create_anonymous_child("tr", "table-row");
            $frame->append_child($tr);
        }

        foreach ($frame->get_children() as $child) {
            $this->normalizeRow($child);
        }
    }

    private function normalizeRow(AbstractFrameDecorator $frame): void
    {
        $children = iterator_to_array($frame->get_children());
        $td = null;

        foreach ($children as $child) {
            $display = $child->get_style()->display;

            if ($display === "table-cell") {
                // Reset anonymous td
                $td = null;
                continue;
            }

            // Remove empty text nodes between valid children
            if ($this->isEmptyTextNode($child)) {
                $frame->remove_child($child);
                continue;
            }

            // Catch consecutive misplaced frames within a single anonymous cell
            if ($td === null) {
                $td = $frame->create_anonymous_child("td", "table-cell");
                $frame->insert_child_before($td, $child);
            }

            $td->append_child($child);
        }

        // Handle empty row: Make sure there is at least one cell
        if (!$frame->get_first_child()) {
            $td = $frame->create_anonymous_child("td", "table-cell");
            $frame->append_child($td);
=======
            }
        }

        if ($anon_row && $table_row_group instanceof AbstractFrameDecorator) {
            // Add the row to the table
            $this->_frame->append_child($table_row_group->_frame);
            $table_row->normalise();
        }

        foreach ($erroneous_frames as $frame) {
            $this->move_after($frame);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }
    }

    //........................................................................

    /**
<<<<<<< HEAD
     * @deprecated
     */
    public function normalise()
    {
        $this->normalize();
    }

    /**
     * Moves the specified frame and it's corresponding node outside of
     * the table.
     *
     * @deprecated
=======
     * Moves the specified frame and it's corresponding node outside of
     * the table.
     *
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @param Frame $frame the frame to move
     */
    public function move_after(Frame $frame)
    {
        $this->get_parent()->insert_child_after($frame, $this);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
