<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

class NulByte extends Number
{
    private const IDENTIFIER = 'i';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
