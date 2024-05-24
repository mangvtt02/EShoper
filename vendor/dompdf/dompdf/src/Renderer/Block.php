<?php
/**
 * @package dompdf
 * @link    http://dompdf.github.com/
 * @author  Benj Carson <benjcarson@digitaljunkies.ca>
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */
namespace Dompdf\Renderer;

use Dompdf\Frame;
<<<<<<< HEAD
use Dompdf\FrameDecorator\Block as BlockFrameDecorator;
=======
use Dompdf\FrameDecorator\AbstractFrameDecorator;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Dompdf\Helpers;

/**
 * Renders block frames
 *
 * @package dompdf
 */
class Block extends AbstractRenderer
{

    /**
     * @param Frame $frame
     */
    function render(Frame $frame)
    {
        $style = $frame->get_style();
        $node = $frame->get_node();
        $dompdf = $this->_dompdf;
<<<<<<< HEAD

        $this->_set_opacity($frame->get_opacity($style->opacity));

        [$x, $y, $w, $h] = $frame->get_border_box();

=======
        $options = $dompdf->getOptions();

        list($x, $y, $w, $h) = $frame->get_border_box();

        $this->_set_opacity($frame->get_opacity($style->opacity));

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        if ($node->nodeName === "body") {
            $h = $frame->get_containing_block("h") - (float)$style->length_in_pt([
                        $style->margin_top,
                        $style->border_top_width,
                        $style->border_bottom_width,
                        $style->margin_bottom],
                    (float)$style->length_in_pt($style->width));
        }

<<<<<<< HEAD
        $border_box = [$x, $y, $w, $h];

        // Draw our background, border and content
        $this->_render_background($frame, $border_box);
        $this->_render_border($frame, $border_box);
        $this->_render_outline($frame, $border_box);

        // Handle anchors & links
        if ($node->nodeName === "a" && $href = $node->getAttribute("href")) {
            $href = Helpers::build_url($dompdf->getProtocol(), $dompdf->getBaseHost(), $dompdf->getBasePath(), $href);
            $this->_canvas->add_link($href, $x, $y, $w, $h);
        }

        $id = $frame->get_node()->getAttribute("id");
        if (strlen($id) > 0) {
            $this->_canvas->add_named_dest($id);
        }

        $this->debugBlockLayout($frame, "red", false);
    }

    /**
     * @param Frame $frame
     * @param float[] $border_box
     */
    protected function _render_background(Frame $frame, array $border_box): void
    {
        $style = $frame->get_style();
        [$x, $y, $w, $h] = $border_box;

        if ($style->has_border_radius()) {
            [$tl, $tr, $br, $bl] = $style->resolve_border_radius($border_box);
            $this->_canvas->clipping_roundrectangle($x, $y, $w, $h, $tl, $tr, $br, $bl);
        }

        if (($bg = $style->background_color) !== "transparent") {
            $this->_canvas->filled_rectangle($x, $y, $w, $h, $bg);
=======
        // Handle anchors & links
        if ($node->nodeName === "a" && $href = $node->getAttribute("href")) {
            $href = Helpers::build_url($dompdf->getProtocol(), $dompdf->getBaseHost(), $dompdf->getBasePath(), $href);
            $this->_canvas->add_link($href, $x, $y, (float)$w, (float)$h);
        }

        // Draw our background, border and content
        list($tl, $tr, $br, $bl) = $style->get_computed_border_radius($w, $h);

        if ($tl + $tr + $br + $bl > 0) {
            $this->_canvas->clipping_roundrectangle($x, $y, (float)$w, (float)$h, $tl, $tr, $br, $bl);
        }

        if (($bg = $style->background_color) !== "transparent") {
            $this->_canvas->filled_rectangle($x, $y, (float)$w, (float)$h, $bg);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        if (($url = $style->background_image) && $url !== "none") {
            $this->_background_image($url, $x, $y, $w, $h, $style);
        }

<<<<<<< HEAD
        if ($style->has_border_radius()) {
            $this->_canvas->clipping_end();
        }
    }

    /**
     * @param Frame $frame
     * @param float[] $border_box
     * @param string $corner_style
     */
    protected function _render_border(Frame $frame, array $border_box, string $corner_style = "bevel"): void
    {
        $style = $frame->get_style();
        $bp = $style->get_border_properties();
        [$x, $y, $w, $h] = $border_box;
        [$tl, $tr, $br, $bl] = $style->resolve_border_radius($border_box);
=======
        if ($tl + $tr + $br + $bl > 0) {
            $this->_canvas->clipping_end();
        }

        $border_box = [$x, $y, $w, $h];
        $this->_render_border($frame, $border_box);
        $this->_render_outline($frame, $border_box);

        if ($options->getDebugLayout()) {
            if ($options->getDebugLayoutBlocks()) {
                $debug_border_box = $frame->get_border_box();
                $this->_debug_layout([$debug_border_box['x'], $debug_border_box['y'], (float)$debug_border_box['w'], (float)$debug_border_box['h']], "red");
                if ($options->getDebugLayoutPaddingBox()) {
                    $debug_padding_box = $frame->get_padding_box();
                    $this->_debug_layout([$debug_padding_box['x'], $debug_padding_box['y'], (float)$debug_padding_box['w'], (float)$debug_padding_box['h']], "red", [0.5, 0.5]);
                }
            }

            if ($options->getDebugLayoutLines() && $frame->get_decorator()) {
                foreach ($frame->get_decorator()->get_line_boxes() as $line) {
                    $frame->_debug_layout([$line->x, $line->y, $line->w, $line->h], "orange");
                }
            }
        }

        $id = $frame->get_node()->getAttribute("id");
        if (strlen($id) > 0)  {
            $this->_canvas->add_named_dest($id);
        }
    }

    /**
     * @param AbstractFrameDecorator $frame
     * @param null $border_box
     * @param string $corner_style
     */
    protected function _render_border(AbstractFrameDecorator $frame, $border_box = null, $corner_style = "bevel")
    {
        $style = $frame->get_style();
        $bp = $style->get_border_properties();

        if (empty($border_box)) {
            $border_box = $frame->get_border_box();
        }

        // find the radius
        $radius = $style->get_computed_border_radius($border_box[2], $border_box[3]); // w, h
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        // Short-cut: If all the borders are "solid" with the same color and style, and no radius, we'd better draw a rectangle
        if (
            in_array($bp["top"]["style"], ["solid", "dashed", "dotted"]) &&
            $bp["top"] == $bp["right"] &&
            $bp["right"] == $bp["bottom"] &&
            $bp["bottom"] == $bp["left"] &&
<<<<<<< HEAD
            !$style->has_border_radius()
=======
            array_sum($radius) == 0
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        ) {
            $props = $bp["top"];
            if ($props["color"] === "transparent" || $props["width"] <= 0) {
                return;
            }

<<<<<<< HEAD
            $width = (float)$style->length_in_pt($props["width"]);
            $pattern = $this->_get_dash_pattern($props["style"], $width);
            $this->_canvas->rectangle($x + $width / 2, $y + $width / 2, $w - $width, $h - $width, $props["color"], $width, $pattern);
=======
            list($x, $y, $w, $h) = $border_box;
            $width = (float)$style->length_in_pt($props["width"]);
            $pattern = $this->_get_dash_pattern($props["style"], $width);
            $this->_canvas->rectangle($x + $width / 2, $y + $width / 2, (float)$w - $width, (float)$h - $width, $props["color"], $width, $pattern);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return;
        }

        // Do it the long way
        $widths = [
            (float)$style->length_in_pt($bp["top"]["width"]),
            (float)$style->length_in_pt($bp["right"]["width"]),
            (float)$style->length_in_pt($bp["bottom"]["width"]),
            (float)$style->length_in_pt($bp["left"]["width"])
        ];

        foreach ($bp as $side => $props) {
            list($x, $y, $w, $h) = $border_box;
            $length = 0;
            $r1 = 0;
            $r2 = 0;

            if (!$props["style"] ||
                $props["style"] === "none" ||
                $props["width"] <= 0 ||
                $props["color"] == "transparent"
            ) {
                continue;
            }

            switch ($side) {
                case "top":
<<<<<<< HEAD
                    $length = $w;
                    $r1 = $tl;
                    $r2 = $tr;
                    break;

                case "bottom":
                    $length = $w;
                    $y += $h;
                    $r1 = $bl;
                    $r2 = $br;
                    break;

                case "left":
                    $length = $h;
                    $r1 = $tl;
                    $r2 = $bl;
                    break;

                case "right":
                    $length = $h;
                    $x += $w;
                    $r1 = $tr;
                    $r2 = $br;
=======
                    $length = (float)$w;
                    $r1 = $radius["top-left"];
                    $r2 = $radius["top-right"];
                    break;

                case "bottom":
                    $length = (float)$w;
                    $y += (float)$h;
                    $r1 = $radius["bottom-left"];
                    $r2 = $radius["bottom-right"];
                    break;

                case "left":
                    $length = (float)$h;
                    $r1 = $radius["top-left"];
                    $r2 = $radius["bottom-left"];
                    break;

                case "right":
                    $length = (float)$h;
                    $x += (float)$w;
                    $r1 = $radius["top-right"];
                    $r2 = $radius["bottom-right"];
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    break;
                default:
                    break;
            }
            $method = "_border_" . $props["style"];

            // draw rounded corners
            $this->$method($x, $y, $length, $props["color"], $widths, $side, $corner_style, $r1, $r2);
        }
    }

    /**
<<<<<<< HEAD
     * @param Frame $frame
     * @param float[] $border_box
     * @param string $corner_style
     */
    protected function _render_outline(Frame $frame, array $border_box, string $corner_style = "bevel"): void
    {
        $style = $frame->get_style();

        $width = (float) $style->length_in_pt($style->outline_width);
        $outline_style = $style->outline_style;
        $color = $style->outline_color;

        if (!$outline_style || $outline_style === "none" || $color === "transparent" || $width <= 0) {
            return;
        }

        $offset = (float) $style->length_in_pt($style->outline_offset);

        [$x, $y, $w, $h] = $border_box;
        $d = $width + $offset;
        $outline_box = [$x - $d, $y - $d, $w + $d * 2, $h + $d * 2];
        [$tl, $tr, $br, $bl] = $style->resolve_border_radius($border_box, $outline_box);

        $x -= $offset;
        $y -= $offset;
        $w += $offset * 2;
        $h += $offset * 2;

        // For a simple outline, we can draw a rectangle
        if (in_array($outline_style, ["solid", "dashed", "dotted"], true)
            && !$style->has_border_radius()
        ) {
            $x -= $width / 2;
            $y -= $width / 2;
            $w += $width;
            $h += $width;

            $pattern = $this->_get_dash_pattern($outline_style, $width);
            $this->_canvas->rectangle($x, $y, $w, $h, $color, $width, $pattern);
            return;
        }

        $x -= $width;
        $y -= $width;
        $w += $width * 2;
        $h += $width * 2;

        $method = "_border_" . $outline_style;
        $widths = array_fill(0, 4, $width);
        $sides = ["top", "right", "left", "bottom"];

        foreach ($sides as $side) {
            switch ($side) {
                case "top":
                    $length = $w;
                    $side_x = $x;
                    $side_y = $y;
                    $r1 = $tl;
                    $r2 = $tr;
                    break;

                case "bottom":
                    $length = $w;
                    $side_x = $x;
                    $side_y = $y + $h;
                    $r1 = $bl;
                    $r2 = $br;
                    break;

                case "left":
                    $length = $h;
                    $side_x = $x;
                    $side_y = $y;
                    $r1 = $tl;
                    $r2 = $bl;
                    break;

                case "right":
                    $length = $h;
                    $side_x = $x + $w;
                    $side_y = $y;
                    $r1 = $tr;
                    $r2 = $br;
                    break;

=======
     * @param AbstractFrameDecorator $frame
     * @param null $border_box
     * @param string $corner_style
     */
    protected function _render_outline(AbstractFrameDecorator $frame, $border_box = null, $corner_style = "bevel")
    {
        $style = $frame->get_style();

        $props = [
            "width" => $style->outline_width,
            "style" => $style->outline_style,
            "color" => $style->outline_color,
        ];

        if (!$props["style"] || $props["style"] === "none" || $props["width"] <= 0) {
            return;
        }

        if (empty($border_box)) {
            $border_box = $frame->get_border_box();
        }

        $offset = (float)$style->length_in_pt($props["width"]);
        $pattern = $this->_get_dash_pattern($props["style"], $offset);

        // If the outline style is "solid" we'd better draw a rectangle
        if (in_array($props["style"], ["solid", "dashed", "dotted"])) {
            $border_box[0] -= $offset / 2;
            $border_box[1] -= $offset / 2;
            $border_box[2] += $offset;
            $border_box[3] += $offset;

            list($x, $y, $w, $h) = $border_box;
            $this->_canvas->rectangle($x, $y, (float)$w, (float)$h, $props["color"], $offset, $pattern);
            return;
        }

        $border_box[0] -= $offset;
        $border_box[1] -= $offset;
        $border_box[2] += $offset * 2;
        $border_box[3] += $offset * 2;

        $method = "_border_" . $props["style"];
        $widths = array_fill(0, 4, (float)$style->length_in_pt($props["width"]));
        $sides = ["top", "right", "left", "bottom"];
        $length = 0;

        foreach ($sides as $side) {
            list($x, $y, $w, $h) = $border_box;

            switch ($side) {
                case "top":
                    $length = (float)$w;
                    break;

                case "bottom":
                    $length = (float)$w;
                    $y += (float)$h;
                    break;

                case "left":
                    $length = (float)$h;
                    break;

                case "right":
                    $length = (float)$h;
                    $x += (float)$w;
                    break;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                default:
                    break;
            }

<<<<<<< HEAD
            $this->$method($side_x, $side_y, $length, $color, $widths, $side, $corner_style, $r1, $r2);
        }
    }

    protected function debugBlockLayout(Frame $frame, ?string $color, bool $lines = false): void
    {
        $options = $this->_dompdf->getOptions();
        $debugLayout = $options->getDebugLayout();

        if (!$debugLayout) {
            return;
        }

        if ($color && $options->getDebugLayoutBlocks()) {
            $this->_debug_layout($frame->get_border_box(), $color);

            if ($options->getDebugLayoutPaddingBox()) {
                $this->_debug_layout($frame->get_padding_box(), $color, [0.5, 0.5]);
            }
        }

        if ($lines && $options->getDebugLayoutLines() && $frame instanceof BlockFrameDecorator) {
            [$cx, , $cw] = $frame->get_content_box();

            foreach ($frame->get_line_boxes() as $line) {
                $lw = $cw - $line->left - $line->right;
                $this->_debug_layout([$cx + $line->left, $line->y, $lw, $line->h], "orange");
            }
=======
            $this->$method($x, $y, $length, $props["color"], $widths, $side, $corner_style);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }
    }
}
