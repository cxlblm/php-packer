<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

/**
 * must be hex string and cannot start with 0x
 * h 14 => 01
 * h2 15 => 51
 * h3 151 => 5101
 */
class HexLow extends Number
{
    private const IDENTIFIER = 'h';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
