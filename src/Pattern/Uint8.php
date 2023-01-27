<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

class Uint8 extends Number
{
    private const IDENTIFIER = 'C';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
