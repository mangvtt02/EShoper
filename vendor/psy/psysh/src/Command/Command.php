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

namespace Psy\Command;

use Psy\Shell;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command as BaseCommand;
use Symfony\Component\Console\Helper\Table;
<<<<<<< HEAD
=======
use Symfony\Component\Console\Helper\TableHelper;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Symfony\Component\Console\Helper\TableStyle;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * The Psy Shell base command.
 */
abstract class Command extends BaseCommand
{
    /**
     * Sets the application instance for this command.
     *
     * @param Application|null $application An Application instance
     *
     * @api
     */
<<<<<<< HEAD
    public function setApplication(?Application $application = null): void
=======
    public function setApplication(Application $application = null)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if ($application !== null && !$application instanceof Shell) {
            throw new \InvalidArgumentException('PsySH Commands require an instance of Psy\Shell');
        }

<<<<<<< HEAD
        parent::setApplication($application);
=======
        return parent::setApplication($application);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function asText(): string
    {
        $messages = [
            '<comment>Usage:</comment>',
            ' '.$this->getSynopsis(),
=======
    public function asText()
    {
        $messages = [
            '<comment>Usage:</comment>',
            ' ' . $this->getSynopsis(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            '',
        ];

        if ($this->getAliases()) {
            $messages[] = $this->aliasesAsText();
        }

        if ($this->getArguments()) {
            $messages[] = $this->argumentsAsText();
        }

        if ($this->getOptions()) {
            $messages[] = $this->optionsAsText();
        }

        if ($help = $this->getProcessedHelp()) {
            $messages[] = '<comment>Help:</comment>';
<<<<<<< HEAD
            $messages[] = ' '.\str_replace("\n", "\n ", $help)."\n";
=======
            $messages[] = ' ' . \str_replace("\n", "\n ", $help) . "\n";
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return \implode("\n", $messages);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    private function getArguments(): array
=======
    private function getArguments()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $hidden = $this->getHiddenArguments();

        return \array_filter($this->getNativeDefinition()->getArguments(), function ($argument) use ($hidden) {
            return !\in_array($argument->getName(), $hidden);
        });
    }

    /**
     * These arguments will be excluded from help output.
     *
<<<<<<< HEAD
     * @return string[]
     */
    protected function getHiddenArguments(): array
=======
     * @return array
     */
    protected function getHiddenArguments()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return ['command'];
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    private function getOptions(): array
=======
    private function getOptions()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $hidden = $this->getHiddenOptions();

        return \array_filter($this->getNativeDefinition()->getOptions(), function ($option) use ($hidden) {
            return !\in_array($option->getName(), $hidden);
        });
    }

    /**
     * These options will be excluded from help output.
     *
<<<<<<< HEAD
     * @return string[]
     */
    protected function getHiddenOptions(): array
=======
     * @return array
     */
    protected function getHiddenOptions()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return ['verbose'];
    }

    /**
     * Format command aliases as text..
<<<<<<< HEAD
     */
    private function aliasesAsText(): string
    {
        return '<comment>Aliases:</comment> <info>'.\implode(', ', $this->getAliases()).'</info>'.\PHP_EOL;
=======
     *
     * @return string
     */
    private function aliasesAsText()
    {
        return '<comment>Aliases:</comment> <info>' . \implode(', ', $this->getAliases()) . '</info>' . PHP_EOL;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Format command arguments as text.
<<<<<<< HEAD
     */
    private function argumentsAsText(): string
=======
     *
     * @return string
     */
    private function argumentsAsText()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $max = $this->getMaxWidth();
        $messages = [];

        $arguments = $this->getArguments();
        if (!empty($arguments)) {
            $messages[] = '<comment>Arguments:</comment>';
            foreach ($arguments as $argument) {
                if (null !== $argument->getDefault() && (!\is_array($argument->getDefault()) || \count($argument->getDefault()))) {
                    $default = \sprintf('<comment> (default: %s)</comment>', $this->formatDefaultValue($argument->getDefault()));
                } else {
                    $default = '';
                }

<<<<<<< HEAD
                $description = \str_replace("\n", "\n".\str_pad('', $max + 2, ' '), $argument->getDescription());

                $messages[] = \sprintf(" <info>%-{$max}s</info> %s%s", $argument->getName(), $description, $default);
=======
                $description = \str_replace("\n", "\n" . \str_pad('', $max + 2, ' '), $argument->getDescription());

                $messages[] = \sprintf(" <info>%-${max}s</info> %s%s", $argument->getName(), $description, $default);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }

            $messages[] = '';
        }

<<<<<<< HEAD
        return \implode(\PHP_EOL, $messages);
=======
        return \implode(PHP_EOL, $messages);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Format options as text.
<<<<<<< HEAD
     */
    private function optionsAsText(): string
=======
     *
     * @return string
     */
    private function optionsAsText()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $max = $this->getMaxWidth();
        $messages = [];

        $options = $this->getOptions();
        if ($options) {
            $messages[] = '<comment>Options:</comment>';

            foreach ($options as $option) {
                if ($option->acceptValue() && null !== $option->getDefault() && (!\is_array($option->getDefault()) || \count($option->getDefault()))) {
                    $default = \sprintf('<comment> (default: %s)</comment>', $this->formatDefaultValue($option->getDefault()));
                } else {
                    $default = '';
                }

                $multiple = $option->isArray() ? '<comment> (multiple values allowed)</comment>' : '';
<<<<<<< HEAD
                $description = \str_replace("\n", "\n".\str_pad('', $max + 2, ' '), $option->getDescription());

                $optionMax = $max - \strlen($option->getName()) - 2;
                $messages[] = \sprintf(
                    " <info>%s</info> %-{$optionMax}s%s%s%s",
                    '--'.$option->getName(),
=======
                $description = \str_replace("\n", "\n" . \str_pad('', $max + 2, ' '), $option->getDescription());

                $optionMax = $max - \strlen($option->getName()) - 2;
                $messages[] = \sprintf(
                    " <info>%s</info> %-${optionMax}s%s%s%s",
                    '--' . $option->getName(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $option->getShortcut() ? \sprintf('(-%s) ', $option->getShortcut()) : '',
                    $description,
                    $default,
                    $multiple
                );
            }

            $messages[] = '';
        }

<<<<<<< HEAD
        return \implode(\PHP_EOL, $messages);
=======
        return \implode(PHP_EOL, $messages);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Calculate the maximum padding width for a set of lines.
<<<<<<< HEAD
     */
    private function getMaxWidth(): int
=======
     *
     * @return int
     */
    private function getMaxWidth()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $max = 0;

        foreach ($this->getOptions() as $option) {
            $nameLength = \strlen($option->getName()) + 2;
            if ($option->getShortcut()) {
                $nameLength += \strlen($option->getShortcut()) + 3;
            }

            $max = \max($max, $nameLength);
        }

        foreach ($this->getArguments() as $argument) {
            $max = \max($max, \strlen($argument->getName()));
        }

        return ++$max;
    }

    /**
     * Format an option default as text.
     *
     * @param mixed $default
<<<<<<< HEAD
     */
    private function formatDefaultValue($default): string
=======
     *
     * @return string
     */
    private function formatDefaultValue($default)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if (\is_array($default) && $default === \array_values($default)) {
            return \sprintf("['%s']", \implode("', '", $default));
        }

        return \str_replace("\n", '', \var_export($default, true));
    }

    /**
     * Get a Table instance.
     *
<<<<<<< HEAD
     * @return Table
     */
    protected function getTable(OutputInterface $output)
    {
=======
     * Falls back to legacy TableHelper.
     *
     * @return Table|TableHelper
     */
    protected function getTable(OutputInterface $output)
    {
        if (!\class_exists(Table::class)) {
            return $this->getTableHelper();
        }

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $style = new TableStyle();

        // Symfony 4.1 deprecated single-argument style setters.
        if (\method_exists($style, 'setVerticalBorderChars')) {
            $style->setVerticalBorderChars(' ');
            $style->setHorizontalBorderChars('');
            $style->setCrossingChars('', '', '', '', '', '', '', '', '');
        } else {
            $style->setVerticalBorderChar(' ');
            $style->setHorizontalBorderChar('');
            $style->setCrossingChar('');
        }

        $table = new Table($output);

        return $table
            ->setRows([])
            ->setStyle($style);
    }
<<<<<<< HEAD
=======

    /**
     * Legacy fallback for getTable.
     *
     * @return TableHelper
     */
    protected function getTableHelper()
    {
        $table = $this->getApplication()->getHelperSet()->get('table');

        return $table
            ->setRows([])
            ->setLayout(TableHelper::LAYOUT_BORDERLESS)
            ->setHorizontalBorderChar('')
            ->setCrossingChar('');
    }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
