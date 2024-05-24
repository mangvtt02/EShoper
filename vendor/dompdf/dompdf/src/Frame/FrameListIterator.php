<?php
namespace Dompdf\Frame;

use Iterator;
use Dompdf\Frame;

/**
 * Linked-list Iterator
 *
<<<<<<< HEAD
 * Returns children in order and allows for the list to change during iteration,
 * provided the changes occur to or after the current element.
=======
 * Returns children in order and allows for list to change during iteration,
 * provided the changes occur to or after the current element
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 *
 * @access private
 * @package dompdf
 */
class FrameListIterator implements Iterator
{
<<<<<<< HEAD
    /**
     * @var Frame
     */
    protected $parent;

    /**
     * @var Frame|null
     */
    protected $cur;

    /**
     * @var Frame|null
     */
    protected $prev;
=======

    /**
     * @var Frame
     */
    protected $_parent;

    /**
     * @var Frame
     */
    protected $_cur;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * @var int
     */
<<<<<<< HEAD
    protected $num;
=======
    protected $_num;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * @param Frame $frame
     */
    public function __construct(Frame $frame)
    {
<<<<<<< HEAD
        $this->parent = $frame;
        $this->rewind();
    }

    public function rewind(): void
    {
        $this->cur = $this->parent->get_first_child();
        $this->prev = null;
        $this->num = 0;
=======
        $this->_parent = $frame;
        $this->_cur = $frame->get_first_child();
        $this->_num = 0;
    }

    /**
     *
     */
    public function rewind()
    {
        $this->_cur = $this->_parent->get_first_child();
        $this->_num = 0;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * @return bool
     */
<<<<<<< HEAD
    public function valid(): bool
    {
        return $this->cur !== null;
=======
    public function valid()
    {
        return isset($this->_cur); // && ($this->_cur->get_prev_sibling() === $this->_prev);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * @return int
     */
<<<<<<< HEAD
    public function key(): int
    {
        return $this->num;
    }

    /**
     * @return Frame|null
     */
    public function current(): ?Frame
    {
        return $this->cur;
    }

    public function next(): void
    {
        if ($this->cur === null) {
            return;
        }

        if ($this->cur->get_parent() === $this->parent) {
            $this->prev = $this->cur;
            $this->cur = $this->cur->get_next_sibling();
            $this->num++;
        } else {
            // Continue from the previous child if the current frame has been
            // moved to another parent
            $this->cur = $this->prev !== null
                ? $this->prev->get_next_sibling()
                : $this->parent->get_first_child();
        }
    }
}
=======
    public function key()
    {
        return $this->_num;
    }

    /**
     * @return Frame
     */
    public function current()
    {
        return $this->_cur;
    }

    /**
     * @return Frame
     */
    public function next()
    {
        $ret = $this->_cur;
        if (!$ret) {
            return null;
        }

        $this->_cur = $this->_cur->get_next_sibling();
        $this->_num++;
        return $ret;
    }
}
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
