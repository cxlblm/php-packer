<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

class DoubleBigEndian extends Number
{
    private const IDENTIFIER = 'E';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
