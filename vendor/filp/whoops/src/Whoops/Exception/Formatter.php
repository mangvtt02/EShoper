<?php
/**
 * Whoops - php errors for cool kids
 * @author Filipe Dobreira <http://github.com/filp>
 */

namespace Whoops\Exception;

<<<<<<< HEAD
use Whoops\Inspector\InspectorInterface;

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
class Formatter
{
    /**
     * Returns all basic information about the exception in a simple array
     * for further convertion to other languages
<<<<<<< HEAD
     * @param  InspectorInterface $inspector
     * @param  bool               $shouldAddTrace
     * @param  array<callable>    $frameFilters
     * @return array
     */
    public static function formatExceptionAsDataArray(InspectorInterface $inspector, $shouldAddTrace, array $frameFilters = [])
=======
     * @param  Inspector $inspector
     * @param  bool      $shouldAddTrace
     * @return array
     */
    public static function formatExceptionAsDataArray(Inspector $inspector, $shouldAddTrace)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $exception = $inspector->getException();
        $response = [
            'type'    => get_class($exception),
            'message' => $exception->getMessage(),
            'code'    => $exception->getCode(),
            'file'    => $exception->getFile(),
            'line'    => $exception->getLine(),
        ];

        if ($shouldAddTrace) {
<<<<<<< HEAD
            $frames    = $inspector->getFrames($frameFilters);
=======
            $frames    = $inspector->getFrames();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $frameData = [];

            foreach ($frames as $frame) {
                /** @var Frame $frame */
                $frameData[] = [
                    'file'     => $frame->getFile(),
                    'line'     => $frame->getLine(),
                    'function' => $frame->getFunction(),
                    'class'    => $frame->getClass(),
                    'args'     => $frame->getArgs(),
                ];
            }

            $response['trace'] = $frameData;
        }

        return $response;
    }

<<<<<<< HEAD
    public static function formatExceptionPlain(InspectorInterface $inspector)
=======
    public static function formatExceptionPlain(Inspector $inspector)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $message = $inspector->getException()->getMessage();
        $frames = $inspector->getFrames();

        $plain = $inspector->getExceptionName();
        $plain .= ' thrown with message "';
        $plain .= $message;
        $plain .= '"'."\n\n";

        $plain .= "Stacktrace:\n";
        foreach ($frames as $i => $frame) {
            $plain .= "#". (count($frames) - $i - 1). " ";
            $plain .= $frame->getClass() ?: '';
            $plain .= $frame->getClass() && $frame->getFunction() ? ":" : "";
            $plain .= $frame->getFunction() ?: '';
            $plain .= ' in ';
            $plain .= ($frame->getFile() ?: '<#unknown>');
            $plain .= ':';
            $plain .= (int) $frame->getLine(). "\n";
        }

        return $plain;
    }
}
