<?php declare(strict_types=1);

namespace PhpParser;

<<<<<<< HEAD
interface Node {
=======
interface Node
{
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    /**
     * Gets the type of the node.
     *
     * @return string Type of the node
     */
<<<<<<< HEAD
    public function getType(): string;
=======
    public function getType() : string;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Gets the names of the sub nodes.
     *
<<<<<<< HEAD
     * @return string[] Names of sub nodes
     */
    public function getSubNodeNames(): array;
=======
     * @return array Names of sub nodes
     */
    public function getSubNodeNames() : array;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Gets line the node started in (alias of getStartLine).
     *
     * @return int Start line (or -1 if not available)
<<<<<<< HEAD
     *
     * @deprecated Use getStartLine() instead
     */
    public function getLine(): int;
=======
     */
    public function getLine() : int;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Gets line the node started in.
     *
     * Requires the 'startLine' attribute to be enabled in the lexer (enabled by default).
     *
     * @return int Start line (or -1 if not available)
     */
<<<<<<< HEAD
    public function getStartLine(): int;
=======
    public function getStartLine() : int;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Gets the line the node ended in.
     *
     * Requires the 'endLine' attribute to be enabled in the lexer (enabled by default).
     *
     * @return int End line (or -1 if not available)
     */
<<<<<<< HEAD
    public function getEndLine(): int;
=======
    public function getEndLine() : int;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Gets the token offset of the first token that is part of this node.
     *
     * The offset is an index into the array returned by Lexer::getTokens().
     *
     * Requires the 'startTokenPos' attribute to be enabled in the lexer (DISABLED by default).
     *
     * @return int Token start position (or -1 if not available)
     */
<<<<<<< HEAD
    public function getStartTokenPos(): int;
=======
    public function getStartTokenPos() : int;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Gets the token offset of the last token that is part of this node.
     *
     * The offset is an index into the array returned by Lexer::getTokens().
     *
     * Requires the 'endTokenPos' attribute to be enabled in the lexer (DISABLED by default).
     *
     * @return int Token end position (or -1 if not available)
     */
<<<<<<< HEAD
    public function getEndTokenPos(): int;
=======
    public function getEndTokenPos() : int;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Gets the file offset of the first character that is part of this node.
     *
     * Requires the 'startFilePos' attribute to be enabled in the lexer (DISABLED by default).
     *
     * @return int File start position (or -1 if not available)
     */
<<<<<<< HEAD
    public function getStartFilePos(): int;
=======
    public function getStartFilePos() : int;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Gets the file offset of the last character that is part of this node.
     *
     * Requires the 'endFilePos' attribute to be enabled in the lexer (DISABLED by default).
     *
     * @return int File end position (or -1 if not available)
     */
<<<<<<< HEAD
    public function getEndFilePos(): int;
=======
    public function getEndFilePos() : int;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Gets all comments directly preceding this node.
     *
     * The comments are also available through the "comments" attribute.
     *
     * @return Comment[]
     */
<<<<<<< HEAD
    public function getComments(): array;
=======
    public function getComments() : array;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Gets the doc comment of the node.
     *
     * @return null|Comment\Doc Doc comment object or null
     */
<<<<<<< HEAD
    public function getDocComment(): ?Comment\Doc;
=======
    public function getDocComment();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Sets the doc comment of the node.
     *
     * This will either replace an existing doc comment or add it to the comments array.
     *
     * @param Comment\Doc $docComment Doc comment to set
     */
<<<<<<< HEAD
    public function setDocComment(Comment\Doc $docComment): void;
=======
    public function setDocComment(Comment\Doc $docComment);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Sets an attribute on a node.
     *
<<<<<<< HEAD
     * @param mixed $value
     */
    public function setAttribute(string $key, $value): void;

    /**
     * Returns whether an attribute exists.
     */
    public function hasAttribute(string $key): bool;
=======
     * @param string $key
     * @param mixed  $value
     */
    public function setAttribute(string $key, $value);

    /**
     * Returns whether an attribute exists.
     *
     * @param string $key
     *
     * @return bool
     */
    public function hasAttribute(string $key) : bool;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Returns the value of an attribute.
     *
<<<<<<< HEAD
     * @param mixed $default
=======
     * @param string $key
     * @param mixed  $default
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @return mixed
     */
    public function getAttribute(string $key, $default = null);

    /**
     * Returns all the attributes of this node.
     *
<<<<<<< HEAD
     * @return array<string, mixed>
     */
    public function getAttributes(): array;
=======
     * @return array
     */
    public function getAttributes() : array;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Replaces all the attributes of this node.
     *
<<<<<<< HEAD
     * @param array<string, mixed> $attributes
     */
    public function setAttributes(array $attributes): void;
=======
     * @param array $attributes
     */
    public function setAttributes(array $attributes);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
