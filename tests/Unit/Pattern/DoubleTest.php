<?php

declare(strict_types=1);

use Cxlblm\PhpPacker\Pattern\Double;
use Pest\PendingCalls\TestCall;

/** @phpstan-return TestCall */
it('encode double repeater zero', function () {
    new Double('double', 0);
})->throws(InvalidArgumentException::class);

it('encode double repeater two', function () {
    $double = new Double('double', 2);
    expect($double->encode())->toBeString()->toBe('d2');
});

it('encode double repeater all', function () {
    $double = new Double('double', '*');
    expect($double->encode())->toBeString()->toBe('d*');
});

it('decode double repeater all', function () {
    $double = new Double('dd', '*');
    expect($double->decode())->toBeString()->toBe('d*dd');
});

it('decode double repeater one', function () {
    $double = new Double('dd', 1);
    expect($double->decode())->toBeString()->toBe('d1dd');
});

it('decode double repeater many', function () {
    $double = new Double('dd', 2);
    expect($double->decode())->toBeString()->toBe('d2dd');
});
