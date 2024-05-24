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
use Dompdf\LineBox;

/**
 * Decorates frames for block layout
 *
 * @access  private
 * @package dompdf
 */
class Block extends AbstractFrameDecorator
{
    /**
     * Current line index
     *
     * @var int
     */
    protected $_cl;

    /**
     * The block's line boxes
     *
     * @var LineBox[]
     */
    protected $_line_boxes;

    /**
<<<<<<< HEAD
     * List of markers that have not found their line box to vertically align
     * with yet. Markers are collected by nested block containers until an
     * inline line box is found at the start of the block.
     *
     * @var ListBullet[]
     */
    protected $dangling_markers;

    /**
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * Block constructor.
     * @param Frame $frame
     * @param Dompdf $dompdf
     */
    function __construct(Frame $frame, Dompdf $dompdf)
    {
        parent::__construct($frame, $dompdf);

        $this->_line_boxes = [new LineBox($this)];
        $this->_cl = 0;
<<<<<<< HEAD
        $this->dangling_markers = [];
    }

=======
    }

    /**
     *
     */
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    function reset()
    {
        parent::reset();

        $this->_line_boxes = [new LineBox($this)];
        $this->_cl = 0;
<<<<<<< HEAD
        $this->dangling_markers = [];
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * @return LineBox
     */
    function get_current_line_box()
    {
        return $this->_line_boxes[$this->_cl];
    }

    /**
<<<<<<< HEAD
     * @return int
=======
     * @return integer
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    function get_current_line_number()
    {
        return $this->_cl;
    }

    /**
     * @return LineBox[]
     */
    function get_line_boxes()
    {
        return $this->_line_boxes;
    }

    /**
<<<<<<< HEAD
     * @param int $line_number
     * @return int
=======
     * @param integer $line_number
     * @return integer
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    function set_current_line_number($line_number)
    {
        $line_boxes_count = count($this->_line_boxes);
        $cl = max(min($line_number, $line_boxes_count), 0);
        return ($this->_cl = $cl);
    }

    /**
<<<<<<< HEAD
     * @param int $i
=======
     * @param integer $i
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    function clear_line($i)
    {
        if (isset($this->_line_boxes[$i])) {
            unset($this->_line_boxes[$i]);
        }
    }

    /**
     * @param Frame $frame
<<<<<<< HEAD
     * @return LineBox|null
     */
    public function add_frame_to_line(Frame $frame)
    {
        $current_line = $this->_line_boxes[$this->_cl];
        $frame->set_containing_line($current_line);

        // Inline frames are currently treated as wrappers, and are not actually
        // added to the line
        if ($frame instanceof Inline) {
            return null;
        }

        $current_line->add_frame($frame);

        $this->increase_line_width($frame->get_margin_width());
        $this->maximize_line_height($frame->get_margin_height(), $frame);

        // Add any dangling list markers to the first line box if it is inline
        if ($this->_cl === 0 && $current_line->inline
            && $this->dangling_markers !== []
        ) {
            foreach ($this->dangling_markers as $marker) {
                $current_line->add_list_marker($marker);
                $this->maximize_line_height($marker->get_margin_height(), $marker);
            }

            $this->dangling_markers = [];
        }

        return $current_line;
    }

    /**
     * Remove the given frame and all following frames and lines from the block.
     *
     * @param Frame $frame
     */
    public function remove_frames_from_line(Frame $frame): void
    {
        // Inline frames are not added to line boxes themselves, only their
        // text frame children
        $actualFrame = $frame;
        while ($actualFrame !== null && $actualFrame instanceof Inline) {
            $actualFrame = $actualFrame->get_first_child();
        }

        if ($actualFrame === null) {
            return;
        }

        // Search backwards through the lines for $frame
        $frame = $actualFrame;
        $i = $this->_cl;
        $j = null;

        while ($i > 0) {
            $line = $this->_line_boxes[$i];
            foreach ($line->get_frames() as $index => $f) {
                if ($frame === $f) {
                    $j = $index;
                    break 2;
                }
            }
            $i--;
        }

        if ($j === null) {
            return;
        }

        // Remove all lines that follow
        for ($k = $this->_cl; $k > $i; $k--) {
            unset($this->_line_boxes[$k]);
        }

        // Remove the line, if it is empty
        if ($j > 0) {
            $line->remove_frames($j);
        } else {
            unset($this->_line_boxes[$i]);
        }

        // Reset array indices
        $this->_line_boxes = array_values($this->_line_boxes);
        $this->_cl = count($this->_line_boxes) - 1;
=======
     */
    function add_frame_to_line(Frame $frame)
    {
        if (!$frame->is_in_flow()) {
            return;
        }

        $style = $frame->get_style();

        $frame->set_containing_line($this->_line_boxes[$this->_cl]);

        /*
        // Adds a new line after a block, only if certain conditions are met
        if ((($frame instanceof Inline && $frame->get_node()->nodeName !== "br") ||
              $frame instanceof Text && trim($frame->get_text())) &&
            ($frame->get_prev_sibling() && $frame->get_prev_sibling()->get_style()->display === "block" &&
             $this->_line_boxes[$this->_cl]->w > 0 )) {

               $this->maximize_line_height( $style->length_in_pt($style->line_height), $frame );
               $this->add_line();

               // Add each child of the inline frame to the line individually
               foreach ($frame->get_children() as $child)
                 $this->add_frame_to_line( $child );
        }
        else*/

        // Handle inline frames (which are effectively wrappers)
        if ($frame instanceof Inline) {
            // Handle line breaks
            if ($frame->get_node()->nodeName === "br") {
                $this->maximize_line_height($style->line_height, $frame);
                $this->add_line(true);
            }

            return;
        }

        // Trim leading text if this is an empty line.  Kinda a hack to put it here,
        // but what can you do...
        if ($this->get_current_line_box()->w == 0 &&
            $frame->is_text_node() &&
            !$frame->is_pre()
        ) {
            $frame->set_text(ltrim($frame->get_text()));
            $frame->recalculate_width();
        }

        $w = $frame->get_margin_width();

        // FIXME: Why? Doesn't quite seem to be the correct thing to do,
        // but does appear to be necessary. Hack to handle wrapped white space?
        if ($w == 0 && $frame->get_node()->nodeName !== "hr" && !$frame->is_pre()) {
            return;
        }

        // Debugging code:
        /*
        Helpers::pre_r("\n<h3>Adding frame to line:</h3>");

        //    Helpers::pre_r("Me: " . $this->get_node()->nodeName . " (" . spl_object_hash($this->get_node()) . ")");
        //    Helpers::pre_r("Node: " . $frame->get_node()->nodeName . " (" . spl_object_hash($frame->get_node()) . ")");
        if ( $frame->is_text_node() )
          Helpers::pre_r('"'.$frame->get_node()->nodeValue.'"');

        Helpers::pre_r("Line width: " . $this->_line_boxes[$this->_cl]->w);
        Helpers::pre_r("Frame: " . get_class($frame));
        Helpers::pre_r("Frame width: "  . $w);
        Helpers::pre_r("Frame height: " . $frame->get_margin_height());
        Helpers::pre_r("Containing block width: " . $this->get_containing_block("w"));
        */
        // End debugging

        $line = $this->_line_boxes[$this->_cl];
        if ($line->left + $line->w + $line->right + $w > $this->get_containing_block("w")) {
            $this->add_line();
        }

        $frame->position();

        $current_line = $this->_line_boxes[$this->_cl];
        $current_line->add_frame($frame);

        if ($frame->is_text_node()) {
            // split the text into words (used to determine spacing between words on justified lines)
            // The regex splits on everything that's a separator (^\S double negative), excluding nbsp (\xa0)
            // This currently excludes the "narrow nbsp" character
            $words = preg_split('/[^\S\xA0]+/u', trim($frame->get_text()));
            $current_line->wc += count($words);
        }

        $this->increase_line_width($w);

        $this->maximize_line_height($frame->get_margin_height(), $frame);
    }

    /**
     * @param Frame $frame
     */
    function remove_frames_from_line(Frame $frame)
    {
        // Search backwards through the lines for $frame
        $i = $this->_cl;
        $j = null;

        while ($i >= 0) {
            if (($j = in_array($frame, $this->_line_boxes[$i]->get_frames(), true)) !== false) {
                break;
            }

            $i--;
        }

        if ($j === false) {
            return;
        }

        // Remove $frame and all frames that follow
        while ($j < count($this->_line_boxes[$i]->get_frames())) {
            $frames = $this->_line_boxes[$i]->get_frames();
            $f = $frames[$j];
            $frames[$j] = null;
            unset($frames[$j]);
            $j++;
            $this->_line_boxes[$i]->w -= $f->get_margin_width();
        }

        // Recalculate the height of the line
        $h = 0;
        foreach ($this->_line_boxes[$i]->get_frames() as $f) {
            $h = max($h, $f->get_margin_height());
        }

        $this->_line_boxes[$i]->h = $h;

        // Remove all lines that follow
        while ($this->_cl > $i) {
            $this->_line_boxes[$this->_cl] = null;
            unset($this->_line_boxes[$this->_cl]);
            $this->_cl--;
        }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * @param float $w
     */
    function increase_line_width($w)
    {
        $this->_line_boxes[$this->_cl]->w += $w;
    }

    /**
<<<<<<< HEAD
     * @param float $val
=======
     * @param $val
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @param Frame $frame
     */
    function maximize_line_height($val, Frame $frame)
    {
        if ($val > $this->_line_boxes[$this->_cl]->h) {
            $this->_line_boxes[$this->_cl]->tallest_frame = $frame;
            $this->_line_boxes[$this->_cl]->h = $val;
        }
    }

    /**
     * @param bool $br
     */
<<<<<<< HEAD
    function add_line(bool $br = false)
    {
        $line = $this->_line_boxes[$this->_cl];

        $line->br = $br;
        $y = $line->y + $line->h;
=======
    function add_line($br = false)
    {
        $this->_line_boxes[$this->_cl]->br = $br;
        $y = $this->_line_boxes[$this->_cl]->y + $this->_line_boxes[$this->_cl]->h;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        $new_line = new LineBox($this, $y);

        $this->_line_boxes[++$this->_cl] = $new_line;
    }

<<<<<<< HEAD
    /**
     * @param ListBullet $marker
     */
    public function add_dangling_marker(ListBullet $marker): void
    {
        $this->dangling_markers[] = $marker;
    }

    /**
     * Inherit any dangling markers from the parent block.
     *
     * @param Block $block
     */
    public function inherit_dangling_markers(self $block): void
    {
        if ($block->dangling_markers !== []) {
            $this->dangling_markers = $block->dangling_markers;
            $block->dangling_markers = [];
        }
    }
=======
    //........................................................................
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
