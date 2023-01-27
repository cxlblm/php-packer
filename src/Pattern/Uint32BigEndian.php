<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

class Uint32BigEndian extends Number
{
    private const IDENTIFIER = 'N';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
