<?php

declare(strict_types=1);

use Cxlblm\PhpPacker\Pattern\FloatBigEndian;

/** @phpstan-return \Pest\PendingCalls\TestCall */
it('encode float using machine-endian byte order', closure: function () {
    new FloatBigEndian('fb', 0);
})->throws(InvalidArgumentException::class);

it('encode float using machine-endian byte order one', function () {
    $float = new FloatBigEndian('fb');
    expect($float->encode())->toBeString()->toBe('G1');
});

it('enocde float using machine-endian byte order many', function () {
    $float = new FloatBigEndian('fb', 2);
    expect($float->encode())->toBeString()->toBe('G2');
});

it('decode float using machine-endian many', function () {
    $float = new FloatBigEndian('fb', 2);
    expect($float->decode())->toBeString()->toBe('G2fb');
});

it('decode float using machine-endian decode one', function () {
    $float = new FloatBigEndian('fb', 1);
    expect($float->decode())->toBeString()->toBe('G1fb');
});
