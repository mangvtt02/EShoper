<?php

if (! function_exists('config_path')) {
    /**
     * Get the configuration path.
     *
<<<<<<< HEAD
     * @param  string  $path
=======
     * @param  string $path
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return string
     */
    function config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}

if (! function_exists('public_path')) {
    /**
     * Return the path to public dir.
     *
<<<<<<< HEAD
     * @param  null  $path
=======
     * @param null $path
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return string
     */
    function public_path($path = null)
    {
        return rtrim(app()->basePath('public/' . $path), '/');
    }
}
