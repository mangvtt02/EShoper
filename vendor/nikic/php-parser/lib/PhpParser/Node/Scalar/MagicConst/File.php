<?php declare(strict_types=1);

namespace PhpParser\Node\Scalar\MagicConst;

use PhpParser\Node\Scalar\MagicConst;

<<<<<<< HEAD
class File extends MagicConst {
    public function getName(): string {
        return '__FILE__';
    }

    public function getType(): string {
=======
class File extends MagicConst
{
    public function getName() : string {
        return '__FILE__';
    }
    
    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'Scalar_MagicConst_File';
    }
}
