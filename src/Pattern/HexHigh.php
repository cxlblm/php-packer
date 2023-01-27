<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

/**
 * must be hex string and cannot start with 0x
 * H 14 => 10
 * H2 15 => 15
 * H3 151 => 1510
 */
class HexHigh extends Number
{
    private const IDENTIFIER = 'H';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
