<?php

declare(strict_types=1);

use Cxlblm\PhpPacker\Pattern\Uint8;

/** @phpstan-return \Pest\PendingCalls\TestCall */
it('encode uint 8 repeater zero', function () {
    new Uint8('sc', 0);
})->throws(InvalidArgumentException::class);

it('encode uint 8 repeater two', function () {
    $int8 = new Uint8('sc', 2);
    expect($int8->encode())->toBeString()->toBe('C2');
});

it('encode uint 8 repeater auto', function () {
    $int8 = new Uint8('sc', '*');
    expect($int8->encode())->toBeString()->toBe('C*');
});

it('decode uint 8 repeater auto', function () {
    $int8 = new Uint8('sc', '*');
    expect($int8->decode())->toBeString()->toBe('C*sc');
});

it('decode uint 8 repeater many', function () {
    $int8 = new Uint8('sc', '*');
    expect($int8->decode())->toBeString()->toBe('C*sc');
});

it('decode uint 8 repeater one', function () {
    $int8 = new Uint8('sc');
    expect($int8->decode())->toBeString()->toBe('C1sc');
});
