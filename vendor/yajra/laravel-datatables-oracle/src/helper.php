<?php

if (! function_exists('datatables')) {
    /**
     * Helper to make a new DataTable instance from source.
     * Or return the factory if source is not set.
     *
<<<<<<< HEAD
     * @param  mixed  $source
=======
     * @param mixed $source
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return \Yajra\DataTables\DataTableAbstract|\Yajra\DataTables\DataTables
     */
    function datatables($source = null)
    {
        if (is_null($source)) {
            return app('datatables');
        }

        return app('datatables')->make($source);
    }
}
