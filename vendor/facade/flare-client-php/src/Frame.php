<?php

namespace Facade\FlareClient;

use Facade\FlareClient\Stacktrace\Codesnippet;

class Frame
{
    /** @var string */
<<<<<<< HEAD
    protected $file;

    /** @var int */
    protected $lineNumber;

    /** @var string */
    protected $method;

    /** @var string */
    protected $class;
=======
    private $file;

    /** @var int */
    private $lineNumber;

    /** @var string */
    private $method;

    /** @var string */
    private $class;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    public function __construct(
        string $file,
        int $lineNumber,
        string $method = null,
        string $class = null
    ) {
        $this->file = $file;

        $this->lineNumber = $lineNumber;

        $this->method = $method;

        $this->class = $class;
    }

    public function toArray(): array
    {
        $codeSnippet = (new Codesnippet())
            ->snippetLineCount(9)
            ->surroundingLine($this->lineNumber)
            ->get($this->file);

        return [
            'line_number' => $this->lineNumber,
            'method' => $this->getFullMethod(),
            'code_snippet' => $codeSnippet,
            'file' => $this->file,
        ];
    }

    private function getFullMethod(): string
    {
        $method = $this->method;

        if ($class = $this->class ?? false) {
            $method = "{$class}::{$method}";
        }

        return $method;
    }

    public function getFile(): string
    {
        return $this->file;
    }
}
