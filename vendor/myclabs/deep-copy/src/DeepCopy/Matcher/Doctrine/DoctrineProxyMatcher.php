<?php

namespace DeepCopy\Matcher\Doctrine;

use DeepCopy\Matcher\Matcher;
<<<<<<< HEAD
use Doctrine\Persistence\Proxy;
=======
use Doctrine\Common\Persistence\Proxy;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * @final
 */
class DoctrineProxyMatcher implements Matcher
{
    /**
     * Matches a Doctrine Proxy class.
     *
     * {@inheritdoc}
     */
    public function matches($object, $property)
    {
        return $object instanceof Proxy;
    }
}
