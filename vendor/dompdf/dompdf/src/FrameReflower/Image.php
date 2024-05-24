<?php
/**
 * @package dompdf
 * @link    http://dompdf.github.com/
 * @author  Benj Carson <benjcarson@digitaljunkies.ca>
 * @author  Fabien Ménager <fabien.menager@gmail.com>
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */
namespace Dompdf\FrameReflower;

<<<<<<< HEAD
=======
use Dompdf\Frame;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Dompdf\Helpers;
use Dompdf\FrameDecorator\Block as BlockFrameDecorator;
use Dompdf\FrameDecorator\Image as ImageFrameDecorator;

/**
 * Image reflower class
 *
 * @package dompdf
 */
class Image extends AbstractFrameReflower
{

    /**
     * Image constructor.
     * @param ImageFrameDecorator $frame
     */
    function __construct(ImageFrameDecorator $frame)
    {
        parent::__construct($frame);
    }

    /**
     * @param BlockFrameDecorator|null $block
     */
    function reflow(BlockFrameDecorator $block = null)
    {
<<<<<<< HEAD
        $this->determine_absolute_containing_block();

        // Counters and generated content
        $this->_set_content();
=======
        $this->_frame->position();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        //FLOAT
        //$frame = $this->_frame;
        //$page = $frame->get_root();

        //if ($frame->get_style()->float !== "none" ) {
        //  $page->add_floating_frame($this);
        //}

<<<<<<< HEAD
        $this->resolve_dimensions();
        $this->resolve_margins();

        $frame = $this->_frame;
        $frame->position();

        if ($block && $frame->is_in_flow()) {
            $block->add_frame_to_line($frame);
        }
    }

    public function get_min_max_content_width(): array
    {
        // TODO: While the containing block is not set yet on the frame, it can
        // already be determined in some cases due to fixed dimensions on the
        // ancestor forming the containing block. In such cases, percentage
        // values could be resolved here
        $style = $this->_frame->get_style();

        [$width] = $this->calculate_size(null, null);
        $min_width = $this->resolve_min_width(null);
        $percent_width = Helpers::is_percent($style->width)
            || Helpers::is_percent($style->max_width)
            || ($style->width === "auto"
                && (Helpers::is_percent($style->height) || Helpers::is_percent($style->max_height)));

        // Use the specified min width as minimum when width or max width depend
        // on the containing block and cannot be resolved yet. This mimics
        // browser behavior
        $min = $percent_width ? $min_width : $width;
        $max = $width;

        return [$min, $max];
    }

    /**
     * Calculate width and height, accounting for min/max constraints.
     *
     * * https://www.w3.org/TR/CSS21/visudet.html#inline-replaced-width
     * * https://www.w3.org/TR/CSS21/visudet.html#inline-replaced-height
     * * https://www.w3.org/TR/CSS21/visudet.html#min-max-widths
     * * https://www.w3.org/TR/CSS21/visudet.html#min-max-heights
     *
     * @param float|null $cbw Width of the containing block.
     * @param float|null $cbh Height of the containing block.
     *
     * @return float[]
     */
    protected function calculate_size(?float $cbw, ?float $cbh): array
    {
        /** @var ImageFrameDecorator */
        $frame = $this->_frame;
        $style = $frame->get_style();

        $computed_width = $style->width;
        $computed_height = $style->height;

        $width = $cbw === null && Helpers::is_percent($computed_width)
            ? "auto"
            : $style->length_in_pt($computed_width, $cbw ?? 0);
        $height = $cbh === null && Helpers::is_percent($computed_height)
            ? "auto"
            : $style->length_in_pt($computed_height, $cbh ?? 0);
        $min_width = $this->resolve_min_width($cbw);
        $max_width = $this->resolve_max_width($cbw);
        $min_height = $this->resolve_min_height($cbh);
        $max_height = $this->resolve_max_height($cbh);

        if ($width === "auto" && $height === "auto") {
            // Use intrinsic dimensions, resampled to pt
            [$img_width, $img_height] = $frame->get_intrinsic_dimensions();
            $w = $frame->resample($img_width);
            $h = $frame->resample($img_height);

            // Resolve min/max constraints according to the constraint-violation
            // table in https://www.w3.org/TR/CSS21/visudet.html#min-max-widths
            $max_width = max($min_width, $max_width);
            $max_height = max($min_height, $max_height);

            if (($w > $max_width && $h <= $max_height)
                || ($w > $max_width && $h > $max_height && $max_width / $w <= $max_height / $h)
                || ($w < $min_width && $h > $min_height)
                || ($w < $min_width && $h < $min_height && $min_width / $w > $min_height / $h)
            ) {
                $width = Helpers::clamp($w, $min_width, $max_width);
                $height = $width * ($img_height / $img_width);
                $height = Helpers::clamp($height, $min_height, $max_height);
            } else {
                $height = Helpers::clamp($h, $min_height, $max_height);
                $width = $height * ($img_width / $img_height);
                $width = Helpers::clamp($width, $min_width, $max_width);
            }
        } elseif ($height === "auto") {
            // Width is fixed, scale height according to aspect ratio
            [$img_width, $img_height] = $frame->get_intrinsic_dimensions();
            $width = Helpers::clamp((float) $width, $min_width, $max_width);
            $height = $width * ($img_height / $img_width);
            $height = Helpers::clamp($height, $min_height, $max_height);
        } elseif ($width === "auto") {
            // Height is fixed, scale width according to aspect ratio
            [$img_width, $img_height] = $frame->get_intrinsic_dimensions();
            $height = Helpers::clamp((float) $height, $min_height, $max_height);
            $width = $height * ($img_width / $img_height);
            $width = Helpers::clamp($width, $min_width, $max_width);
        } else {
            // Width and height are fixed
            $width = Helpers::clamp((float) $width, $min_width, $max_width);
            $height = Helpers::clamp((float) $height, $min_height, $max_height);
        }

        return [$width, $height];
    }

    protected function resolve_dimensions(): void
    {
        /** @var ImageFrameDecorator */
        $frame = $this->_frame;
        $style = $frame->get_style();

        $debug_png = $this->get_dompdf()->getOptions()->getDebugPng();

        if ($debug_png) {
            [$img_width, $img_height] = $frame->get_intrinsic_dimensions();
            print "resolve_dimensions() " .
                $frame->get_style()->width . " " .
                $frame->get_style()->height . ";" .
                $frame->get_parent()->get_style()->width . " " .
                $frame->get_parent()->get_style()->height . ";" .
                $frame->get_parent()->get_parent()->get_style()->width . " " .
                $frame->get_parent()->get_parent()->get_style()->height . ";" .
                $img_width . " " .
                $img_height . "|";
        }

        [, , $cbw, $cbh] = $frame->get_containing_block();
        [$width, $height] = $this->calculate_size($cbw, $cbh);

        if ($debug_png) {
            print $width . " " . $height . ";";
        }

        $style->width = $width;
        $style->height = $height;
    }

    protected function resolve_margins(): void
    {
        // Only handle the inline case for now
        // https://www.w3.org/TR/CSS21/visudet.html#inline-replaced-width
        // https://www.w3.org/TR/CSS21/visudet.html#inline-replaced-height
        $style = $this->_frame->get_style();

        if ($style->margin_left === "auto") {
            $style->margin_left = 0;
        }
        if ($style->margin_right === "auto") {
            $style->margin_right = 0;
        }
        if ($style->margin_top === "auto") {
            $style->margin_top = 0;
        }
        if ($style->margin_bottom === "auto") {
            $style->margin_bottom = 0;
        }
=======
        // Set the frame's width
        $this->get_min_max_width();

        if ($block) {
            $block->add_frame_to_line($this->_frame);
        }
    }

    /**
     * @return array
     */
    function get_min_max_width()
    {
        $frame = $this->_frame;

        if ($this->get_dompdf()->getOptions()->getDebugPng()) {
            // Determine the image's size. Time consuming. Only when really needed?
            list($img_width, $img_height) = Helpers::dompdf_getimagesize($frame->get_image_url(), $this->get_dompdf()->getHttpContext());
            print "get_min_max_width() " .
                $frame->get_style()->width . ' ' .
                $frame->get_style()->height . ';' .
                $frame->get_parent()->get_style()->width . " " .
                $frame->get_parent()->get_style()->height . ";" .
                $frame->get_parent()->get_parent()->get_style()->width . ' ' .
                $frame->get_parent()->get_parent()->get_style()->height . ';' .
                $img_width . ' ' .
                $img_height . '|';
        }

        $style = $frame->get_style();

        $width_forced = true;
        $height_forced = true;

        //own style auto or invalid value: use natural size in px
        //own style value: ignore suffix text including unit, use given number as px
        //own style %: walk up parent chain until found available space in pt; fill available space
        //
        //special ignored unit: e.g. 10ex: e treated as exponent; x ignored; 10e completely invalid ->like auto

        $width = $this->get_size($frame, 'width');
        $height = $this->get_size($frame, 'height');

        if ($width === 'auto' || $height === 'auto') {
            // Determine the image's size. Time consuming. Only when really needed!
            list($img_width, $img_height) = Helpers::dompdf_getimagesize($frame->get_image_url(), $this->get_dompdf()->getHttpContext());

            // don't treat 0 as error. Can be downscaled or can be catched elsewhere if image not readable.
            // Resample according to px per inch
            // See also ListBulletImage::__construct
            if ($width === 'auto' && $height === 'auto') {
                $dpi = $frame->get_dompdf()->getOptions()->getDpi();
                $width = (float)($img_width * 72) / $dpi;
                $height = (float)($img_height * 72) / $dpi;
                $width_forced = false;
                $height_forced = false;
            } elseif ($height === 'auto') {
                $height_forced = false;
                $height = ($width / $img_width) * $img_height; //keep aspect ratio
            } else {
                $width_forced = false;
                $width = ($height / $img_height) * $img_width; //keep aspect ratio
            }
        }

        // Handle min/max width/height
        if ($style->min_width !== "none" ||
            $style->max_width !== "none" ||
            $style->min_height !== "none" ||
            $style->max_height !== "none"
        ) {

            list( /*$x*/, /*$y*/, $w, $h) = $frame->get_containing_block();

            $min_width = $style->length_in_pt($style->min_width, $w);
            $max_width = $style->length_in_pt($style->max_width, $w);
            $min_height = $style->length_in_pt($style->min_height, $h);
            $max_height = $style->length_in_pt($style->max_height, $h);

            if ($max_width !== "none" && $max_width !== "auto" && $width > (float)$max_width) {
                if (!$height_forced) {
                    $height *= (float)$max_width / $width;
                }

                $width = (float)$max_width;
            }

            if ($min_width !== "none" && $min_width !== "auto" && $width < (float)$min_width) {
                if (!$height_forced) {
                    $height *= (float)$min_width / $width;
                }

                $width = (float)$min_width;
            }

            if ($max_height !== "none" && $max_height !== "auto" && $height > (float)$max_height) {
                if (!$width_forced) {
                    $width *= (float)$max_height / $height;
                }

                $height = (float)$max_height;
            }

            if ($min_height !== "none" && $min_height !== "auto" && $height < (float)$min_height) {
                if (!$width_forced) {
                    $width *= (float)$min_height / $height;
                }

                $height = (float)$min_height;
            }
        }

        if ($this->get_dompdf()->getOptions()->getDebugPng()) {
            print $width . ' ' . $height . ';';
        }

        $style->width = $width . "pt";
        $style->height = $height . "pt";

        $style->min_width = "none";
        $style->max_width = "none";
        $style->min_height = "none";
        $style->max_height = "none";

        return [$width, $width, "min" => $width, "max" => $width];
    }

    private function get_size(Frame $f, string $type)
    {
        $ref_stack = [];
        $result_size = 0.0;
        do {
            $f_style = $f->get_style();
            $current_size = $f_style->$type;
            if (Helpers::is_percent($current_size)) {
                $ref_stack[] = str_replace('%px', '%', $current_size);
            } else {
                // auto is a valid first result. In case of previous percentage values we need a real size
                if ($current_size !== 'auto' || count($ref_stack) === 0) {
                    $result_size = $f_style->length_in_pt($current_size);
                    break;
                }
            }
        } while (($f = $f->get_parent()));

        // if we built a percentage stack walk up to find the real size
        if (count($ref_stack) > 0) {
            while (($ref = array_pop($ref_stack))) {
                $result_size = $f_style->length_in_pt($ref, $result_size);
            }
        }

        return $result_size;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
