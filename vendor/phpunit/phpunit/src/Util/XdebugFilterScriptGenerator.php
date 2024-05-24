<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Util;

<<<<<<< HEAD
use const DIRECTORY_SEPARATOR;
use function addslashes;
use function array_map;
use function implode;
use function is_string;
use function realpath;
use function sprintf;

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class XdebugFilterScriptGenerator
{
    public function generate(array $filterData): string
    {
        $items = $this->getWhitelistItems($filterData);

<<<<<<< HEAD
        $files = array_map(
            static function ($item)
            {
                return sprintf(
=======
        $files = \array_map(
            static function ($item) {
                return \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    "        '%s'",
                    $item
                );
            },
            $items
        );

<<<<<<< HEAD
        $files = implode(",\n", $files);
=======
        $files = \implode(",\n", $files);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return <<<EOF
<?php declare(strict_types=1);
if (!\\function_exists('xdebug_set_filter')) {
    return;
}

\\xdebug_set_filter(
    \\XDEBUG_FILTER_CODE_COVERAGE,
    \\XDEBUG_PATH_WHITELIST,
    [
<<<<<<< HEAD
{$files}
=======
$files
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    ]
);

EOF;
    }

    private function getWhitelistItems(array $filterData): array
    {
        $files = [];

        if (isset($filterData['include']['directory'])) {
            foreach ($filterData['include']['directory'] as $directory) {
<<<<<<< HEAD
                $path = realpath($directory['path']);

                if (is_string($path)) {
                    $files[] = sprintf(
                        addslashes('%s' . DIRECTORY_SEPARATOR),
=======
                $path = \realpath($directory['path']);

                if (\is_string($path)) {
                    $files[] = \sprintf(
                        \addslashes('%s' . \DIRECTORY_SEPARATOR),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        $path
                    );
                }
            }
        }

        if (isset($filterData['include']['directory'])) {
            foreach ($filterData['include']['file'] as $file) {
                $files[] = $file;
            }
        }

        return $files;
    }
}
