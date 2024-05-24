<?php

namespace Yajra\DataTables\Utilities;

use Illuminate\Contracts\Config\Repository;

class Config
{
    /**
     * @var \Illuminate\Contracts\Config\Repository
     */
    private $repository;

    /**
     * Config constructor.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Contracts\Config\Repository  $repository
=======
     * @param \Illuminate\Contracts\Config\Repository $repository
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Check if config uses wild card search.
     *
     * @return bool
     */
    public function isWildcard()
    {
        return $this->repository->get('datatables.search.use_wildcards', false);
    }

    /**
     * Check if config uses smart search.
     *
     * @return bool
     */
    public function isSmartSearch()
    {
        return $this->repository->get('datatables.search.smart', true);
    }

    /**
     * Check if config uses case insensitive search.
     *
     * @return bool
     */
    public function isCaseInsensitive()
    {
        return $this->repository->get('datatables.search.case_insensitive', false);
    }

    /**
     * Check if app is in debug mode.
     *
     * @return bool
     */
    public function isDebugging()
    {
        return $this->repository->get('app.debug', false);
    }

    /**
     * Get the specified configuration value.
     *
<<<<<<< HEAD
     * @param  string  $key
     * @param  mixed  $default
=======
     * @param string $key
     * @param mixed  $default
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return $this->repository->get($key, $default);
    }

    /**
     * Set a given configuration value.
     *
<<<<<<< HEAD
     * @param  array|string  $key
     * @param  mixed  $value
=======
     * @param  array|string $key
     * @param  mixed        $value
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return void
     */
    public function set($key, $value = null)
    {
        $this->repository->set($key, $value);
    }

    /**
     * Check if dataTable config uses multi-term searching.
     *
     * @return bool
     */
    public function isMultiTerm()
    {
        return $this->repository->get('datatables.search.multi_term', true);
    }

    /**
     * Check if dataTable config uses starts_with searching.
     *
     * @return bool
     */
    public function isStartsWithSearch()
    {
        return $this->repository->get('datatables.search.starts_with', false);
    }
}
