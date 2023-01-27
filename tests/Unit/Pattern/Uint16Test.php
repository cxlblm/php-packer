<?php

declare(strict_types=1);

use Cxlblm\PhpPacker\Pattern\Uint16;

/** @phpstan-return \Pest\PendingCalls\TestCall */
it('encode uint16 repeater zero', function () {
    $uint16 = new Uint16('ui16', 0);
    expect($uint16->encode())->toBeString()->toBe('S0');
})->throws(InvalidArgumentException::class);

it('encode uint16 repeater two', function () {
    $uint16 = new Uint16('ui16', 2);
    expect($uint16->encode())->toBeString()->toBe('S2');
});

it('encode uint16 repeater all', function () {
    $uint16 = new Uint16('ui16', '*');
    expect($uint16->encode())->toBeString()->toBe('S*');
});

it('decode uint16 repeater all', function () {
    $uint16 = new Uint16('ui16', '*');
    expect($uint16->decode())->toBeString()->toBe('S*ui16');
});

it('decode uint16 repeater many', function () {
    $uint16 = new Uint16('ui16', 22);
    expect($uint16->decode())->toBeString()->toBe('S22ui16');
});

it('decode uint16 repeater one', function () {
    $uint16 = new Uint16('ui16');
    expect($uint16->decode())->toBeString()->toBe('S1ui16');
});
