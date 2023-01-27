<?php

declare(strict_types=1);

use Cxlblm\PhpPacker\Pattern\Int64;

/** @phpstan-return \Pest\PendingCalls\TestCall */
it('encode int64 repeater zero', function () {
    $int64 = new Int64('len', 0);
    expect($int64->encode())->toBeString()->toBe('q0');
})->throws(InvalidArgumentException::class);

it('encode int64 repeater two', function () {
    $int64 = new Int64('len', 2);
    expect($int64->encode())->toBeString()->toBe('q2');
});

it('encode int64 repeater all', function () {
    $int64 = new Int64('len', '*');
    expect($int64->encode())->toBeString()->toBe('q*');
});
