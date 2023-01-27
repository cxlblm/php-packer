<?php

declare(strict_types=1);

use Cxlblm\PhpPacker\Pattern\Uint32BigEndian;

/** @phpstan-return \Pest\PendingCalls\TestCall */
it('encode uint32 repeater zero', function () {
    new Uint32BigEndian('u32be', 0);
})->throws(InvalidArgumentException::class);

it('encode uint32 big endian repeater two', function () {
    $int8 = new Uint32BigEndian('lu32been', 2);
    expect($int8->encode())->toBeString()->toBe('N2');
});

it('encode uint32 big endian repeater auto', function () {
    $int8 = new Uint32BigEndian('u32be', '*');
    expect($int8->encode())->toBeString()->toBe('N*');
});

it('decode uint32 big endian repeater auto', function () {
    $int8 = new Uint32BigEndian('u32be', '*');
    expect($int8->decode())->toBeString()->toBe('N*u32be');
});

it('decode uint32 big endian repeater many', function () {
    $int8 = new Uint32BigEndian('u32be', 12);
    expect($int8->decode())->toBeString()->toBe('N12u32be');
});

it('decode uint32 big endian repeater one', function () {
    $int8 = new Uint32BigEndian('u32be');
    expect($int8->decode())->toBeString()->toBe('N1u32be');
});
