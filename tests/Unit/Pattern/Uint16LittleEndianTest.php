<?php

declare(strict_types=1);

use Cxlblm\PhpPacker\Pattern\Uint16LittleEndian;

/** @phpstan-return \Pest\PendingCalls\TestCall */
it('encode uint 16 repeater zero', function () {
    $uint16 = new Uint16LittleEndian('u16le', 0);
    expect($uint16->encode())->toBeString()->toBe('v0');
})->throws(InvalidArgumentException::class);

it('encode uint 16 repeater two', function () {
    $uint16 = new Uint16LittleEndian('u16le', 2);
    expect($uint16->encode())->toBeString()->toBe('v2');
});

it('encode uint 16 repeater all', function () {
    $uint16 = new Uint16LittleEndian('u16le', '*');
    expect($uint16->encode())->toBeString()->toBe('v*');
});

it('decode uint 16 repeater auto', function () {
    $uint16 = new Uint16LittleEndian('u16le', '*');
    expect($uint16->decode())->toBeString()->toBe('v*u16le');
});

it('decode uint 16 repeater two', function () {
    $uint16 = new Uint16LittleEndian('u16le', 2);
    expect($uint16->decode())->toBeString()->toBe('v2u16le');
});

it('decode uint 16 repeater one', function () {
    $uint16 = new Uint16LittleEndian('u16le');
    expect($uint16->decode())->toBeString()->toBe('v1u16le');
});
