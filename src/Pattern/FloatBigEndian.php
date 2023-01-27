<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

class FloatBigEndian extends Number
{
    private const IDENTIFIER = 'G';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
