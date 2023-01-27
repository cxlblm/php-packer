<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

class FloatLittleEndian extends Number
{
    private const IDENTIFIER = 'g';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
