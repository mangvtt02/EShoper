<?php declare(strict_types=1);

namespace PhpParser\Node\Expr\AssignOp;

use PhpParser\Node\Expr\AssignOp;

<<<<<<< HEAD
class Pow extends AssignOp {
    public function getType(): string {
=======
class Pow extends AssignOp
{
    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'Expr_AssignOp_Pow';
    }
}
