<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

class DoubleLittleEndian extends Number
{
    private const IDENTIFIER = 'e';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
