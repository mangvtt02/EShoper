<?php

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Extension\Mention;

use League\CommonMark\ConfigurableEnvironmentInterface;
<<<<<<< HEAD
use League\CommonMark\Exception\InvalidOptionException;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Extension\Mention\Generator\MentionGeneratorInterface;

final class MentionExtension implements ExtensionInterface
{
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $mentions = $environment->getConfig('mentions', []);
        foreach ($mentions as $name => $mention) {
<<<<<<< HEAD
            if (\array_key_exists('symbol', $mention)) {
                @\trigger_error('The "mentions/*/symbol" configuration option is deprecated in league/commonmark 1.6; rename "symbol" to "prefix" for compatibility with 2.0', \E_USER_DEPRECATED);
                $mention['prefix'] = $mention['symbol'];
            }

            if (\array_key_exists('pattern', $mention)) {
                // v2.0 does not allow full regex patterns passed into the configuration
                if (!self::isAValidPartialRegex($mention['pattern'])) {
                    throw new InvalidOptionException(\sprintf('Option "mentions/%s/pattern" must not include starting/ending delimiters (like "/")', $name));
                }

                $mention['pattern'] = '/' . $mention['pattern'] . '/i';
            } elseif (\array_key_exists('regex', $mention)) {
                @\trigger_error('The "mentions/*/regex" configuration option is deprecated in league/commonmark 1.6; rename "regex" to "pattern" for compatibility with 2.0', \E_USER_DEPRECATED);
                $mention['pattern'] = $mention['regex'];
            }

            foreach (['prefix', 'pattern', 'generator'] as $key) {
=======
            foreach (['symbol', 'regex', 'generator'] as $key) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                if (empty($mention[$key])) {
                    throw new \RuntimeException("Missing \"$key\" from MentionParser configuration");
                }
            }
            if ($mention['generator'] instanceof MentionGeneratorInterface) {
<<<<<<< HEAD
                $environment->addInlineParser(new MentionParser($mention['prefix'], $mention['pattern'], $mention['generator']));
            } elseif (is_string($mention['generator'])) {
                $environment->addInlineParser(MentionParser::createWithStringTemplate($mention['prefix'], $mention['pattern'], $mention['generator']));
            } elseif (is_callable($mention['generator'])) {
                $environment->addInlineParser(MentionParser::createWithCallback($mention['prefix'], $mention['pattern'], $mention['generator']));
=======
                $environment->addInlineParser(new MentionParser($mention['symbol'], $mention['regex'], $mention['generator']));
            } elseif (is_string($mention['generator'])) {
                $environment->addInlineParser(MentionParser::createWithStringTemplate($mention['symbol'], $mention['regex'], $mention['generator']));
            } elseif (is_callable($mention['generator'])) {
                $environment->addInlineParser(MentionParser::createWithCallback($mention['symbol'], $mention['regex'], $mention['generator']));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            } else {
                throw new \RuntimeException(sprintf('The "generator" provided for the MentionParser configuration must be a string template, callable, or an object that implements %s.', MentionGeneratorInterface::class));
            }
        }
    }
<<<<<<< HEAD

    private static function isAValidPartialRegex(string $regex): bool
    {
        $regex = '/' . $regex . '/i';

        return @\preg_match($regex, '') !== false;
    }
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
