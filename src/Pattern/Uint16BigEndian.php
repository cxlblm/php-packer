<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

class Uint16BigEndian extends Number
{
    private const IDENTIFIER = 'n';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
