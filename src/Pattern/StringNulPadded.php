<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

/**
 * encodes a string, padded with null bytes if the string is shorter than the specified length.
 * The length of the encoded string is determined by the pattern's number following a, e.g., a5 encodes a string of 5 characters.
 */
class StringNulPadded extends String_
{
    private const IDENTIFIER = 'a';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
