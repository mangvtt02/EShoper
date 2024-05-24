<?php

namespace Yajra\DataTables\Processors;

use Illuminate\Support\Arr;
use Yajra\DataTables\Utilities\Helper;

class RowProcessor
{
    /**
     * @var mixed
     */
    private $data;

    /**
     * @var mixed
     */
    private $row;

    /**
<<<<<<< HEAD
     * @param  mixed  $data
     * @param  mixed  $row
=======
     * @param mixed $data
     * @param mixed $row
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct($data, $row)
    {
        $this->data = $data;
        $this->row  = $row;
    }

    /**
     * Process DT RowId and Class value.
     *
<<<<<<< HEAD
     * @param  string  $attribute
     * @param  string|callable  $template
=======
     * @param string          $attribute
     * @param string|callable $template
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return $this
     */
    public function rowValue($attribute, $template)
    {
        if (! empty($template)) {
            if (! is_callable($template) && Arr::get($this->data, $template)) {
                $this->data[$attribute] = Arr::get($this->data, $template);
            } else {
                $this->data[$attribute] = Helper::compileContent($template, $this->data, $this->row);
            }
        }

        return $this;
    }

    /**
     * Process DT Row Data and Attr.
     *
<<<<<<< HEAD
     * @param  string  $attribute
     * @param  array  $template
=======
     * @param string $attribute
     * @param array  $template
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return $this
     */
    public function rowData($attribute, array $template)
    {
        if (count($template)) {
            $this->data[$attribute] = [];
            foreach ($template as $key => $value) {
                $this->data[$attribute][$key] = Helper::compileContent($value, $this->data, $this->row);
            }
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
}
