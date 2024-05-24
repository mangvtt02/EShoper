<?php
namespace Dompdf\Frame;

use IteratorAggregate;
use Dompdf\Frame;

/**
 * Pre-order IteratorAggregate
 *
 * @access private
 * @package dompdf
 */
class FrameTreeList implements IteratorAggregate
{
    /**
<<<<<<< HEAD
     * @var Frame
=======
     * @var \Dompdf\Frame
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected $_root;

    /**
<<<<<<< HEAD
     * @param Frame $root
=======
     * @param \Dompdf\Frame $root
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct(Frame $root)
    {
        $this->_root = $root;
    }

    /**
     * @return FrameTreeIterator
     */
<<<<<<< HEAD
    public function getIterator(): FrameTreeIterator
=======
    public function getIterator()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return new FrameTreeIterator($this->_root);
    }
}
