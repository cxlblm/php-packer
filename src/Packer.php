<?php

namespace Cxlblm\PhpPacker;

use Exception;

class Packer
{
    public function __construct(
        private readonly Patterns $patterns
    ) {
    }

    public static function make(Patterns $patterns): self
    {
        return new self($patterns);
    }

    /**
     * @param  array<string,mixed>|object  $data
     */
    public function encode(array|object $data): string
    {
        return pack($this->patterns->encode(), ...$this->patterns->tidyParams($data));
    }

    /**
     * @return array<string|int,mixed>
     *
     * @throws Exception
     */
    public function decode(string $bin): array
    {
        $decodeRaw = $this->decodeRaw($bin);

        $patterns = $this->patterns->getPatterns();
        $r = [];
        foreach ($decodeRaw as $key => $value) {
            foreach ($patterns as $pattern) {
                if ($pattern->decodeMatch($key)) {
                    $name = $pattern->getName();
                    if ($pattern->isMulti()) {
                        /** @phpstan-ignore-next-line */
                        $r[$name][] = $value;
                    } else {
                        $r[$name] = $value;
                    }
                    // only match one
                    break;
                }
            }
        }

        return $r;
    }

    /**
     * @return array<string,mixed>
     *
     * @throws Exception
     */
    public function decodeRaw(string $bin): array
    {
        $r = unpack($this->patterns->decode(), $bin);
        if ($r === false) {
            throw new Exception('xxxx');
        }

        return $r;
    }
}
