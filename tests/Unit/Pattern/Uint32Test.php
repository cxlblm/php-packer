<?php

declare(strict_types=1);

use Cxlblm\PhpPacker\Pattern\Uint32;

/** @phpstan-return \Pest\PendingCalls\TestCall */
it('encode uint32 repeater zero', function () {
    new Uint32('ui32', 0);
})->throws(InvalidArgumentException::class);

it('encode uint32 repeater two', function () {
    $uint32 = new Uint32('ui32', 2);
    expect($uint32->encode())->toBeString()->toBe('L2');
});

it('encode uint32 repeater auto', function () {
    $uint32 = new Uint32('ui32', '*');
    expect($uint32->encode())->toBeString()->toBe('L*');
});

it('decode uint32 repeater auto', function () {
    $uint32 = new Uint32('ui32', '*');
    expect($uint32->decode())->toBeString()->toBe('L*ui32');
});
it('encode uint32 repeater many', function () {
    $uint32 = new Uint32('ui32', 7);
    expect($uint32->decode())->toBeString()->toBe('L7ui32');
});
it('encode uint32 repeater one', function () {
    $uint32 = new Uint32('ui32');
    expect($uint32->decode())->toBeString()->toBe('L1ui32');
});
