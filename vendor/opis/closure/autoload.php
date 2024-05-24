<?php
/* ===========================================================================
<<<<<<< HEAD
 * Copyright (c) 2018-2021 Zindex Software
=======
 * Copyright (c) 2018-2019 Zindex Software
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 *
 * Licensed under the MIT License
 * =========================================================================== */

<<<<<<< HEAD
require_once __DIR__ . '/functions.php';
=======
require_once 'functions.php';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

spl_autoload_register(function($class){
   
    $class = ltrim($class, '\\');
    $dir = __DIR__ . '/src';
    $namespace = 'Opis\Closure';
    
    if(strpos($class, $namespace) === 0)
    {
        $class = substr($class, strlen($namespace));
        $path = '';
        if(($pos = strripos($class, '\\')) !== FALSE)
        {
            $path = str_replace('\\', '/', substr($class, 0, $pos)) . '/';
            $class = substr($class, $pos + 1);
        }
        $path .= str_replace('_', '/', $class) . '.php';
        $dir .= '/' . $path;
        
        if(file_exists($dir))
        {
            include $dir;
            return true;
        }
        
        return false;
    }
    
    return false;

});
