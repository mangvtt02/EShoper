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

/** @template-implements IteratorAggregate<int,BundledComponent> */
class BundledComponentCollection implements Countable, IteratorAggregate {
    /** @var BundledComponent[] */
    private $bundledComponents = [];

    public function add(BundledComponent $bundledComponent): void {
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

class BundledComponentCollection implements \Countable, \IteratorAggregate {
    /**
     * @var BundledComponent[]
     */
    private $bundledComponents = [];

    public function add(BundledComponent $bundledComponent) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->bundledComponents[] = $bundledComponent;
    }

    /**
     * @return BundledComponent[]
     */
<<<<<<< HEAD
    public function getBundledComponents(): array {
        return $this->bundledComponents;
    }

    public function count(): int {
        return count($this->bundledComponents);
    }

    public function getIterator(): BundledComponentCollectionIterator {
=======
    public function getBundledComponents() {
        return $this->bundledComponents;
    }

    /**
     * @return int
     */
    public function count() {
        return count($this->bundledComponents);
    }

    /**
     * @return BundledComponentCollectionIterator
     */
    public function getIterator() {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return new BundledComponentCollectionIterator($this);
    }
}
