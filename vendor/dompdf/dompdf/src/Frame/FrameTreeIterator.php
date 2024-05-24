<?php
namespace Dompdf\Frame;

use Iterator;
use Dompdf\Frame;

/**
 * Pre-order Iterator
 *
 * Returns frames in preorder traversal order (parent then children)
 *
 * @access private
 * @package dompdf
 */
class FrameTreeIterator implements Iterator
{
    /**
     * @var Frame
     */
    protected $_root;

    /**
<<<<<<< HEAD
     * @var Frame[]
=======
     * @var array
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected $_stack = [];

    /**
     * @var int
     */
    protected $_num;

    /**
     * @param Frame $root
     */
    public function __construct(Frame $root)
    {
        $this->_stack[] = $this->_root = $root;
        $this->_num = 0;
    }

<<<<<<< HEAD
    public function rewind(): void
=======
    /**
     *
     */
    public function rewind()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->_stack = [$this->_root];
        $this->_num = 0;
    }

    /**
     * @return bool
     */
<<<<<<< HEAD
    public function valid(): bool
=======
    public function valid()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return count($this->_stack) > 0;
    }

    /**
     * @return int
     */
<<<<<<< HEAD
    public function key(): int
=======
    public function key()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->_num;
    }

    /**
     * @return Frame
     */
<<<<<<< HEAD
    public function current(): Frame
=======
    public function current()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return end($this->_stack);
    }

<<<<<<< HEAD
    public function next(): void
=======
    /**
     * @return Frame
     */
    public function next()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $b = end($this->_stack);

        // Pop last element
        unset($this->_stack[key($this->_stack)]);
        $this->_num++;

        // Push all children onto the stack in reverse order
        if ($c = $b->get_last_child()) {
            $this->_stack[] = $c;
            while ($c = $c->get_prev_sibling()) {
                $this->_stack[] = $c;
            }
        }
<<<<<<< HEAD
    }
}
=======

        return $b;
    }
}

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
