<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

class Uint16LittleEndian extends Number
{
    private const IDENTIFIER = 'v';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
