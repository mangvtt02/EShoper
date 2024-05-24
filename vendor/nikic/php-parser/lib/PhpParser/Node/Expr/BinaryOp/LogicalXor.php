<?php declare(strict_types=1);

namespace PhpParser\Node\Expr\BinaryOp;

use PhpParser\Node\Expr\BinaryOp;

<<<<<<< HEAD
class LogicalXor extends BinaryOp {
    public function getOperatorSigil(): string {
        return 'xor';
    }

    public function getType(): string {
=======
class LogicalXor extends BinaryOp
{
    public function getOperatorSigil() : string {
        return 'xor';
    }
    
    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'Expr_BinaryOp_LogicalXor';
    }
}
