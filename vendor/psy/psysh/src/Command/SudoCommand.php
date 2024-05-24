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

use PhpParser\NodeTraverser;
use PhpParser\PrettyPrinter\Standard as Printer;
use Psy\Input\CodeArgument;
<<<<<<< HEAD
=======
use Psy\ParserFactory;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Psy\Readline\Readline;
use Psy\Sudo\SudoVisitor;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Evaluate PHP code, bypassing visibility restrictions.
 */
class SudoCommand extends Command
{
    private $readline;
    private $parser;
    private $traverser;
    private $printer;

    /**
     * {@inheritdoc}
     */
    public function __construct($name = null)
    {
<<<<<<< HEAD
        $this->parser = new CodeArgumentParser();

        // @todo Pass visitor directly to once we drop support for PHP-Parser 4.x
=======
        $parserFactory = new ParserFactory();
        $this->parser = $parserFactory->createParser();

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->traverser = new NodeTraverser();
        $this->traverser->addVisitor(new SudoVisitor());

        $this->printer = new Printer();

        parent::__construct($name);
    }

    /**
     * Set the Shell's Readline service.
     *
     * @param Readline $readline
     */
    public function setReadline(Readline $readline)
    {
        $this->readline = $readline;
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('sudo')
            ->setDefinition([
                new CodeArgument('code', CodeArgument::REQUIRED, 'Code to execute.'),
            ])
            ->setDescription('Evaluate PHP code, bypassing visibility restrictions.')
            ->setHelp(
                <<<'HELP'
Evaluate PHP code, bypassing visibility restrictions.

e.g.
<return>>>> $sekret->whisper("hi")</return>
<return>PHP error:  Call to private method Sekret::whisper() from context '' on line 1</return>

<return>>>> sudo $sekret->whisper("hi")</return>
<return>=> "hi"</return>

<return>>>> $sekret->word</return>
<return>PHP error:  Cannot access private property Sekret::$word on line 1</return>

<return>>>> sudo $sekret->word</return>
<return>=> "hi"</return>

<return>>>> $sekret->word = "please"</return>
<return>PHP error:  Cannot access private property Sekret::$word on line 1</return>

<return>>>> sudo $sekret->word = "please"</return>
<return>=> "please"</return>
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
        $code = $input->getArgument('code');

        // special case for !!
        if ($code === '!!') {
            $history = $this->readline->listHistory();
            if (\count($history) < 2) {
                throw new \InvalidArgumentException('No previous command to replay');
            }
            $code = $history[\count($history) - 2];
        }

<<<<<<< HEAD
        $nodes = $this->traverser->traverse($this->parser->parse($code));
=======
        if (\strpos($code, '<?') === false) {
            $code = '<?php ' . $code;
        }

        $nodes = $this->traverser->traverse($this->parse($code));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        $sudoCode = $this->printer->prettyPrint($nodes);
        $shell = $this->getApplication();
        $shell->addCode($sudoCode, !$shell->hasCode());

        return 0;
    }
<<<<<<< HEAD
=======

    /**
     * Lex and parse a string of code into statements.
     *
     * @param string $code
     *
     * @return array Statements
     */
    private function parse($code)
    {
        try {
            return $this->parser->parse($code);
        } catch (\PhpParser\Error $e) {
            if (\strpos($e->getMessage(), 'unexpected EOF') === false) {
                throw $e;
            }

            // If we got an unexpected EOF, let's try it again with a semicolon.
            return $this->parser->parse($code . ';');
        }
    }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
