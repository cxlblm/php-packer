<?php

declare(strict_types=1);

use Cxlblm\PhpPacker\Pattern\StringNulEnded;

/** @phpstan-return \Pest\PendingCalls\TestCall */
it('string nul padded repeater zero', function () {
    $stringNulPadded = new StringNulEnded('string', 0);
    expect($stringNulPadded->encode())->toBeString()->toBe('Z0');
})->throws(InvalidArgumentException::class);

it('string nul padded repeater many', function () {
    $stringNulPadded = new StringNulEnded('string', 5);
    expect($stringNulPadded->encode())->toBeString()->toBe('Z5');
});

it('string nul padded repeater auto', function () {
    $stringNulPadded = new StringNulEnded('string', '*');
    expect($stringNulPadded->encode())->toBeString()->toBe('Z*');
});
