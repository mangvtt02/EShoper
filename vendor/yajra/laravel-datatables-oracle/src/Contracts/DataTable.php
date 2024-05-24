<?php

namespace Yajra\DataTables\Contracts;

interface DataTable
{
    /**
     * Get results.
     *
     * @return mixed
     */
    public function results();

    /**
     * Count results.
     *
     * @return int
     */
    public function count();

    /**
     * Count total items.
     *
     * @return int
     */
    public function totalCount();

    /**
     * Set auto filter off and run your own filter.
     * Overrides global search.
     *
<<<<<<< HEAD
     * @param  callable  $callback
     * @param  bool  $globalSearch
=======
     * @param callable $callback
     * @param bool     $globalSearch
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return $this
     */
    public function filter(callable $callback, $globalSearch = false);

    /**
     * Perform global search.
     *
     * @return void
     */
    public function filtering();

    /**
     * Perform column search.
     *
     * @return void
     */
    public function columnSearch();

    /**
     * Perform pagination.
     *
     * @return void
     */
    public function paging();

    /**
     * Perform sorting of columns.
     *
     * @return void
     */
    public function ordering();

    /**
     * Organizes works.
     *
<<<<<<< HEAD
     * @param  bool  $mDataSupport
=======
     * @param bool $mDataSupport
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return \Illuminate\Http\JsonResponse
     */
    public function make($mDataSupport = true);
}
