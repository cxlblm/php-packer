<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

class Uint32 extends Number
{
    private const IDENTIFIER = 'L';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
