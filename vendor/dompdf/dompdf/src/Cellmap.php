<?php
/**
 * @package dompdf
 * @link    http://dompdf.github.com/
 * @author  Benj Carson <benjcarson@digitaljunkies.ca>
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */
namespace Dompdf;

<<<<<<< HEAD
use Dompdf\FrameDecorator\AbstractFrameDecorator;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Dompdf\FrameDecorator\Table as TableFrameDecorator;
use Dompdf\FrameDecorator\TableCell as TableCellFrameDecorator;

/**
 * Maps table cells to the table grid.
 *
 * This class resolves borders in tables with collapsed borders and helps
 * place row & column spanned table cells.
 *
 * @package dompdf
 */
class Cellmap
{
    /**
     * Border style weight lookup for collapsed border resolution.
     *
     * @var array
     */
    protected static $_BORDER_STYLE_SCORE = [
<<<<<<< HEAD
        "double" => 8,
        "solid"  => 7,
        "dashed" => 6,
        "dotted" => 5,
        "ridge"  => 4,
        "outset" => 3,
        "groove" => 2,
        "inset"  => 1,
        "none"   => 0
=======
        "inset"  => 1,
        "groove" => 2,
        "outset" => 3,
        "ridge"  => 4,
        "dotted" => 5,
        "dashed" => 6,
        "solid"  => 7,
        "double" => 8,
        "hidden" => 9,
        "none"   => 0,
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    ];

    /**
     * The table object this cellmap is attached to.
     *
     * @var TableFrameDecorator
     */
    protected $_table;

    /**
     * The total number of rows in the table
     *
     * @var int
     */
    protected $_num_rows;

    /**
     * The total number of columns in the table
     *
     * @var int
     */
    protected $_num_cols;

    /**
     * 2D array mapping <row,column> to frames
     *
     * @var Frame[][]
     */
    protected $_cells;

    /**
     * 1D array of column dimensions
     *
     * @var array
     */
    protected $_columns;

    /**
     * 1D array of row dimensions
     *
     * @var array
     */
    protected $_rows;

    /**
     * 2D array of border specs
     *
     * @var array
     */
    protected $_borders;

    /**
     * 1D Array mapping frames to (multiple) <row, col> pairs, keyed on frame_id.
     *
<<<<<<< HEAD
     * @var array[]
=======
     * @var Frame[]
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected $_frames;

    /**
     * Current column when adding cells, 0-based
     *
     * @var int
     */
    private $__col;

    /**
     * Current row when adding cells, 0-based
     *
     * @var int
     */
    private $__row;

    /**
     * Tells whether the columns' width can be modified
     *
     * @var bool
     */
    private $_columns_locked = false;

    /**
     * Tells whether the table has table-layout:fixed
     *
     * @var bool
     */
    private $_fixed_layout = false;

    /**
     * @param TableFrameDecorator $table
     */
    public function __construct(TableFrameDecorator $table)
    {
        $this->_table = $table;
        $this->reset();
    }

    /**
     *
     */
    public function reset()
    {
        $this->_num_rows = 0;
        $this->_num_cols = 0;

        $this->_cells = [];
        $this->_frames = [];

        if (!$this->_columns_locked) {
            $this->_columns = [];
        }

        $this->_rows = [];

        $this->_borders = [];

        $this->__col = $this->__row = 0;
    }

    /**
     *
     */
    public function lock_columns()
    {
        $this->_columns_locked = true;
    }

    /**
     * @return bool
     */
    public function is_columns_locked()
    {
        return $this->_columns_locked;
    }

    /**
     * @param $fixed
     */
    public function set_layout_fixed($fixed)
    {
        $this->_fixed_layout = $fixed;
    }

    /**
     * @return bool
     */
    public function is_layout_fixed()
    {
        return $this->_fixed_layout;
    }

    /**
     * @return int
     */
    public function get_num_rows()
    {
        return $this->_num_rows;
    }

    /**
     * @return int
     */
    public function get_num_cols()
    {
        return $this->_num_cols;
    }

    /**
     * @return array
     */
    public function &get_columns()
    {
        return $this->_columns;
    }

    /**
     * @param $columns
     */
    public function set_columns($columns)
    {
        $this->_columns = $columns;
    }

    /**
     * @param int $i
     *
     * @return mixed
     */
    public function &get_column($i)
    {
        if (!isset($this->_columns[$i])) {
            $this->_columns[$i] = [
                "x"          => 0,
                "min-width"  => 0,
                "max-width"  => 0,
                "used-width" => null,
                "absolute"   => 0,
                "percent"    => 0,
                "auto"       => true,
            ];
        }

        return $this->_columns[$i];
    }

    /**
     * @return array
     */
    public function &get_rows()
    {
        return $this->_rows;
    }

    /**
     * @param int $j
     *
     * @return mixed
     */
    public function &get_row($j)
    {
        if (!isset($this->_rows[$j])) {
            $this->_rows[$j] = [
                "y"            => 0,
                "first-column" => 0,
                "height"       => null,
            ];
        }

        return $this->_rows[$j];
    }

    /**
     * @param int $i
     * @param int $j
     * @param mixed $h_v
     * @param null|mixed $prop
     *
     * @return mixed
     */
    public function get_border($i, $j, $h_v, $prop = null)
    {
        if (!isset($this->_borders[$i][$j][$h_v])) {
            $this->_borders[$i][$j][$h_v] = [
                "width" => 0,
                "style" => "solid",
                "color" => "black",
            ];
        }

        if (isset($prop)) {
            return $this->_borders[$i][$j][$h_v][$prop];
        }

        return $this->_borders[$i][$j][$h_v];
    }

    /**
     * @param int $i
     * @param int $j
     *
     * @return array
     */
    public function get_border_properties($i, $j)
    {
        return [
            "top"    => $this->get_border($i, $j, "horizontal"),
            "right"  => $this->get_border($i, $j + 1, "vertical"),
            "bottom" => $this->get_border($i + 1, $j, "horizontal"),
            "left"   => $this->get_border($i, $j, "vertical"),
        ];
    }

    /**
     * @param Frame $frame
     *
<<<<<<< HEAD
     * @return array|null
=======
     * @return null|Frame
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function get_spanned_cells(Frame $frame)
    {
        $key = $frame->get_id();

        if (isset($this->_frames[$key])) {
            return $this->_frames[$key];
        }

        return null;
    }

    /**
     * @param Frame $frame
     *
     * @return bool
     */
    public function frame_exists_in_cellmap(Frame $frame)
    {
        $key = $frame->get_id();

        return isset($this->_frames[$key]);
    }

    /**
     * @param Frame $frame
     *
     * @return array
     * @throws Exception
     */
    public function get_frame_position(Frame $frame)
    {
        global $_dompdf_warnings;

        $key = $frame->get_id();

        if (!isset($this->_frames[$key])) {
            throw new Exception("Frame not found in cellmap");
        }

<<<<<<< HEAD
        // Positions are stored relative to the table position
        [$table_x, $table_y] = $this->_table->get_position();
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $col = $this->_frames[$key]["columns"][0];
        $row = $this->_frames[$key]["rows"][0];

        if (!isset($this->_columns[$col])) {
            $_dompdf_warnings[] = "Frame not found in columns array.  Check your table layout for missing or extra TDs.";
<<<<<<< HEAD
            $x = $table_x;
        } else {
            $x = $table_x + $this->_columns[$col]["x"];
=======
            $x = 0;
        } else {
            $x = $this->_columns[$col]["x"];
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        if (!isset($this->_rows[$row])) {
            $_dompdf_warnings[] = "Frame not found in row array.  Check your table layout for missing or extra TDs.";
<<<<<<< HEAD
            $y = $table_y;
        } else {
            $y = $table_y + $this->_rows[$row]["y"];
=======
            $y = 0;
        } else {
            $y = $this->_rows[$row]["y"];
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return [$x, $y, "x" => $x, "y" => $y];
    }

    /**
     * @param Frame $frame
     *
     * @return int
     * @throws Exception
     */
    public function get_frame_width(Frame $frame)
    {
        $key = $frame->get_id();

        if (!isset($this->_frames[$key])) {
            throw new Exception("Frame not found in cellmap");
        }

        $cols = $this->_frames[$key]["columns"];
        $w = 0;
        foreach ($cols as $i) {
            $w += $this->_columns[$i]["used-width"];
        }

        return $w;
    }

    /**
     * @param Frame $frame
     *
     * @return int
     * @throws Exception
     * @throws Exception
     */
    public function get_frame_height(Frame $frame)
    {
        $key = $frame->get_id();

        if (!isset($this->_frames[$key])) {
            throw new Exception("Frame not found in cellmap");
        }

        $rows = $this->_frames[$key]["rows"];
        $h = 0;
        foreach ($rows as $i) {
            if (!isset($this->_rows[$i])) {
                throw new Exception("The row #$i could not be found, please file an issue in the tracker with the HTML code");
            }

            $h += $this->_rows[$i]["height"];
        }

        return $h;
    }

    /**
     * @param int $j
     * @param mixed $width
     */
    public function set_column_width($j, $width)
    {
        if ($this->_columns_locked) {
            return;
        }

        $col =& $this->get_column($j);
        $col["used-width"] = $width;
        $next_col =& $this->get_column($j + 1);
        $next_col["x"] = $col["x"] + $width;
    }

    /**
     * @param int $i
     * @param long $height
     */
    public function set_row_height($i, $height)
    {
        $row =& $this->get_row($i);
        if ($height > $row["height"]) {
            $row["height"] = $height;
        }
        $next_row =& $this->get_row($i + 1);
        $next_row["y"] = $row["y"] + $row["height"];
    }

    /**
<<<<<<< HEAD
     * https://www.w3.org/TR/CSS21/tables.html#border-conflict-resolution
     *
     * @param int $i
     * @param int $j
     * @param string $h_v
     * @param array $border_spec
     */
    protected function _resolve_border($i, $j, $h_v, $border_spec)
    {
        if (!isset($this->_borders[$i][$j][$h_v])) {
            $this->_borders[$i][$j][$h_v] = $border_spec;
            return;
        }

        $border = $this->_borders[$i][$j][$h_v];

        $n_width = $border_spec["width"];
        $n_style = $border_spec["style"];
        $o_width = $border["width"];
        $o_style = $border["style"];

        if ($o_style === "hidden") {
            return;
        }

        // A style of `none` has lowest priority independent of its specified
        // width here, as its resolved width is always 0
        if ($n_style === "hidden" || $n_width > $o_width
            || ($o_width == $n_width
                && isset(self::$_BORDER_STYLE_SCORE[$n_style])
                && isset(self::$_BORDER_STYLE_SCORE[$o_style])
                && self::$_BORDER_STYLE_SCORE[$n_style] > self::$_BORDER_STYLE_SCORE[$o_style])
        ) {
            $this->_borders[$i][$j][$h_v] = $border_spec;
        }
    }

    /**
     * Get the resolved border properties for the given frame.
     *
     * @param AbstractFrameDecorator $frame
     *
     * @return array[]
     */
    protected function get_resolved_border(AbstractFrameDecorator $frame): array
    {
        $key = $frame->get_id();
        $columns = $this->_frames[$key]["columns"];
        $rows = $this->_frames[$key]["rows"];

        $first_col = $columns[0];
        $last_col = $columns[count($columns) - 1];
        $first_row = $rows[0];
        $last_row = $rows[count($rows) - 1];

        $max_top = null;
        $max_bottom = null;
        $max_left = null;
        $max_right = null;

        foreach ($columns as $col) {
            $top = $this->_borders[$first_row][$col]["horizontal"];
            $bottom = $this->_borders[$last_row + 1][$col]["horizontal"];

            if ($max_top === null || $top["width"] > $max_top["width"]) {
                $max_top = $top;
            }
            if ($max_bottom === null || $bottom["width"] > $max_bottom["width"]) {
                $max_bottom = $bottom;
            }
        }

        foreach ($rows as $row) {
            $left = $this->_borders[$row][$first_col]["vertical"];
            $right = $this->_borders[$row][$last_col + 1]["vertical"];

            if ($max_left === null || $left["width"] > $max_left["width"]) {
                $max_left = $left;
            }
            if ($max_right === null || $right["width"] > $max_right["width"]) {
                $max_right = $right;
            }
        }

        return [$max_top, $max_right, $max_bottom, $max_left];
    }

    /**
     * @param AbstractFrameDecorator $frame
     */
    public function add_frame(Frame $frame): void
=======
     * @param int $i
     * @param int $j
     * @param mixed $h_v
     * @param mixed $border_spec
     *
     * @return mixed
     */
    protected function _resolve_border($i, $j, $h_v, $border_spec)
    {
        $n_width = $border_spec["width"];
        $n_style = $border_spec["style"];

        if (!isset($this->_borders[$i][$j][$h_v])) {
            $this->_borders[$i][$j][$h_v] = $border_spec;

            return $this->_borders[$i][$j][$h_v]["width"];
        }

        $border = & $this->_borders[$i][$j][$h_v];

        $o_width = $border["width"];
        $o_style = $border["style"];

        if (($n_style === "hidden" ||
                $n_width > $o_width ||
                $o_style === "none")

            or

            ($o_width == $n_width &&
                in_array($n_style, self::$_BORDER_STYLE_SCORE) &&
                self::$_BORDER_STYLE_SCORE[$n_style] > self::$_BORDER_STYLE_SCORE[$o_style])
        ) {
            $border = $border_spec;
        }

        return $border["width"];
    }

    /**
     * @param Frame $frame
     */
    public function add_frame(Frame $frame)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $style = $frame->get_style();
        $display = $style->display;

<<<<<<< HEAD
        $collapse = $this->_table->get_style()->border_collapse === "collapse";

        // Recursively add the frames within the table, its row groups and rows
        if ($frame === $this->_table
            || $display === "table-row"
            || in_array($display, TableFrameDecorator::$ROW_GROUPS, true)
        ) {
            $start_row = $this->__row;

            foreach ($frame->get_children() as $child) {
                $this->add_frame($child);
=======
        $collapse = $this->_table->get_style()->border_collapse == "collapse";

        // Recursively add the frames within tables, table-row-groups and table-rows
        if ($display === "table-row" ||
            $display === "table" ||
            $display === "inline-table" ||
            in_array($display, TableFrameDecorator::$ROW_GROUPS)
        ) {
            $start_row = $this->__row;
            foreach ($frame->get_children() as $child) {
                // Ignore all Text frames and :before/:after pseudo-selector elements.
                if (!($child instanceof FrameDecorator\Text) && $child->get_node()->nodeName !== 'dompdf_generated') {
                    $this->add_frame($child);
                }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }

            if ($display === "table-row") {
                $this->add_row();
            }

            $num_rows = $this->__row - $start_row - 1;
            $key = $frame->get_id();

            // Row groups always span across the entire table
            $this->_frames[$key]["columns"] = range(0, max(0, $this->_num_cols - 1));
            $this->_frames[$key]["rows"] = range($start_row, max(0, $this->__row - 1));
            $this->_frames[$key]["frame"] = $frame;

<<<<<<< HEAD
            if ($collapse) {
                $bp = $style->get_border_properties();

                // Resolve vertical borders
=======
            if ($display !== "table-row" && $collapse) {
                $bp = $style->get_border_properties();

                // Resolve the borders
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                for ($i = 0; $i < $num_rows + 1; $i++) {
                    $this->_resolve_border($start_row + $i, 0, "vertical", $bp["left"]);
                    $this->_resolve_border($start_row + $i, $this->_num_cols, "vertical", $bp["right"]);
                }

<<<<<<< HEAD
                // Resolve horizontal borders
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                for ($j = 0; $j < $this->_num_cols; $j++) {
                    $this->_resolve_border($start_row, $j, "horizontal", $bp["top"]);
                    $this->_resolve_border($this->__row, $j, "horizontal", $bp["bottom"]);
                }
<<<<<<< HEAD

                if ($frame === $this->_table) {
                    // Clear borders because the cells are now using them. The
                    // border width still needs to be set to half the resolved
                    // width so that the table is positioned properly
                    [$top, $right, $bottom, $left] = $this->get_resolved_border($frame);

                    $style->set_used("border_top_width", $top["width"] / 2);
                    $style->set_used("border_right_width", $right["width"] / 2);
                    $style->set_used("border_bottom_width", $bottom["width"] / 2);
                    $style->set_used("border_left_width", $left["width"] / 2);
                    $style->set_used("border_style", "none");
                } else {
                    // Clear borders for rows and row groups
                    $style->set_used("border_width", 0);
                    $style->set_used("border_style", "none");
                }
            }

            if ($frame === $this->_table) {
                // Apply resolved borders to table cells and calculate column
                // widths after all frames have been added
                $this->calculate_column_widths();
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }
            return;
        }

<<<<<<< HEAD
        // Add the frame to the cellmap
        $key = $frame->get_id();
        $node = $frame->get_node();
        $bp = $style->get_border_properties();

        // Determine where this cell is going
        $colspan = max((int) $node->getAttribute("colspan"), 1);
        $rowspan = max((int) $node->getAttribute("rowspan"), 1);
=======
        $node = $frame->get_node();

        // Determine where this cell is going
        $colspan = $node->getAttribute("colspan");
        $rowspan = $node->getAttribute("rowspan");

        if (!$colspan) {
            $colspan = 1;
            $node->setAttribute("colspan", 1);
        }

        if (!$rowspan) {
            $rowspan = 1;
            $node->setAttribute("rowspan", 1);
        }
        $key = $frame->get_id();

        $bp = $style->get_border_properties();


        // Add the frame to the cellmap
        $max_left = $max_right = 0;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        // Find the next available column (fix by Ciro Mondueri)
        $ac = $this->__col;
        while (isset($this->_cells[$this->__row][$ac])) {
            $ac++;
        }

        $this->__col = $ac;

        // Rows:
        for ($i = 0; $i < $rowspan; $i++) {
            $row = $this->__row + $i;

            $this->_frames[$key]["rows"][] = $row;

            for ($j = 0; $j < $colspan; $j++) {
                $this->_cells[$row][$this->__col + $j] = $frame;
            }

            if ($collapse) {
                // Resolve vertical borders
<<<<<<< HEAD
                $this->_resolve_border($row, $this->__col, "vertical", $bp["left"]);
                $this->_resolve_border($row, $this->__col + $colspan, "vertical", $bp["right"]);
            }
        }

=======
                $max_left = max($max_left, $this->_resolve_border($row, $this->__col, "vertical", $bp["left"]));
                $max_right = max($max_right, $this->_resolve_border($row, $this->__col + $colspan, "vertical", $bp["right"]));
            }
        }

        $max_top = $max_bottom = 0;

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        // Columns:
        for ($j = 0; $j < $colspan; $j++) {
            $col = $this->__col + $j;
            $this->_frames[$key]["columns"][] = $col;

            if ($collapse) {
                // Resolve horizontal borders
<<<<<<< HEAD
                $this->_resolve_border($this->__row, $col, "horizontal", $bp["top"]);
                $this->_resolve_border($this->__row + $rowspan, $col, "horizontal", $bp["bottom"]);
=======
                $max_top = max($max_top, $this->_resolve_border($this->__row, $col, "horizontal", $bp["top"]));
                $max_bottom = max($max_bottom, $this->_resolve_border($this->__row + $rowspan, $col, "horizontal", $bp["bottom"]));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }
        }

        $this->_frames[$key]["frame"] = $frame;

<<<<<<< HEAD
        $this->__col += $colspan;
        if ($this->__col > $this->_num_cols) {
            $this->_num_cols = $this->__col;
        }
    }

    /**
     * Apply resolved borders to table cells and calculate column widths.
     */
    protected function calculate_column_widths(): void
    {
        $table = $this->_table;
        $table_style = $table->get_style();
        $collapse = $table_style->border_collapse === "collapse";

        if ($collapse) {
            $v_spacing = 0;
            $h_spacing = 0;
        } else {
            // The additional 1/2 width gets added to the table proper
            [$h, $v] = $table_style->border_spacing;

            $v = $table_style->length_in_pt($v);
            $h = $table_style->length_in_pt($h);
            $v_spacing = is_numeric($v) ? $v / 2 : $v;
            $h_spacing = is_numeric($v) ? $h / 2 : $h;
        }

        foreach ($this->_frames as $frame_info) {
            /** @var TableCellFrameDecorator */
            $frame = $frame_info["frame"];
            $style = $frame->get_style();
            $display = $style->display;

            if ($display !== "table-cell") {
                continue;
            }

            if ($collapse) {
                // Set the resolved border at half width
                [$top, $right, $bottom, $left] = $this->get_resolved_border($frame);

                $style->set_used("border_top_width", $top["width"] / 2);
                $style->set_used("border_top_style", $top["style"]);
                $style->set_used("border_top_color", $top["color"]);
                $style->set_used("border_right_width", $right["width"] / 2);
                $style->set_used("border_right_style", $right["style"]);
                $style->set_used("border_right_color", $right["color"]);
                $style->set_used("border_bottom_width", $bottom["width"] / 2);
                $style->set_used("border_bottom_style", $bottom["style"]);
                $style->set_used("border_bottom_color", $bottom["color"]);
                $style->set_used("border_left_width", $left["width"] / 2);
                $style->set_used("border_left_style", $left["style"]);
                $style->set_used("border_left_color", $left["color"]);
                $style->set_used("margin", 0);
            } else {
                // Border spacing is effectively a margin between cells
                $style->set_used("margin_top", $v_spacing);
                $style->set_used("margin_bottom", $v_spacing);
                $style->set_used("margin_left", $h_spacing);
                $style->set_used("margin_right", $h_spacing);
            }

            if ($this->_columns_locked) {
                continue;
            }

            $node = $frame->get_node();
            $colspan = max((int) $node->getAttribute("colspan"), 1);
            $first_col = $frame_info["columns"][0];

=======
        // Handle seperated border model
        if (!$collapse) {
            list($h, $v) = $this->_table->get_style()->border_spacing;

            // Border spacing is effectively a margin between cells
            $v = $style->length_in_pt($v);
            if (is_numeric($v)) {
                $v = $v / 2;
            }
            $h = $style->length_in_pt($h);
            if (is_numeric($h)) {
                $h = $h / 2;
            }
            $style->margin = "$v $h";

            // The additional 1/2 width gets added to the table proper
        } else {
            // Drop the frame's actual border
            $style->border_left_width = $max_left / 2;
            $style->border_right_width = $max_right / 2;
            $style->border_top_width = $max_top / 2;
            $style->border_bottom_width = $max_bottom / 2;
            $style->margin = "none";
        }

        if (!$this->_columns_locked) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            // Resolve the frame's width
            if ($this->_fixed_layout) {
                list($frame_min, $frame_max) = [0, 10e-10];
            } else {
                list($frame_min, $frame_max) = $frame->get_min_max_width();
            }

            $width = $style->width;

            $val = null;
            if (Helpers::is_percent($width) && $colspan === 1) {
                $var = "percent";
<<<<<<< HEAD
                $val = (float)rtrim($width, "% ");
            } elseif ($width !== "auto" && $colspan === 1) {
                $var = "absolute";
                $val = $frame_min;
=======
                $val = (float)rtrim($width, "% ") / $colspan;
            } else if ($width !== "auto" && $colspan === 1) {
                $var = "absolute";
                $val = $style->length_in_pt($frame_min);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }

            $min = 0;
            $max = 0;
            for ($cs = 0; $cs < $colspan; $cs++) {

                // Resolve the frame's width(s) with other cells
<<<<<<< HEAD
                $col =& $this->get_column($first_col + $cs);
=======
                $col =& $this->get_column($this->__col + $cs);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

                // Note: $var is either 'percent' or 'absolute'.  We compare the
                // requested percentage or absolute values with the existing widths
                // and adjust accordingly.
                if (isset($var) && $val > $col[$var]) {
                    $col[$var] = $val;
                    $col["auto"] = false;
                }

                $min += $col["min-width"];
                $max += $col["max-width"];
            }

            if ($frame_min > $min && $colspan === 1) {
                // The frame needs more space.  Expand each sub-column
                // FIXME try to avoid putting this dummy value when table-layout:fixed
                $inc = ($this->is_layout_fixed() ? 10e-10 : ($frame_min - $min));
                for ($c = 0; $c < $colspan; $c++) {
<<<<<<< HEAD
                    $col =& $this->get_column($first_col + $c);
=======
                    $col =& $this->get_column($this->__col + $c);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $col["min-width"] += $inc;
                }
            }

            if ($frame_max > $max) {
                // FIXME try to avoid putting this dummy value when table-layout:fixed
                $inc = ($this->is_layout_fixed() ? 10e-10 : ($frame_max - $max) / $colspan);
                for ($c = 0; $c < $colspan; $c++) {
<<<<<<< HEAD
                    $col =& $this->get_column($first_col + $c);
=======
                    $col =& $this->get_column($this->__col + $c);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $col["max-width"] += $inc;
                }
            }
        }
<<<<<<< HEAD
=======

        $this->__col += $colspan;
        if ($this->__col > $this->_num_cols) {
            $this->_num_cols = $this->__col;
        }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     *
     */
    public function add_row()
    {
        $this->__row++;
        $this->_num_rows++;

        // Find the next available column
        $i = 0;
        while (isset($this->_cells[$this->__row][$i])) {
            $i++;
        }

        $this->__col = $i;
    }

    /**
     * Remove a row from the cellmap.
     *
     * @param Frame
     */
    public function remove_row(Frame $row)
    {
        $key = $row->get_id();
        if (!isset($this->_frames[$key])) {
<<<<<<< HEAD
            return; // Presumably this row has already been removed
=======
            return; // Presumably this row has alredy been removed
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        $this->__row = $this->_num_rows--;

        $rows = $this->_frames[$key]["rows"];
        $columns = $this->_frames[$key]["columns"];

        // Remove all frames from this row
        foreach ($rows as $r) {
            foreach ($columns as $c) {
                if (isset($this->_cells[$r][$c])) {
                    $id = $this->_cells[$r][$c]->get_id();

                    $this->_cells[$r][$c] = null;
                    unset($this->_cells[$r][$c]);

                    // has multiple rows?
                    if (isset($this->_frames[$id]) && count($this->_frames[$id]["rows"]) > 1) {
                        // remove just the desired row, but leave the frame
                        if (($row_key = array_search($r, $this->_frames[$id]["rows"])) !== false) {
                            unset($this->_frames[$id]["rows"][$row_key]);
                        }
                        continue;
                    }

                    $this->_frames[$id] = null;
                    unset($this->_frames[$id]);
                }
            }

            $this->_rows[$r] = null;
            unset($this->_rows[$r]);
        }

        $this->_frames[$key] = null;
        unset($this->_frames[$key]);
    }

    /**
     * Remove a row group from the cellmap.
     *
     * @param Frame $group The group to remove
     */
    public function remove_row_group(Frame $group)
    {
        $key = $group->get_id();
        if (!isset($this->_frames[$key])) {
<<<<<<< HEAD
            return; // Presumably this row has already been removed
=======
            return; // Presumably this row has alredy been removed
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        $iter = $group->get_first_child();
        while ($iter) {
            $this->remove_row($iter);
            $iter = $iter->get_next_sibling();
        }

        $this->_frames[$key] = null;
        unset($this->_frames[$key]);
    }

    /**
     * Update a row group after rows have been removed
     *
     * @param Frame $group    The group to update
     * @param Frame $last_row The last row in the row group
     */
    public function update_row_group(Frame $group, Frame $last_row)
    {
        $g_key = $group->get_id();
<<<<<<< HEAD

        $first_index = $this->_frames[$g_key]["rows"][0];
        $last_index = $first_index;
        $row = $last_row;
        while ($row = $row->get_prev_sibling()) {
            $last_index++;
        }

        $this->_frames[$g_key]["rows"] = range($first_index, $last_index);
=======
        $r_key = $last_row->get_id();

        $r_rows = $this->_frames[$g_key]["rows"];
        $this->_frames[$g_key]["rows"] = range($this->_frames[$g_key]["rows"][0], end($r_rows));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     *
     */
    public function assign_x_positions()
    {
        // Pre-condition: widths must be resolved and assigned to columns and
        // column[0]["x"] must be set.

        if ($this->_columns_locked) {
            return;
        }

        $x = $this->_columns[0]["x"];
        foreach (array_keys($this->_columns) as $j) {
            $this->_columns[$j]["x"] = $x;
            $x += $this->_columns[$j]["used-width"];
        }
    }

    /**
     *
     */
    public function assign_frame_heights()
    {
        // Pre-condition: widths and heights of each column & row must be
        // calcluated
        foreach ($this->_frames as $arr) {
            $frame = $arr["frame"];

            $h = 0;
            foreach ($arr["rows"] as $row) {
                if (!isset($this->_rows[$row])) {
                    // The row has been removed because of a page split, so skip it.
                    continue;
                }

                $h += $this->_rows[$row]["height"];
            }

            if ($frame instanceof TableCellFrameDecorator) {
                $frame->set_cell_height($h);
            } else {
                $frame->get_style()->height = $h;
            }
        }
    }

    /**
     * Re-adjust frame height if the table height is larger than its content
     */
    public function set_frame_heights($table_height, $content_height)
    {
        // Distribute the increased height proportionally amongst each row
        foreach ($this->_frames as $arr) {
            $frame = $arr["frame"];

            $h = 0;
            foreach ($arr["rows"] as $row) {
                if (!isset($this->_rows[$row])) {
                    continue;
                }

                $h += $this->_rows[$row]["height"];
            }

            if ($content_height > 0) {
                $new_height = ($h / $content_height) * $table_height;
            } else {
                $new_height = 0;
            }

            if ($frame instanceof TableCellFrameDecorator) {
                $frame->set_cell_height($new_height);
            } else {
                $frame->get_style()->height = $new_height;
            }
        }
    }

    /**
     * Used for debugging:
     *
     * @return string
     */
    public function __toString()
    {
        $str = "";
        $str .= "Columns:<br/>";
        $str .= Helpers::pre_r($this->_columns, true);
        $str .= "Rows:<br/>";
        $str .= Helpers::pre_r($this->_rows, true);

        $str .= "Frames:<br/>";
        $arr = [];
        foreach ($this->_frames as $key => $val) {
            $arr[$key] = ["columns" => $val["columns"], "rows" => $val["rows"]];
        }

        $str .= Helpers::pre_r($arr, true);

        if (php_sapi_name() == "cli") {
            $str = strip_tags(str_replace(["<br/>", "<b>", "</b>"],
                ["\n", chr(27) . "[01;33m", chr(27) . "[0m"],
                $str));
        }

        return $str;
    }
}
