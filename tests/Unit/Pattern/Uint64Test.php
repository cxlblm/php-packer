<?php

declare(strict_types=1);

use Cxlblm\PhpPacker\Pattern\Uint64;

/** @phpstan-return \Pest\PendingCalls\TestCall */
it('encode int64 repeater zero', function () {
    $uint64 = new Uint64('ui64', 0);
    expect($uint64->encode())->toBeString()->toBe('Q0');
})->throws(InvalidArgumentException::class);

it('encode int64 repeater two', function () {
    $uint64 = new Uint64('ui64', 2);
    expect($uint64->encode())->toBeString()->toBe('Q2');
});

it('encode int64 repeater auto', function () {
    $uint64 = new Uint64('ui64', '*');
    expect($uint64->encode())->toBeString()->toBe('Q*');
});

it('decode int64 repeater auto', function () {
    $uint64 = new Uint64('ui64', '*');
    expect($uint64->decode())->toBeString()->toBe('Q*ui64');
});

it('decode int64 repeater many', function () {
    $uint64 = new Uint64('ui64', 9);
    expect($uint64->decode())->toBeString()->toBe('Q9ui64');
});

it('decode int64 repeater one', function () {
    $uint64 = new Uint64('ui64');
    expect($uint64->decode())->toBeString()->toBe('Q1ui64');
});
