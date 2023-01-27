<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

/**
 * encodes a string, padded with spaces if the string is shorter than the specified length.
 * The length of the encoded string is determined by the pattern's number following A, e.g., A5 encodes a string of 5 characters.
 */
class StringSpacePadded extends String_
{
    private const IDENTIFIER = 'A';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
