<?php

declare(strict_types=1);

use Cxlblm\PhpPacker\Pattern\Int32;

/** @phpstan-return \Pest\PendingCalls\TestCall */
it('enocde int32 repeater zero', function () {
    $Int32 = new Int32('len', 0);
    expect($Int32->encode())->toBeString()->toBe('l0');
})->throws(InvalidArgumentException::class);

it('encode int32 repeater two', function () {
    $Int32 = new Int32('len', 2);
    expect($Int32->encode())->toBeString()->toBe('l2');
});

it('encode int32 repeater all', function () {
    $Int32 = new Int32('len', '*');
    expect($Int32->encode())->toBeString()->toBe('l*');
});
