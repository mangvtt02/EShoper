<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Processor;

/**
 * Adds a tags array into record
 *
 * @author Martijn Riemers
 */
class TagProcessor implements ProcessorInterface
{
<<<<<<< HEAD
    /** @var string[] */
    private $tags;

    /**
     * @param string[] $tags
     */
=======
    private $tags;

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function __construct(array $tags = [])
    {
        $this->setTags($tags);
    }

<<<<<<< HEAD
    /**
     * @param string[] $tags
     */
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function addTags(array $tags = []): self
    {
        $this->tags = array_merge($this->tags, $tags);

        return $this;
    }

<<<<<<< HEAD
    /**
     * @param string[] $tags
     */
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function setTags(array $tags = []): self
    {
        $this->tags = $tags;

        return $this;
    }

<<<<<<< HEAD
    /**
     * {@inheritDoc}
     */
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function __invoke(array $record): array
    {
        $record['extra']['tags'] = $this->tags;

        return $record;
    }
}
