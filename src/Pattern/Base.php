<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

use InvalidArgumentException;

/**
 * @phpstan-consistent-constructor
 */
abstract class Base implements Pattern
{
    public function __construct(
        private readonly string $name = '',
        private readonly int|string $repeater = 1,
    ) {
        if (is_int($this->repeater)) {
            if ($this->repeater <= 0) {
                throw new InvalidArgumentException('repeater must be more than 0');
            }
        } elseif ($this->repeater != '*') {
            throw new InvalidArgumentException('repeater must be int or string [*]');
        }
    }

    public static function makeAuto(string $name = ''): static
    {
        return new static($name, '*');
    }

    abstract public function getIdentifier(): string;

    public function getName(): string
    {
        return $this->name;
    }

    protected function getRepeater(): string
    {
        if ($this->repeater == '*') {
            return '*';
        }

        return (string) $this->repeater;
    }

    public function encode(): string
    {
        return $this->getIdentifier().$this->getRepeater();
    }

    public function decode(): string
    {
        return $this->encode().$this->getName();
    }

    /**
     * @param  array<string,mixed>|object  $value
     */
    public function encodeValue(array|object $value): mixed
    {
        if (is_object($value)) {
            return $value->{$this->getName()} ?? throw new InvalidArgumentException('xx');
        }

        return $value[$this->getName()] ?? throw new InvalidArgumentException('xx');
    }

    public function decodeMatch(string $key): bool
    {
        return $key == $this->getName();
    }

    public function getNameLen(): int
    {
        return strlen($this->getName());
    }

    public function isMulti(): bool
    {
        return false;
    }
}
