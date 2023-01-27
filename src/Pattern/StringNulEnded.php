<?php

declare(strict_types=1);

namespace Cxlblm\PhpPacker\Pattern;

/**
 * encodes a null-terminated string, i.e., a string terminated with a null byte (ASCII 0).
 * The pattern's number following Z specifies the maximum length of the string to be encoded. If the actual length of the string is less than the maximum length, the encoded string is padded with null bytes.
 */
class StringNulEnded extends String_
{
    private const IDENTIFIER = 'Z';

    public function getIdentifier(): string
    {
        return self::IDENTIFIER;
    }
}
