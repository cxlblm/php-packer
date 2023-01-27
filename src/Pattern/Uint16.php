<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

class Uint16 extends Number
{
    private const IDENTIFIER = 'S';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
