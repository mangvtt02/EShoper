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
use function in_array;
use function sprintf;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 *
=======
/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 * @psalm-immutable
 */
final class VersionComparisonOperator
{
    /**
     * @psalm-var '<'|'lt'|'<='|'le'|'>'|'gt'|'>='|'ge'|'=='|'='|'eq'|'!='|'<>'|'ne'
     */
    private $operator;

    public function __construct(string $operator)
    {
        $this->ensureOperatorIsValid($operator);

        $this->operator = $operator;
    }

    /**
<<<<<<< HEAD
     * @return '!='|'<'|'<='|'<>'|'='|'=='|'>'|'>='|'eq'|'ge'|'gt'|'le'|'lt'|'ne'
=======
     * @return '<'|'lt'|'<='|'le'|'>'|'gt'|'>='|'ge'|'=='|'='|'eq'|'!='|'<>'|'ne'
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function asString(): string
    {
        return $this->operator;
    }

    /**
     * @throws Exception
     *
     * @psalm-assert '<'|'lt'|'<='|'le'|'>'|'gt'|'>='|'ge'|'=='|'='|'eq'|'!='|'<>'|'ne' $operator
     */
    private function ensureOperatorIsValid(string $operator): void
    {
<<<<<<< HEAD
        if (!in_array($operator, ['<', 'lt', '<=', 'le', '>', 'gt', '>=', 'ge', '==', '=', 'eq', '!=', '<>', 'ne'], true)) {
            throw new Exception(
                sprintf(
=======
        if (!\in_array($operator, ['<', 'lt', '<=', 'le', '>', 'gt', '>=', 'ge', '==', '=', 'eq', '!=', '<>', 'ne'])) {
            throw new Exception(
                \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    '"%s" is not a valid version_compare() operator',
                    $operator
                )
            );
        }
    }
}
