<?php declare(strict_types=1);

namespace PhpParser;

/**
 * @codeCoverageIgnore
 */
<<<<<<< HEAD
abstract class NodeVisitorAbstract implements NodeVisitor {
=======
class NodeVisitorAbstract implements NodeVisitor
{
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function beforeTraverse(array $nodes) {
        return null;
    }

    public function enterNode(Node $node) {
        return null;
    }

    public function leaveNode(Node $node) {
        return null;
    }

    public function afterTraverse(array $nodes) {
        return null;
    }
}
