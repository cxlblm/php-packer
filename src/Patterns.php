<?php

namespace Cxlblm\PhpPacker;

use Countable;
use Cxlblm\PhpPacker\Pattern\Base;
use InvalidArgumentException;

class Patterns implements Countable
{
    private string $encodeCache = '';

    private string $decodeCache = '';

    /**
     * @var array<int,string>
     */
    private array $names = [];

    /**
     * @param  Base[]  $patterns
     */
    public static function make(array $patterns): self
    {
        return new self($patterns);
    }

    /**
     * @param  Base[]  $patterns
     */
    public function __construct(
        private readonly array $patterns = [],
    ) {
        $this->build();
    }

    public function encode(): string
    {
        return $this->encodeCache;
    }

    /**
     * @param  array<string,mixed>|object  $data
     * @return array<string, mixed>
     */
    public function tidyParams(array|object $data): array
    {
        $values = [];
        foreach ($this->getPatterns() as $pattern) {
            $values = array_merge($values, (array) $pattern->encodeValue($data));
        }

        return $values;
    }

    public function decode(): string
    {
        return $this->decodeCache;
    }

    /**
     * @return Base[]
     */
    public function getPatterns(): array
    {
        return $this->patterns;
    }

    /**
     * @return string[]
     */
    public function getNames(): array
    {
        return $this->names;
    }

    private function build(): void
    {
        $names = $existByName = [];
        $encodeCache = '';
        $decodeCache = '';
        foreach ($this->patterns as $pattern) {
            if (isset($existByName[$pattern->getName()])) {
                throw new InvalidArgumentException("pattern name [{$pattern->getName()}] must unique");
            }
            if ($decodeCache) {
                $decodeCache .= '/';
            }
            $existByName[$pattern->getName()] = true;
            $names[] = $pattern->getName();
            $encodeCache .= $pattern->encode();
            $decodeCache .= $pattern->decode();
        }

        $this->decodeCache = $decodeCache;
        $this->encodeCache = $encodeCache;
        $this->names = $names;
    }

    public function count(): int
    {
        return count($this->patterns);
    }
}
