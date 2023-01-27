<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

class Uint32LittleEndian extends Number
{
    private const IDENTIFIER = 'V';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
