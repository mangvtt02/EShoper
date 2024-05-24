<?php

/*
 * This file is part of Psy Shell.
 *
<<<<<<< HEAD
 * (c) 2012-2023 Justin Hileman
=======
 * (c) 2012-2020 Justin Hileman
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Psy\TabCompletion\Matcher;

use Psy\Command\Command;

/**
 * A Psy Command tab completion Matcher.
 *
 * This matcher provides completion for all registered Psy Command names and
 * aliases.
 *
 * @author Marc Garcia <markcial@gmail.com>
 */
class CommandsMatcher extends AbstractMatcher
{
    /** @var string[] */
    protected $commands = [];

    /**
     * CommandsMatcher constructor.
     *
     * @param Command[] $commands
     */
    public function __construct(array $commands)
    {
        $this->setCommands($commands);
    }

    /**
     * Set Commands for completion.
     *
     * @param Command[] $commands
     */
    public function setCommands(array $commands)
    {
        $names = [];
        foreach ($commands as $command) {
            $names = \array_merge([$command->getName()], $names);
            $names = \array_merge($command->getAliases(), $names);
        }
        $this->commands = $names;
    }

    /**
     * Check whether a command $name is defined.
     *
     * @param string $name
<<<<<<< HEAD
     */
    protected function isCommand(string $name): bool
=======
     *
     * @return bool
     */
    protected function isCommand($name)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return \in_array($name, $this->commands);
    }

    /**
     * Check whether input matches a defined command.
     *
     * @param string $name
<<<<<<< HEAD
     */
    protected function matchCommand(string $name): bool
=======
     *
     * @return bool
     */
    protected function matchCommand($name)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        foreach ($this->commands as $cmd) {
            if ($this->startsWith($name, $cmd)) {
                return true;
            }
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getMatches(array $tokens, array $info = []): array
=======
    public function getMatches(array $tokens, array $info = [])
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $input = $this->getInput($tokens);

        return \array_filter($this->commands, function ($command) use ($input) {
            return AbstractMatcher::startsWith($input, $command);
        });
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function hasMatched(array $tokens): bool
=======
    public function hasMatched(array $tokens)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        /* $openTag */ \array_shift($tokens);
        $command = \array_shift($tokens);

        switch (true) {
            case self::tokenIs($command, self::T_STRING) &&
<<<<<<< HEAD
            !$this->isCommand($command[1]) &&
            $this->matchCommand($command[1]) &&
            empty($tokens):
=======
                !$this->isCommand($command[1]) &&
                $this->matchCommand($command[1]) &&
                empty($tokens):
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                return true;
        }

        return false;
    }
}
