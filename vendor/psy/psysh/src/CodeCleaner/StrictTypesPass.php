<?php

/*
 * This file is part of Psy Shell.
 *
<<<<<<< HEAD
 * (c) 2012-2023 Justin Hileman
=======
 * (c) 2012-2020 Justin Hileman
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Psy\CodeCleaner;

<<<<<<< HEAD
use PhpParser\Node;
=======
use PhpParser\Node\Identifier;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PhpParser\Node\Scalar\LNumber;
use PhpParser\Node\Stmt\Declare_;
use PhpParser\Node\Stmt\DeclareDeclare;
use Psy\Exception\FatalErrorException;

/**
 * Provide implicit strict types declarations for for subsequent execution.
 *
 * The strict types pass remembers the last strict types declaration:
 *
 *     declare(strict_types=1);
 *
 * ... which it then applies implicitly to all future evaluated code, until it
 * is replaced by a new declaration.
 */
class StrictTypesPass extends CodeCleanerPass
{
    const EXCEPTION_MESSAGE = 'strict_types declaration must have 0 or 1 as its value';

    private $strictTypes = false;
<<<<<<< HEAD

    /**
     * @param bool $strictTypes enforce strict types by default
     */
    public function __construct(bool $strictTypes = false)
    {
        $this->strictTypes = $strictTypes;
=======
    private $atLeastPhp7;

    public function __construct()
    {
        $this->atLeastPhp7 = \version_compare(PHP_VERSION, '7.0', '>=');
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * If this is a standalone strict types declaration, remember it for later.
     *
     * Otherwise, apply remembered strict types declaration to to the code until
     * a new declaration is encountered.
     *
     * @throws FatalErrorException if an invalid `strict_types` declaration is found
     *
     * @param array $nodes
<<<<<<< HEAD
     *
     * @return Node[]|null Array of nodes
     */
    public function beforeTraverse(array $nodes)
    {
=======
     */
    public function beforeTraverse(array $nodes)
    {
        if (!$this->atLeastPhp7) {
            return; // @codeCoverageIgnore
        }

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $prependStrictTypes = $this->strictTypes;

        foreach ($nodes as $node) {
            if ($node instanceof Declare_) {
                foreach ($node->declares as $declare) {
<<<<<<< HEAD
                    if ($declare->key->toString() === 'strict_types') {
                        $value = $declare->value;
                        // @todo Rename LNumber to Int_ once we drop support for PHP-Parser 4.x
                        if (!$value instanceof LNumber || ($value->value !== 0 && $value->value !== 1)) {
                            throw new FatalErrorException(self::EXCEPTION_MESSAGE, 0, \E_ERROR, null, $node->getStartLine());
=======
                    // For PHP Parser 4.x
                    $declareKey = $declare->key instanceof Identifier ? $declare->key->toString() : $declare->key;
                    if ($declareKey === 'strict_types') {
                        $value = $declare->value;
                        if (!$value instanceof LNumber || ($value->value !== 0 && $value->value !== 1)) {
                            throw new FatalErrorException(self::EXCEPTION_MESSAGE, 0, E_ERROR, null, $node->getLine());
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        }

                        $this->strictTypes = $value->value === 1;
                    }
                }
            }
        }

        if ($prependStrictTypes) {
            $first = \reset($nodes);
            if (!$first instanceof Declare_) {
<<<<<<< HEAD
                // @todo Switch to PhpParser\Node\DeclareItem once we drop support for PHP-Parser 4.x
                // @todo Rename LNumber to Int_ once we drop support for PHP-Parser 4.x
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $declare = new Declare_([new DeclareDeclare('strict_types', new LNumber(1))]);
                \array_unshift($nodes, $declare);
            }
        }

        return $nodes;
    }
}
