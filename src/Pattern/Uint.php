<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

class Uint extends Number
{
    private const IDENTIFIER = 'I';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
