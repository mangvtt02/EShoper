<?php

namespace Yajra\DataTables\Utilities;

use DateTime;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class Helper
{
    /**
     * Places item of extra columns into results by care of their order.
     *
<<<<<<< HEAD
     * @param  array  $item
     * @param  array  $array
=======
     * @param array $item
     * @param array $array
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return array
     */
    public static function includeInArray($item, $array)
    {
        if (self::isItemOrderInvalid($item, $array)) {
            return array_merge($array, [$item['name'] => $item['content']]);
        }

        $count = 0;
        $last  = $array;
        $first = [];
        foreach ($array as $key => $value) {
            if ($count == $item['order']) {
                return array_merge($first, [$item['name'] => $item['content']], $last);
            }

            unset($last[$key]);
            $first[$key] = $value;

            $count++;
        }
    }

    /**
     * Check if item order is valid.
     *
<<<<<<< HEAD
     * @param  array  $item
     * @param  array  $array
=======
     * @param array $item
     * @param array $array
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return bool
     */
    protected static function isItemOrderInvalid($item, $array)
    {
        return $item['order'] === false || $item['order'] >= count($array);
    }

    /**
     * Determines if content is callable or blade string, processes and returns.
     *
<<<<<<< HEAD
     * @param  mixed  $content  Pre-processed content
     * @param  array  $data  data to use with blade template
     * @param  mixed  $param  parameter to call with callable
=======
     * @param mixed $content Pre-processed content
     * @param array $data    data to use with blade template
     * @param mixed $param   parameter to call with callable
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return mixed
     */
    public static function compileContent($content, array $data, $param)
    {
        if (is_string($content)) {
            return static::compileBlade($content, static::getMixedValue($data, $param));
<<<<<<< HEAD
        }

        if (is_callable($content)) {
            $reflection = new \ReflectionFunction($content);
            $arguments  = $reflection->getParameters();

            if (count($arguments) > 0) {
                return app()->call($content, [$arguments[0]->name => $param]);
            }

=======
        } elseif (is_callable($content)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return $content($param);
        }

        return $content;
    }

    /**
     * Parses and compiles strings by using Blade Template System.
     *
<<<<<<< HEAD
     * @param  string  $str
     * @param  array  $data
     * @return mixed
     *
=======
     * @param string $str
     * @param array  $data
     * @return mixed
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @throws \Exception
     */
    public static function compileBlade($str, $data = [])
    {
        if (view()->exists($str)) {
            return view($str, $data)->render();
        }

        ob_start() && extract($data, EXTR_SKIP);
        eval('?>' . app('blade.compiler')->compileString($str));
        $str = ob_get_contents();
        ob_end_clean();

        return $str;
    }

    /**
     * Get a mixed value of custom data and the parameters.
     *
<<<<<<< HEAD
     * @param  array  $data
     * @param  mixed  $param
=======
     * @param  array $data
     * @param  mixed $param
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return array
     */
    public static function getMixedValue(array $data, $param)
    {
        $casted = self::castToArray($param);

        $data['model'] = $param;

        foreach ($data as $key => $value) {
            if (isset($casted[$key])) {
                $data[$key] = $casted[$key];
            }
        }

        return $data;
    }

    /**
     * Cast the parameter into an array.
     *
<<<<<<< HEAD
     * @param  mixed  $param
=======
     * @param mixed $param
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return array
     */
    public static function castToArray($param)
    {
        if ($param instanceof \stdClass) {
            $param = (array) $param;

            return $param;
        }

        if ($param instanceof Arrayable) {
            return $param->toArray();
        }

        return $param;
    }

    /**
     * Get equivalent or method of query builder.
     *
<<<<<<< HEAD
     * @param  string  $method
=======
     * @param string $method
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return string
     */
    public static function getOrMethod($method)
    {
        if (! Str::contains(Str::lower($method), 'or')) {
            return 'or' . ucfirst($method);
        }

        return $method;
    }

    /**
     * Converts array object values to associative array.
     *
<<<<<<< HEAD
     * @param  mixed  $row
     * @param  array  $filters
=======
     * @param mixed $row
     * @param array $filters
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return array
     */
    public static function convertToArray($row, $filters = [])
    {
        $row  = is_object($row) && method_exists($row, 'makeHidden') ? $row->makeHidden(Arr::get($filters, 'hidden', [])) : $row;
        $row  = is_object($row) && method_exists($row, 'makeVisible') ? $row->makeVisible(Arr::get($filters, 'visible', [])) : $row;
        $data = $row instanceof Arrayable ? $row->toArray() : (array) $row;

        foreach ($data as &$value) {
            if (is_object($value) || is_array($value)) {
                $value = self::convertToArray($value);
            }

            unset($value);
        }

        return $data;
    }

    /**
<<<<<<< HEAD
     * @param  array  $data
=======
     * @param array $data
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return array
     */
    public static function transform(array $data)
    {
        return array_map(function ($row) {
            return self::transformRow($row);
        }, $data);
    }

    /**
     * Transform row data into an array.
     *
<<<<<<< HEAD
     * @param  mixed  $row
=======
     * @param mixed $row
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return array
     */
    protected static function transformRow($row)
    {
        foreach ($row as $key => $value) {
            if ($value instanceof DateTime) {
                $row[$key] = $value->format('Y-m-d H:i:s');
            } else {
                if (is_object($value)) {
                    $row[$key] = (string) $value;
                } else {
                    $row[$key] = $value;
                }
            }
        }

        return $row;
    }

    /**
     * Build parameters depending on # of arguments passed.
     *
<<<<<<< HEAD
     * @param  array  $args
=======
     * @param array $args
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return array
     */
    public static function buildParameters(array $args)
    {
        $parameters = [];

        if (count($args) > 2) {
            $parameters[] = $args[0];
            foreach ($args[1] as $param) {
                $parameters[] = $param;
            }
        } else {
            foreach ($args[0] as $param) {
                $parameters[] = $param;
            }
        }

        return $parameters;
    }

    /**
     * Replace all pattern occurrences with keyword.
     *
<<<<<<< HEAD
     * @param  array  $subject
     * @param  string  $keyword
     * @param  string  $pattern
=======
     * @param array  $subject
     * @param string $keyword
     * @param string $pattern
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return array
     */
    public static function replacePatternWithKeyword(array $subject, $keyword, $pattern = '$1')
    {
        $parameters = [];
        foreach ($subject as $param) {
            if (is_array($param)) {
                $parameters[] = self::replacePatternWithKeyword($param, $keyword, $pattern);
            } else {
                $parameters[] = str_replace($pattern, $keyword, $param);
            }
        }

        return $parameters;
    }

    /**
     * Get column name from string.
     *
<<<<<<< HEAD
     * @param  string  $str
     * @param  bool  $wantsAlias
=======
     * @param string $str
     * @param bool   $wantsAlias
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return string
     */
    public static function extractColumnName($str, $wantsAlias)
    {
        $matches = explode(' as ', Str::lower($str));

        if (! empty($matches)) {
            if ($wantsAlias) {
                return array_pop($matches);
            }

            return array_shift($matches);
        } elseif (strpos($str, '.')) {
            $array = explode('.', $str);

            return array_pop($array);
        }

        return $str;
    }

    /**
     * Adds % wildcards to the given string.
     *
<<<<<<< HEAD
     * @param  string  $str
     * @param  bool  $lowercase
=======
     * @param string $str
     * @param bool   $lowercase
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return string
     */
    public static function wildcardLikeString($str, $lowercase = true)
    {
        return static::wildcardString($str, '%', $lowercase);
    }

    /**
     * Adds wildcards to the given string.
     *
<<<<<<< HEAD
     * @param  string  $str
     * @param  string  $wildcard
     * @param  bool  $lowercase
=======
     * @param string $str
     * @param string $wildcard
     * @param bool   $lowercase
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return string
     */
    public static function wildcardString($str, $wildcard, $lowercase = true)
    {
        $wild  = $wildcard;
        $chars = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);

        if (count($chars) > 0) {
            foreach ($chars as $char) {
                $wild .= $char . $wildcard;
            }
        }

        if ($lowercase) {
            $wild = Str::lower($wild);
        }

        return $wild;
    }
}
