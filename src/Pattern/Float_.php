<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

class Float_ extends Number
{
    private const IDENTIFIER = 'f';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
