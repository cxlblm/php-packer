<?php

declare(strict_types=1);

use Cxlblm\PhpPacker\Pattern\Uint64LittleEndian;

/** @phpstan-return \Pest\PendingCalls\TestCall */
it('encode int64 repeater zero', function () {
    new Uint64LittleEndian('ui64', 0);
})->throws(InvalidArgumentException::class);

it('encode int64 repeater two', function () {
    $Uint64LittleEndian = new Uint64LittleEndian('ui64', 2);
    expect($Uint64LittleEndian->encode())->toBeString()->toBe('P2');
});

it('encode int64 repeater auto', function () {
    $Uint64LittleEndian = new Uint64LittleEndian('ui64', '*');
    expect($Uint64LittleEndian->encode())->toBeString()->toBe('P*');
});

it('decode int64 repeater auto', function () {
    $Uint64LittleEndian = new Uint64LittleEndian('ui64', '*');
    expect($Uint64LittleEndian->decode())->toBeString()->toBe('P*ui64');
});

it('decode int64 repeater many', function () {
    $Uint64LittleEndian = new Uint64LittleEndian('ui64', 9);
    expect($Uint64LittleEndian->decode())->toBeString()->toBe('P9ui64');
});

it('decode int64 repeater one', function () {
    $Uint64LittleEndian = new Uint64LittleEndian('ui64');
    expect($Uint64LittleEndian->decode())->toBeString()->toBe('P1ui64');
});
