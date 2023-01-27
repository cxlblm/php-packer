<?php

declare(strict_types=1);

use Cxlblm\PhpPacker\Pattern\Uint16BigEndian;

/** @phpstan-return \Pest\PendingCalls\TestCall */
it('encode uint 16 repeater zero', function () {
    new Uint16BigEndian('u16', 0);
})->throws(InvalidArgumentException::class);

it('encode uint 16 repeater two', function () {
    $uint16 = new Uint16BigEndian('u16', 2);
    expect($uint16->encode())->toBeString()->toBe('n2');
});

it('encode uint 16 repeater auto', function () {
    $uint16 = new Uint16BigEndian('u16', '*');
    expect($uint16->encode())->toBeString()->toBe('n*');
});

it('decode uint 16 repeater auto', function () {
    $uint16 = new Uint16BigEndian('u16', '*');
    expect($uint16->decode())->toBeString()->toBe('n*u16');
});

it('decode uint 16 repeater many', function () {
    $uint16 = new Uint16BigEndian('u16', 3);
    expect($uint16->decode())->toBeString()->toBe('n3u16');
});

it('decode uint 16 repeater one', function () {
    $uint16 = new Uint16BigEndian('u16');
    expect($uint16->decode())->toBeString()->toBe('n1u16');
});
