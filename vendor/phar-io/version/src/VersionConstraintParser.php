<<<<<<< HEAD
<?php declare(strict_types = 1);
=======
<?php
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
/*
 * This file is part of PharIo\Version.
 *
 * (c) Arne Blankerts <arne@blankerts.de>, Sebastian Heuer <sebastian@phpeople.de>, Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
=======

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
namespace PharIo\Version;

class VersionConstraintParser {
    /**
<<<<<<< HEAD
     * @throws UnsupportedVersionConstraintException
     */
    public function parse(string $value): VersionConstraint {
        if (\strpos($value, '|') !== false) {
            return $this->handleOrGroup($value);
        }

        if (!\preg_match('/^[\^~*]?v?[\d.*]+(?:-.*)?$/i', $value)) {
            throw new UnsupportedVersionConstraintException(
                \sprintf('Version constraint %s is not supported.', $value)
=======
     * @param string $value
     *
     * @return VersionConstraint
     *
     * @throws UnsupportedVersionConstraintException
     */
    public function parse($value) {

        if (strpos($value, '||') !== false) {
            return $this->handleOrGroup($value);
        }

        if (!preg_match('/^[\^~\*]?[\d.\*]+(?:-.*)?$/', $value)) {
            throw new UnsupportedVersionConstraintException(
                sprintf('Version constraint %s is not supported.', $value)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            );
        }

        switch ($value[0]) {
            case '~':
                return $this->handleTildeOperator($value);
            case '^':
                return $this->handleCaretOperator($value);
        }

<<<<<<< HEAD
        $constraint = new VersionConstraintValue($value);

        if ($constraint->getMajor()->isAny()) {
            return new AnyVersionConstraint();
        }

        if ($constraint->getMinor()->isAny()) {
            return new SpecificMajorVersionConstraint(
                $constraint->getVersionString(),
                $constraint->getMajor()->getValue() ?? 0
            );
        }

        if ($constraint->getPatch()->isAny()) {
            return new SpecificMajorAndMinorVersionConstraint(
                $constraint->getVersionString(),
                $constraint->getMajor()->getValue() ?? 0,
                $constraint->getMinor()->getValue() ?? 0
            );
        }

        return new ExactVersionConstraint($constraint->getVersionString());
    }

    private function handleOrGroup(string $value): OrVersionConstraintGroup {
        $constraints = [];

        foreach (\preg_split('{\s*\|\|?\s*}', \trim($value)) as $groupSegment) {
            $constraints[] = $this->parse(\trim($groupSegment));
=======
        $version = new VersionConstraintValue($value);

        if ($version->getMajor()->isAny()) {
            return new AnyVersionConstraint();
        }

        if ($version->getMinor()->isAny()) {
            return new SpecificMajorVersionConstraint(
                $version->getVersionString(),
                $version->getMajor()->getValue()
            );
        }

        if ($version->getPatch()->isAny()) {
            return new SpecificMajorAndMinorVersionConstraint(
                $version->getVersionString(),
                $version->getMajor()->getValue(),
                $version->getMinor()->getValue()
            );
        }

        return new ExactVersionConstraint($version->getVersionString());
    }

    /**
     * @param $value
     *
     * @return OrVersionConstraintGroup
     */
    private function handleOrGroup($value) {
        $constraints = [];

        foreach (explode('||', $value) as $groupSegment) {
            $constraints[] = $this->parse(trim($groupSegment));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return new OrVersionConstraintGroup($value, $constraints);
    }

<<<<<<< HEAD
    private function handleTildeOperator(string $value): AndVersionConstraintGroup {
        $constraintValue = new VersionConstraintValue(\substr($value, 1));

        if ($constraintValue->getPatch()->isAny()) {
            return $this->handleCaretOperator($value);
        }

        $constraints = [
            new GreaterThanOrEqualToVersionConstraint(
                $value,
                new Version(\substr($value, 1))
            ),
            new SpecificMajorAndMinorVersionConstraint(
                $value,
                $constraintValue->getMajor()->getValue() ?? 0,
                $constraintValue->getMinor()->getValue() ?? 0
            )
        ];

        return new AndVersionConstraintGroup($value, $constraints);
    }

    private function handleCaretOperator(string $value): AndVersionConstraintGroup {
        $constraintValue = new VersionConstraintValue(\substr($value, 1));

        $constraints = [
            new GreaterThanOrEqualToVersionConstraint($value, new Version(\substr($value, 1)))
        ];

        if ($constraintValue->getMajor()->getValue() === 0) {
            $constraints[] = new SpecificMajorAndMinorVersionConstraint(
                $value,
                $constraintValue->getMajor()->getValue() ?? 0,
                $constraintValue->getMinor()->getValue() ?? 0
            );
        } else {
            $constraints[] = new SpecificMajorVersionConstraint(
                $value,
                $constraintValue->getMajor()->getValue() ?? 0
            );
        }

        return new AndVersionConstraintGroup(
            $value,
            $constraints
=======
    /**
     * @param string $value
     *
     * @return AndVersionConstraintGroup
     */
    private function handleTildeOperator($value) {
        $version = new Version(substr($value, 1));
        $constraints = [
            new GreaterThanOrEqualToVersionConstraint($value, $version)
        ];

        if ($version->getPatch()->isAny()) {
            $constraints[] = new SpecificMajorVersionConstraint(
                $value,
                $version->getMajor()->getValue()
            );
        } else {
            $constraints[] = new SpecificMajorAndMinorVersionConstraint(
                $value,
                $version->getMajor()->getValue(),
                $version->getMinor()->getValue()
            );
        }

        return new AndVersionConstraintGroup($value, $constraints);
    }

    /**
     * @param string $value
     *
     * @return AndVersionConstraintGroup
     */
    private function handleCaretOperator($value) {
        $version = new Version(substr($value, 1));

        return new AndVersionConstraintGroup(
            $value,
            [
                new GreaterThanOrEqualToVersionConstraint($value, $version),
                new SpecificMajorVersionConstraint($value, $version->getMajor()->getValue())
            ]
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        );
    }
}
