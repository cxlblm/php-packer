<?php

declare(strict_types=1);

use Cxlblm\PhpPacker\Pattern\FloatLittleEndian;

/** @phpstan-return \Pest\PendingCalls\TestCall */
it('encode float using machine-endian byte order', closure: function () {
    new FloatLittleEndian('fl', 0);
})->throws(InvalidArgumentException::class);

it('encode float using machine-endian byte order one', function () {
    $float = new FloatLittleEndian('fl');
    expect($float->encode())->toBeString()->toBe('g1');
});

it('encode float using machine-endian byte order many', function () {
    $float = new FloatLittleEndian('fl', 2);
    expect($float->encode())->toBeString()->toBe('g2');
});

it('decode float using machine-endian many', function () {
    $float = new FloatLittleEndian('fl', 2);
    expect($float->decode())->toBeString()->toBe('g2fl');
});

it('decode float using machine-endian one', function () {
    $float = new FloatLittleEndian('fl', 1);
    expect($float->decode())->toBeString()->toBe('g1fl');
});
