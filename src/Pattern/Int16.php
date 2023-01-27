<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

class Int16 extends Number
{
    private const IDENTIFIER = 's';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
