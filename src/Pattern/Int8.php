<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

class Int8 extends Number
{
    private const IDENTIFIER = 'c';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
