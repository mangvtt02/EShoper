<?php

namespace Illuminate\Routing;

use Illuminate\Support\Reflector;
use Illuminate\Support\Str;
use ReflectionFunction;
use ReflectionMethod;

class RouteSignatureParameters
{
    /**
     * Extract the route action's signature parameters.
     *
     * @param  array  $action
     * @param  string|null  $subClass
     * @return array
     */
    public static function fromAction(array $action, $subClass = null)
    {
        $parameters = is_string($action['uses'])
                        ? static::fromClassMethodString($action['uses'])
                        : (new ReflectionFunction($action['uses']))->getParameters();

        return is_null($subClass) ? $parameters : array_filter($parameters, function ($p) use ($subClass) {
            return Reflector::isParameterSubclassOf($p, $subClass);
        });
    }

    /**
     * Get the parameters for the given class / method by string.
     *
     * @param  string  $uses
     * @return array
     */
    protected static function fromClassMethodString($uses)
    {
        [$class, $method] = Str::parseCallback($uses);

<<<<<<< HEAD
        if (! method_exists($class, $method) && Reflector::isCallable($class, $method)) {
=======
        if (! method_exists($class, $method) && is_callable($class, $method)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return [];
        }

        return (new ReflectionMethod($class, $method))->getParameters();
    }
}
