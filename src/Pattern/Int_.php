<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

class Int_ extends Number
{
    private const IDENTIFIER = 'i';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
