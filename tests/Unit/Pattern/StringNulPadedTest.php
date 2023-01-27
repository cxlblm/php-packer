<?php

declare(strict_types=1);

use Cxlblm\PhpPacker\Pattern\StringNulPadded;

/** @phpstan-return \Pest\PendingCalls\TestCall */
it('encode string nul padded repeater zero', function () {
    $stringNulPadded = new StringNulPadded('sa', 0);
    expect($stringNulPadded->encode())->toBeString()->toBe('a0');
})->throws(InvalidArgumentException::class);

it('encode string nul padded repeater many', function () {
    $stringNulPadded = new StringNulPadded('sa', 5);
    expect($stringNulPadded->encode())->toBeString()->toBe('a5');
});

it('encode string nul padded repeater auto', function () {
    $stringNulPadded = new StringNulPadded('sa', '*');
    expect($stringNulPadded->encode())->toBeString()->toBe('a*');
});

it('decode string nul padded repeater auto', function () {
    $stringNulPadded = new StringNulPadded('sa', '*');
    expect($stringNulPadded->decode())->toBeString()->toBe('a*sa');
});

it('decode string nul padded repeater one', function () {
    $stringNulPadded = new StringNulPadded('sa');
    expect($stringNulPadded->decode())->toBeString()->toBe('a1sa');
});

it('decode string nul padded repeater many', function () {
    $stringNulPadded = new StringNulPadded('sa', 12);
    expect($stringNulPadded->decode())->toBeString()->toBe('a12sa');
});
