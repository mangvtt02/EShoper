<?php declare(strict_types=1);

namespace PhpParser\Node\Expr\Cast;

use PhpParser\Node\Expr\Cast;

<<<<<<< HEAD
class Object_ extends Cast {
    public function getType(): string {
=======
class Object_ extends Cast
{
    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'Expr_Cast_Object';
    }
}
