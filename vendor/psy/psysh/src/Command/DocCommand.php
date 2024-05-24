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

use Psy\Formatter\DocblockFormatter;
use Psy\Formatter\SignatureFormatter;
use Psy\Input\CodeArgument;
<<<<<<< HEAD
use Psy\Output\ShellOutput;
use Psy\Reflection\ReflectionConstant;
=======
use Psy\Reflection\ReflectionClassConstant;
use Psy\Reflection\ReflectionConstant_;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Psy\Reflection\ReflectionLanguageConstruct;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Read the documentation for an object, class, constant, method or property.
 */
class DocCommand extends ReflectingCommand
{
<<<<<<< HEAD
    const INHERIT_DOC_TAG = '{@inheritdoc}';

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('doc')
            ->setAliases(['rtfm', 'man'])
            ->setDefinition([
                new InputOption('all', 'a', InputOption::VALUE_NONE, 'Show documentation for superclasses as well as the current class.'),
                new CodeArgument('target', CodeArgument::REQUIRED, 'Function, class, instance, constant, method or property to document.'),
            ])
            ->setDescription('Read the documentation for an object, class, constant, method or property.')
            ->setHelp(
                <<<HELP
Read the documentation for an object, class, constant, method or property.

It's awesome for well-documented code, not quite as awesome for poorly documented code.

e.g.
<return>>>> doc preg_replace</return>
<return>>>> doc Psy\Shell</return>
<return>>>> doc Psy\Shell::debug</return>
<return>>>> \$s = new Psy\Shell</return>
<return>>>> doc \$s->run</return>
HELP
            );
    }

    /**
     * {@inheritdoc}
<<<<<<< HEAD
     *
     * @return int 0 if everything went fine, or an exit code
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
=======
     */
    protected function execute(InputInterface $input, OutputInterface $output)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $value = $input->getArgument('target');
        if (ReflectionLanguageConstruct::isLanguageConstruct($value)) {
            $reflector = new ReflectionLanguageConstruct($value);
            $doc = $this->getManualDocById($value);
        } else {
            list($target, $reflector) = $this->getTargetAndReflector($value);
            $doc = $this->getManualDoc($reflector) ?: DocblockFormatter::format($reflector);
        }

        $db = $this->getApplication()->getManualDb();

        if ($output instanceof ShellOutput) {
            $output->startPaging();
        }

        // Maybe include the declaring class
        if ($reflector instanceof \ReflectionMethod || $reflector instanceof \ReflectionProperty) {
            $output->writeln(SignatureFormatter::format($reflector->getDeclaringClass()));
        }

        $output->writeln(SignatureFormatter::format($reflector));
        $output->writeln('');

        if (empty($doc) && !$db) {
            $output->writeln('<warning>PHP manual not found</warning>');
            $output->writeln('    To document core PHP functionality, download the PHP reference manual:');
            $output->writeln('    https://github.com/bobthecow/psysh/wiki/PHP-manual');
        } else {
            $output->writeln($doc);
        }

<<<<<<< HEAD
        // Implicit --all if the original docblock has an {@inheritdoc} tag.
        if ($input->getOption('all') || \stripos($doc, self::INHERIT_DOC_TAG) !== false) {
=======
        if ($input->getOption('all')) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $parent = $reflector;
            foreach ($this->getParentReflectors($reflector) as $parent) {
                $output->writeln('');
                $output->writeln('---');
                $output->writeln('');

                // Maybe include the declaring class
                if ($parent instanceof \ReflectionMethod || $parent instanceof \ReflectionProperty) {
                    $output->writeln(SignatureFormatter::format($parent->getDeclaringClass()));
                }

                $output->writeln(SignatureFormatter::format($parent));
                $output->writeln('');

                if ($doc = $this->getManualDoc($parent) ?: DocblockFormatter::format($parent)) {
                    $output->writeln($doc);
                }
            }
        }

        if ($output instanceof ShellOutput) {
            $output->stopPaging();
        }

        // Set some magic local variables
        $this->setCommandScopeVariables($reflector);

        return 0;
    }

    private function getManualDoc($reflector)
    {
        switch (\get_class($reflector)) {
            case \ReflectionClass::class:
            case \ReflectionObject::class:
            case \ReflectionFunction::class:
                $id = $reflector->name;
                break;

            case \ReflectionMethod::class:
<<<<<<< HEAD
                $id = $reflector->class.'::'.$reflector->name;
                break;

            case \ReflectionProperty::class:
                $id = $reflector->class.'::$'.$reflector->name;
                break;

            case \ReflectionClassConstant::class:
                // @todo this is going to collide with ReflectionMethod ids
                // someday... start running the query by id + type if the DB
                // supports it.
                $id = $reflector->class.'::'.$reflector->name;
                break;

            case ReflectionConstant::class:
=======
                $id = $reflector->class . '::' . $reflector->name;
                break;

            case \ReflectionProperty::class:
                $id = $reflector->class . '::$' . $reflector->name;
                break;

            case \ReflectionClassConstant::class:
            case ReflectionClassConstant::class:
                // @todo this is going to collide with ReflectionMethod ids
                // someday... start running the query by id + type if the DB
                // supports it.
                $id = $reflector->class . '::' . $reflector->name;
                break;

            case ReflectionConstant_::class:
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $id = $reflector->name;
                break;

            default:
                return false;
        }

        return $this->getManualDocById($id);
    }

    /**
     * Get all all parent Reflectors for a given Reflector.
     *
     * For example, passing a Class, Object or TraitReflector will yield all
     * traits and parent classes. Passing a Method or PropertyReflector will
     * yield Reflectors for the same-named method or property on all traits and
     * parent classes.
     *
<<<<<<< HEAD
     * @return \Generator a whole bunch of \Reflector instances
     */
    private function getParentReflectors($reflector): \Generator
    {
        $seenClasses = [];

=======
     * @return Generator a whole bunch of \Reflector instances
     */
    private function getParentReflectors($reflector)
    {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        switch (\get_class($reflector)) {
            case \ReflectionClass::class:
            case \ReflectionObject::class:
                foreach ($reflector->getTraits() as $trait) {
<<<<<<< HEAD
                    if (!\in_array($trait->getName(), $seenClasses)) {
                        $seenClasses[] = $trait->getName();
                        yield $trait;
                    }
                }

                foreach ($reflector->getInterfaces() as $interface) {
                    if (!\in_array($interface->getName(), $seenClasses)) {
                        $seenClasses[] = $interface->getName();
                        yield $interface;
                    }
=======
                    yield $trait;
                }

                foreach ($reflector->getInterfaces() as $interface) {
                    yield $interface;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                }

                while ($reflector = $reflector->getParentClass()) {
                    yield $reflector;

                    foreach ($reflector->getTraits() as $trait) {
<<<<<<< HEAD
                        if (!\in_array($trait->getName(), $seenClasses)) {
                            $seenClasses[] = $trait->getName();
                            yield $trait;
                        }
                    }

                    foreach ($reflector->getInterfaces() as $interface) {
                        if (!\in_array($interface->getName(), $seenClasses)) {
                            $seenClasses[] = $interface->getName();
                            yield $interface;
                        }
=======
                        yield $trait;
                    }

                    foreach ($reflector->getInterfaces() as $interface) {
                        yield $interface;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    }
                }

                return;

            case \ReflectionMethod::class:
                foreach ($this->getParentReflectors($reflector->getDeclaringClass()) as $parent) {
                    if ($parent->hasMethod($reflector->getName())) {
<<<<<<< HEAD
                        $parentMethod = $parent->getMethod($reflector->getName());
                        if (!\in_array($parentMethod->getDeclaringClass()->getName(), $seenClasses)) {
                            $seenClasses[] = $parentMethod->getDeclaringClass()->getName();
                            yield $parentMethod;
                        }
=======
                        yield $parent->getMethod($reflector->getName());
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    }
                }

                return;

            case \ReflectionProperty::class:
                foreach ($this->getParentReflectors($reflector->getDeclaringClass()) as $parent) {
                    if ($parent->hasProperty($reflector->getName())) {
<<<<<<< HEAD
                        $parentProperty = $parent->getProperty($reflector->getName());
                        if (!\in_array($parentProperty->getDeclaringClass()->getName(), $seenClasses)) {
                            $seenClasses[] = $parentProperty->getDeclaringClass()->getName();
                            yield $parentProperty;
                        }
=======
                        yield $parent->getProperty($reflector->getName());
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    }
                }
                break;
        }
    }

    private function getManualDocById($id)
    {
        if ($db = $this->getApplication()->getManualDb()) {
<<<<<<< HEAD
            $result = $db->query(\sprintf('SELECT doc FROM php_manual WHERE id = %s', $db->quote($id)));
            if ($result !== false) {
                return $result->fetchColumn(0);
            }
=======
            return $db
                ->query(\sprintf('SELECT doc FROM php_manual WHERE id = %s', $db->quote($id)))
                ->fetchColumn(0);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }
    }
}
