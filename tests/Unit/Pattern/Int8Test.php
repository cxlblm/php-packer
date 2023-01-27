<?php

declare(strict_types=1);

use Cxlblm\PhpPacker\Pattern\Int8;

/** @phpstan-return \Pest\PendingCalls\TestCall */
it('encode int8 repeater zero', function () {
    $Int8 = new Int8('len', 0);
    expect($Int8->encode())->toBeString()->toBe('c0');
})->throws(InvalidArgumentException::class);

it('encode int8 repeater many', function () {
    $Int8 = new Int8('len', 2);
    expect($Int8->encode())->toBeString()->toBe('c2');
});

it('encode int8 repeater all', function () {
    $Int8 = new Int8('len', '*');
    expect($Int8->encode())->toBeString()->toBe('c*');
});

it('decode int8 repeater all', function () {
    $Int8 = new Int8('len', '*');
    expect($Int8->decode())->toBeString()->toBe('c*len');
});

it('decode int8 repeater many', function () {
    $Int8 = new Int8('len', 4);
    expect($Int8->decode())->toBeString()->toBe('c4len');
});

it('decode int8 repeater one', function () {
    $Int8 = new Int8('len', 1);
    expect($Int8->decode())->toBeString()->toBe('c1len');
});
