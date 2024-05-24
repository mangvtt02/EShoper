<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Contracts\Service\Attribute;

<<<<<<< HEAD
=======
use Attribute;

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
/**
 * A required dependency.
 *
 * This attribute indicates that a property holds a required dependency. The annotated property or method should be
 * considered during the instantiation process of the containing class.
 *
 * @author Alexander M. Turek <me@derrabus.de>
 */
<<<<<<< HEAD
#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::TARGET_PROPERTY)]
=======
#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_PROPERTY)]
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
final class Required
{
}
