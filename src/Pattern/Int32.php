<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

class Int32 extends Number
{
    private const IDENTIFIER = 'l';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
