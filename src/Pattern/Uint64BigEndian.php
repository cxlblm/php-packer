<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

class Uint64BigEndian extends Number
{
    private const IDENTIFIER = 'J';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
