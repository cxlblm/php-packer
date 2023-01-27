<?php

declare(strict_types=1);

use Cxlblm\PhpPacker\Pattern\Float_;

/** @phpstan-return \Pest\PendingCalls\TestCall */
it('encode float using machine-endian byte order', function () {
    new Float_('ff', 0);
})->throws(InvalidArgumentException::class);

it('encode float using machine-endian byte order one', function () {
    $float = new Float_('ff');
    expect($float->encode())->toBeString()->toBe('f1');
});

it('encode float using machine-endian byte order many', function () {
    $float = new Float_('ff', 2);
    expect($float->encode())->toBeString()->toBe('f2');
});

it('decode float using machine-endian many', function () {
    $float = new Float_('ff', 2);
    expect($float->decode())->toBeString()->toBe('f2ff');
});

it('decode float using machine-endian one', function () {
    $float = new Float_('ff', 1);
    expect($float->decode())->toBeString()->toBe('f1ff');
});
