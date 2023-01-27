<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

class Uint64 extends Number
{
    private const IDENTIFIER = 'Q';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
