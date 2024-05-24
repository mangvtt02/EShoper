<?php

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * Original code based on the CommonMark JS reference parser (https://bitly.com/commonmark-js)
 *  - (c) John MacFarlane
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark;

/**
 * Converts CommonMark-compatible Markdown to HTML.
 */
<<<<<<< HEAD
class CommonMarkConverter extends MarkdownConverter
=======
class CommonMarkConverter extends Converter
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
{
    /**
     * The currently-installed version.
     *
     * This might be a typical `x.y.z` version, or `x.y-dev`.
     *
     * @deprecated in 1.5.0 and will be removed from 2.0.0.
     *   Use \Composer\InstalledVersions provided by composer-runtime-api instead.
     */
<<<<<<< HEAD
    public const VERSION = '1.6.7';
=======
    public const VERSION = '1.5.6';

    /** @var EnvironmentInterface */
    protected $environment;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Create a new commonmark converter instance.
     *
     * @param array<string, mixed>      $config
     * @param EnvironmentInterface|null $environment
     */
    public function __construct(array $config = [], EnvironmentInterface $environment = null)
    {
        if ($environment === null) {
            $environment = Environment::createCommonMarkEnvironment();
<<<<<<< HEAD
        } else {
            @\trigger_error(\sprintf('Passing an $environment into the "%s" constructor is deprecated in 1.6 and will not be supported in 2.0; use MarkdownConverter instead. See https://commonmark.thephpleague.com/2.0/upgrading/consumers/#commonmarkconverter-and-githubflavoredmarkdownconverter-constructors for more details.', self::class), \E_USER_DEPRECATED);
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        if ($environment instanceof ConfigurableEnvironmentInterface) {
            $environment->mergeConfig($config);
        }

<<<<<<< HEAD
        parent::__construct($environment);
=======
        $this->environment = $environment;

        parent::__construct(new DocParser($environment), new HtmlRenderer($environment));
    }

    public function getEnvironment(): EnvironmentInterface
    {
        return $this->environment;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
