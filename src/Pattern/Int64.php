<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

class Int64 extends Number
{
    private const IDENTIFIER = 'q';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
