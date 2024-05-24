<?php

namespace Yajra\DataTables\Utilities;

/**
<<<<<<< HEAD
 * @mixin \Illuminate\Http\Request
=======
 * @method mixed input($key, $default = null)
 * @method mixed get($key, $default = null)
 * @method mixed query($key, $default = null)
 * @method mixed has($key)
 * @method mixed merge(array $values)
 * @method bool wantsJson()
 * @method bool ajax()
 * @method array all()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 */
class Request
{
    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->request = app('request');
    }

    /**
     * Proxy non existing method calls to request class.
     *
<<<<<<< HEAD
     * @param  mixed  $name
     * @param  mixed  $arguments
=======
     * @param mixed $name
     * @param mixed $arguments
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if (method_exists($this->request, $name)) {
            return call_user_func_array([$this->request, $name], $arguments);
        }
    }

    /**
     * Get attributes from request instance.
     *
<<<<<<< HEAD
     * @param  string  $name
=======
     * @param string $name
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return mixed
     */
    public function __get($name)
    {
        return $this->request->__get($name);
    }

    /**
     * Get all columns request input.
     *
     * @return array
     */
    public function columns()
    {
        return (array) $this->request->input('columns');
    }

    /**
     * Check if DataTables is searchable.
     *
     * @return bool
     */
    public function isSearchable()
    {
        return $this->request->input('search.value') != '';
    }

    /**
     * Check if DataTables must uses regular expressions.
     *
<<<<<<< HEAD
     * @param  int  $index
=======
     * @param int $index
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return bool
     */
    public function isRegex($index)
    {
        return $this->request->input("columns.$index.search.regex") === 'true';
    }

    /**
     * Get orderable columns.
     *
     * @return array
     */
    public function orderableColumns()
    {
        if (! $this->isOrderable()) {
            return [];
        }

        $orderable = [];
        for ($i = 0, $c = count($this->request->input('order')); $i < $c; $i++) {
            $order_col = (int) $this->request->input("order.$i.column");
            $order_dir = strtolower($this->request->input("order.$i.dir")) === 'asc' ? 'asc' : 'desc';
            if ($this->isColumnOrderable($order_col)) {
                $orderable[] = ['column' => $order_col, 'direction' => $order_dir];
            }
        }

        return $orderable;
    }

    /**
     * Check if DataTables ordering is enabled.
     *
     * @return bool
     */
    public function isOrderable()
    {
        return $this->request->input('order') && count($this->request->input('order')) > 0;
    }

    /**
     * Check if a column is orderable.
     *
<<<<<<< HEAD
     * @param  int  $index
=======
     * @param  int $index
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return bool
     */
    public function isColumnOrderable($index)
    {
        return $this->request->input("columns.$index.orderable", 'true') == 'true';
    }

    /**
     * Get searchable column indexes.
     *
     * @return array
     */
    public function searchableColumnIndex()
    {
        $searchable = [];
        for ($i = 0, $c = count($this->request->input('columns')); $i < $c; $i++) {
            if ($this->isColumnSearchable($i, false)) {
                $searchable[] = $i;
            }
        }

        return $searchable;
    }

    /**
     * Check if a column is searchable.
     *
<<<<<<< HEAD
     * @param  int  $i
     * @param  bool  $column_search
=======
     * @param int $i
     * @param bool    $column_search
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return bool
     */
    public function isColumnSearchable($i, $column_search = true)
    {
        if ($column_search) {
            return
                (
                    $this->request->input("columns.$i.searchable", 'true') === 'true'
                    ||
                    $this->request->input("columns.$i.searchable", 'true') === true
                )
                && $this->columnKeyword($i) != '';
        }

        return
            $this->request->input("columns.$i.searchable", 'true') === 'true'
            ||
            $this->request->input("columns.$i.searchable", 'true') === true;
    }

    /**
     * Get column's search value.
     *
<<<<<<< HEAD
     * @param  int  $index
=======
     * @param int $index
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return string
     */
    public function columnKeyword($index)
    {
<<<<<<< HEAD
        $keyword = $this->request->input("columns.$index.search.value") ?? '';
=======
        $keyword = $this->request->input("columns.$index.search.value");
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return $this->prepareKeyword($keyword);
    }

    /**
     * Prepare keyword string value.
     *
<<<<<<< HEAD
     * @param  string|array  $keyword
=======
     * @param string|array $keyword
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return string
     */
    protected function prepareKeyword($keyword)
    {
        if (is_array($keyword)) {
            return implode(' ', $keyword);
        }

        return $keyword;
    }

    /**
     * Get global search keyword.
     *
     * @return string
     */
    public function keyword()
    {
<<<<<<< HEAD
        $keyword = $this->request->input('search.value') ?? '';
=======
        $keyword = $this->request->input('search.value');
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return $this->prepareKeyword($keyword);
    }

    /**
     * Get column identity from input or database.
     *
<<<<<<< HEAD
     * @param  int  $i
     * @param  string|null  $type
     * @return string
     */
    public function columnName($i, $type = null)
    {
        $column = $this->request->input("columns.$i");

        if (isset($type) && isset($column['data']) && is_array($column['data'])) {
            if (isset($column['data'][$type]) && $column['data'][$type] != '') {
                return $column['data'][$type];
            }

            if (isset($column['data']['display']) && $column['data']['display'] != '') {
                return $column['data']['display'];
            }

            if (isset($column['data']['_']) && $column['data']['_'] != '') {
                return $column['data']['_'];
            }

            return $column['name'];
        }

=======
     * @param int $i
     * @return string
     */
    public function columnName($i)
    {
        $column = $this->request->input("columns.$i");

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return isset($column['name']) && $column['name'] != '' ? $column['name'] : $column['data'];
    }

    /**
     * Check if DataTables allow pagination.
     *
     * @return bool
     */
    public function isPaginationable()
    {
        return ! is_null($this->request->input('start')) &&
            ! is_null($this->request->input('length')) &&
            $this->request->input('length') != -1;
    }
}
