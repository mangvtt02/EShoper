<<<<<<< HEAD
<?php declare(strict_types = 1);
/*
 * This file is part of PharIo\Manifest.
 *
 * Copyright (c) Arne Blankerts <arne@blankerts.de>, Sebastian Heuer <sebastian@phpeople.de>, Sebastian Bergmann <sebastian@phpunit.de> and contributors
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */
namespace PharIo\Manifest;

use Iterator;
use function count;

/** @template-implements Iterator<int,Requirement> */
class RequirementCollectionIterator implements Iterator {
    /** @var Requirement[] */
    private $requirements;

    /** @var int */
    private $position = 0;
=======
<?php
/*
 * This file is part of PharIo\Manifest.
 *
 * (c) Arne Blankerts <arne@blankerts.de>, Sebastian Heuer <sebastian@phpeople.de>, Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PharIo\Manifest;

class RequirementCollectionIterator implements \Iterator {
    /**
     * @var Requirement[]
     */
    private $requirements = [];

    /**
     * @var int
     */
    private $position;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    public function __construct(RequirementCollection $requirements) {
        $this->requirements = $requirements->getRequirements();
    }

<<<<<<< HEAD
    public function rewind(): void {
        $this->position = 0;
    }

    public function valid(): bool {
        return $this->position < count($this->requirements);
    }

    public function key(): int {
        return $this->position;
    }

    public function current(): Requirement {
        return $this->requirements[$this->position];
    }

    public function next(): void {
=======
    public function rewind() {
        $this->position = 0;
    }

    /**
     * @return bool
     */
    public function valid() {
        return $this->position < count($this->requirements);
    }

    /**
     * @return int
     */
    public function key() {
        return $this->position;
    }

    /**
     * @return Requirement
     */
    public function current() {
        return $this->requirements[$this->position];
    }

    public function next() {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->position++;
    }
}
