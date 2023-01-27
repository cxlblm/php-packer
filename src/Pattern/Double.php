<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

class Double extends Number
{
    private const IDENTIFIER = 'd';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
