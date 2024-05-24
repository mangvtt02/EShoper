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

use Countable;
use IteratorAggregate;
use function count;

/** @template-implements IteratorAggregate<int,Requirement> */
class RequirementCollection implements Countable, IteratorAggregate {
    /** @var Requirement[] */
    private $requirements = [];

    public function add(Requirement $requirement): void {
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

class RequirementCollection implements \Countable, \IteratorAggregate {
    /**
     * @var Requirement[]
     */
    private $requirements = [];

    public function add(Requirement $requirement) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->requirements[] = $requirement;
    }

    /**
     * @return Requirement[]
     */
<<<<<<< HEAD
    public function getRequirements(): array {
        return $this->requirements;
    }

    public function count(): int {
        return count($this->requirements);
    }

    public function getIterator(): RequirementCollectionIterator {
=======
    public function getRequirements() {
        return $this->requirements;
    }

    /**
     * @return int
     */
    public function count() {
        return count($this->requirements);
    }

    /**
     * @return RequirementCollectionIterator
     */
    public function getIterator() {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return new RequirementCollectionIterator($this);
    }
}
