<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

class Uint64LittleEndian extends Number
{
    private const IDENTIFIER = 'P';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
