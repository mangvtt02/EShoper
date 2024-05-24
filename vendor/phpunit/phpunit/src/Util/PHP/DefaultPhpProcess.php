<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Util\PHP;

<<<<<<< HEAD
use function array_merge;
use function fclose;
use function file_put_contents;
use function fread;
use function fwrite;
use function is_array;
use function is_resource;
use function proc_close;
use function proc_open;
use function proc_terminate;
use function rewind;
use function sprintf;
use function stream_get_contents;
use function stream_select;
use function sys_get_temp_dir;
use function tempnam;
use function unlink;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PHPUnit\Framework\Exception;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
class DefaultPhpProcess extends AbstractPhpProcess
{
    /**
     * @var string
     */
    protected $tempFile;

    /**
     * Runs a single job (PHP code) using a separate PHP process.
     *
     * @throws Exception
     */
    public function runJob(string $job, array $settings = []): array
    {
        if ($this->stdin || $this->useTemporaryFile()) {
<<<<<<< HEAD
            if (!($this->tempFile = tempnam(sys_get_temp_dir(), 'PHPUnit')) ||
                file_put_contents($this->tempFile, $job) === false) {
=======
            if (!($this->tempFile = \tempnam(\sys_get_temp_dir(), 'PHPUnit')) ||
                \file_put_contents($this->tempFile, $job) === false) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                throw new Exception(
                    'Unable to write temporary file'
                );
            }

            $job = $this->stdin;
        }

        return $this->runProcess($job, $settings);
    }

    /**
<<<<<<< HEAD
     * Returns an array of file handles to be used in place of pipes.
=======
     * Returns an array of file handles to be used in place of pipes
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected function getHandles(): array
    {
        return [];
    }

    /**
<<<<<<< HEAD
     * Handles creating the child process and returning the STDOUT and STDERR.
=======
     * Handles creating the child process and returning the STDOUT and STDERR
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @throws Exception
     */
    protected function runProcess(string $job, array $settings): array
    {
        $handles = $this->getHandles();

        $env = null;

        if ($this->env) {
            $env = $_SERVER ?? [];
            unset($env['argv'], $env['argc']);
<<<<<<< HEAD
            $env = array_merge($env, $this->env);

            foreach ($env as $envKey => $envVar) {
                if (is_array($envVar)) {
=======
            $env = \array_merge($env, $this->env);

            foreach ($env as $envKey => $envVar) {
                if (\is_array($envVar)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    unset($env[$envKey]);
                }
            }
        }

        $pipeSpec = [
            0 => $handles[0] ?? ['pipe', 'r'],
            1 => $handles[1] ?? ['pipe', 'w'],
            2 => $handles[2] ?? ['pipe', 'w'],
        ];

<<<<<<< HEAD
        $process = proc_open(
=======
        $process = \proc_open(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->getCommand($settings, $this->tempFile),
            $pipeSpec,
            $pipes,
            null,
            $env
        );

<<<<<<< HEAD
        if (!is_resource($process)) {
=======
        if (!\is_resource($process)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            throw new Exception(
                'Unable to spawn worker process'
            );
        }

        if ($job) {
            $this->process($pipes[0], $job);
        }

<<<<<<< HEAD
        fclose($pipes[0]);
=======
        \fclose($pipes[0]);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        $stderr = $stdout = '';

        if ($this->timeout) {
            unset($pipes[0]);

            while (true) {
                $r = $pipes;
                $w = null;
                $e = null;

<<<<<<< HEAD
                $n = @stream_select($r, $w, $e, $this->timeout);
=======
                $n = @\stream_select($r, $w, $e, $this->timeout);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

                if ($n === false) {
                    break;
                }

                if ($n === 0) {
<<<<<<< HEAD
                    proc_terminate($process, 9);

                    throw new Exception(
                        sprintf(
=======
                    \proc_terminate($process, 9);

                    throw new Exception(
                        \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                            'Job execution aborted after %d seconds',
                            $this->timeout
                        )
                    );
                }

                if ($n > 0) {
                    foreach ($r as $pipe) {
                        $pipeOffset = 0;

                        foreach ($pipes as $i => $origPipe) {
                            if ($pipe === $origPipe) {
                                $pipeOffset = $i;

                                break;
                            }
                        }

                        if (!$pipeOffset) {
                            break;
                        }

<<<<<<< HEAD
                        $line = fread($pipe, 8192);

                        if ($line === '' || $line === false) {
                            fclose($pipes[$pipeOffset]);
=======
                        $line = \fread($pipe, 8192);

                        if ($line === '' || $line === false) {
                            \fclose($pipes[$pipeOffset]);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

                            unset($pipes[$pipeOffset]);
                        } elseif ($pipeOffset === 1) {
                            $stdout .= $line;
                        } else {
                            $stderr .= $line;
                        }
                    }

                    if (empty($pipes)) {
                        break;
                    }
                }
            }
        } else {
            if (isset($pipes[1])) {
<<<<<<< HEAD
                $stdout = stream_get_contents($pipes[1]);

                fclose($pipes[1]);
            }

            if (isset($pipes[2])) {
                $stderr = stream_get_contents($pipes[2]);

                fclose($pipes[2]);
=======
                $stdout = \stream_get_contents($pipes[1]);

                \fclose($pipes[1]);
            }

            if (isset($pipes[2])) {
                $stderr = \stream_get_contents($pipes[2]);

                \fclose($pipes[2]);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }
        }

        if (isset($handles[1])) {
<<<<<<< HEAD
            rewind($handles[1]);

            $stdout = stream_get_contents($handles[1]);

            fclose($handles[1]);
        }

        if (isset($handles[2])) {
            rewind($handles[2]);

            $stderr = stream_get_contents($handles[2]);

            fclose($handles[2]);
        }

        proc_close($process);
=======
            \rewind($handles[1]);

            $stdout = \stream_get_contents($handles[1]);

            \fclose($handles[1]);
        }

        if (isset($handles[2])) {
            \rewind($handles[2]);

            $stderr = \stream_get_contents($handles[2]);

            \fclose($handles[2]);
        }

        \proc_close($process);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        $this->cleanup();

        return ['stdout' => $stdout, 'stderr' => $stderr];
    }

    protected function process($pipe, string $job): void
    {
<<<<<<< HEAD
        fwrite($pipe, $job);
=======
        \fwrite($pipe, $job);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    protected function cleanup(): void
    {
        if ($this->tempFile) {
<<<<<<< HEAD
            unlink($this->tempFile);
=======
            \unlink($this->tempFile);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }
    }

    protected function useTemporaryFile(): bool
    {
        return false;
    }
}
