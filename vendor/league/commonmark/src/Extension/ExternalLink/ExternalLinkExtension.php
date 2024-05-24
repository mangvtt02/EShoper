<?php

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Extension\ExternalLink;

use League\CommonMark\ConfigurableEnvironmentInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\ExtensionInterface;

final class ExternalLinkExtension implements ExtensionInterface
{
    public function register(ConfigurableEnvironmentInterface $environment)
    {
<<<<<<< HEAD
        $environment->addEventListener(DocumentParsedEvent::class, new ExternalLinkProcessor($environment), -50);
=======
        $environment->addEventListener(DocumentParsedEvent::class, new ExternalLinkProcessor($environment));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
