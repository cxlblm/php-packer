<?php

declare(strict_types=1);

use Cxlblm\PhpPacker\Pattern\DoubleBigEndian;
use Pest\PendingCalls\TestCall;

/** @phpstan-return TestCall */
it('encode double repeater zero', function () {
    new DoubleBigEndian('de', 0);
})->throws(InvalidArgumentException::class);

it('encode double repeater two', function () {
    $double = new DoubleBigEndian('de', 2);
    expect($double->encode())->toBeString()->toBe('E2');
});

it('encode double repeater all', function () {
    $double = new DoubleBigEndian('de', '*');
    expect($double->encode())->toBeString()->toBe('E*');
});

it('decode double repeater all', function () {
    $double = new DoubleBigEndian('de', '*');
    expect($double->decode())->toBeString()->toBe('E*de');
});

it('decode double repeater one', function () {
    $double = new DoubleBigEndian('de', 1);
    expect($double->decode())->toBeString()->toBe('E1de');
});

it('decode double repeater many', function () {
    $double = new DoubleBigEndian('de', 2);
    expect($double->decode())->toBeString()->toBe('E2de');
});
