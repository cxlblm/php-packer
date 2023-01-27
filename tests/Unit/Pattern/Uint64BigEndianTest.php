<?php

declare(strict_types=1);

use Cxlblm\PhpPacker\Pattern\Uint64BigEndian;

/** @phpstan-return \Pest\PendingCalls\TestCall */
it('encode int64 repeater zero', function () {
    new Uint64BigEndian('ui64', 0);
})->throws(InvalidArgumentException::class);

it('encode int64 repeater two', function () {
    $Uint64BigEndian = new Uint64BigEndian('ui64', 2);
    expect($Uint64BigEndian->encode())->toBeString()->toBe('J2');
});

it('encode int64 repeater auto', function () {
    $Uint64BigEndian = new Uint64BigEndian('ui64', '*');
    expect($Uint64BigEndian->encode())->toBeString()->toBe('J*');
});

it('decode int64 repeater auto', function () {
    $Uint64BigEndian = new Uint64BigEndian('ui64', '*');
    expect($Uint64BigEndian->decode())->toBeString()->toBe('J*ui64');
});

it('decode int64 repeater many', function () {
    $Uint64BigEndian = new Uint64BigEndian('ui64', 9);
    expect($Uint64BigEndian->decode())->toBeString()->toBe('J9ui64');
});

it('decode int64 repeater one', function () {
    $Uint64BigEndian = new Uint64BigEndian('ui64');
    expect($Uint64BigEndian->decode())->toBeString()->toBe('J1ui64');
});
