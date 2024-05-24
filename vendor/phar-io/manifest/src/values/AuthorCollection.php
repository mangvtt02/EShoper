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

/** @template-implements IteratorAggregate<int,Author> */
class AuthorCollection implements Countable, IteratorAggregate {
    /** @var Author[] */
    private $authors = [];

    public function add(Author $author): void {
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

class AuthorCollection implements \Countable, \IteratorAggregate {
    /**
     * @var Author[]
     */
    private $authors = [];

    public function add(Author $author) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->authors[] = $author;
    }

    /**
     * @return Author[]
     */
<<<<<<< HEAD
    public function getAuthors(): array {
        return $this->authors;
    }

    public function count(): int {
        return count($this->authors);
    }

    public function getIterator(): AuthorCollectionIterator {
=======
    public function getAuthors() {
        return $this->authors;
    }

    /**
     * @return int
     */
    public function count() {
        return count($this->authors);
    }

    /**
     * @return AuthorCollectionIterator
     */
    public function getIterator() {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return new AuthorCollectionIterator($this);
    }
}
