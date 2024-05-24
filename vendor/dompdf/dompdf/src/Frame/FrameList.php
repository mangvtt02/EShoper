<?php
namespace Dompdf\Frame;

use Dompdf\Frame;
use IteratorAggregate;

/**
 * Linked-list IteratorAggregate
 *
 * @access private
 * @package dompdf
 */
class FrameList implements IteratorAggregate
{
    /**
     * @var Frame
     */
    protected $_frame;

    /**
     * @param Frame $frame
     */
    function __construct($frame)
    {
        $this->_frame = $frame;
    }

    /**
     * @return FrameListIterator
     */
<<<<<<< HEAD
    function getIterator(): FrameListIterator
=======
    function getIterator()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return new FrameListIterator($this->_frame);
    }
}
