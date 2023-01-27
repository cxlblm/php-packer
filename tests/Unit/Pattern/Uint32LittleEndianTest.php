<?php

declare(strict_types=1);

use Cxlblm\PhpPacker\Pattern\Uint32LittleEndian;

/** @phpstan-return \Pest\PendingCalls\TestCall */
it('encode uint32 little endian repeater zero', function () {
    new Uint32LittleEndian('u32le', 0);
})->throws(InvalidArgumentException::class);

it('encode uint32 little endian repeater two', function () {
    $int8 = new Uint32LittleEndian('u32le', 2);
    expect($int8->encode())->toBeString()->toBe('V2');
});

it('encode uint32 little endian repeater auto', function () {
    $int8 = new Uint32LittleEndian('u32le', '*');
    expect($int8->encode())->toBeString()->toBe('V*');
});

it('decode uint32 little endian repeater auto', function () {
    $int8 = new Uint32LittleEndian('u32le', '*');
    expect($int8->decode())->toBeString()->toBe('V*u32le');
});

it('decode uint32 little endian repeater many', function () {
    $int8 = new Uint32LittleEndian('u32le', 9);
    expect($int8->decode())->toBeString()->toBe('V9u32le');
});

it('decode uint32 little endian repeater one', function () {
    $int8 = new Uint32LittleEndian('u32le');
    expect($int8->decode())->toBeString()->toBe('V1u32le');
});
