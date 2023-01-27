<?php

declare(strict_types=1);

use Cxlblm\PhpPacker\Pattern\DoubleLittleEndian;
use Pest\PendingCalls\TestCall;

/** @phpstan-return TestCall */
it('encode DoubleLLittleEndian repeater zero', function () {
    new DoubleLittleEndian('dl', 0);
})->throws(InvalidArgumentException::class);

it('encode DoubleLLittleEndian repeater two', function () {
    $DoubleLLittleEndian = new DoubleLittleEndian('dl', 2);
    expect($DoubleLLittleEndian->encode())->toBeString()->toBe('e2');
});

it('encode DoubleLLittleEndian repeater all', function () {
    $DoubleLLittleEndian = new DoubleLittleEndian('dl', '*');
    expect($DoubleLLittleEndian->encode())->toBeString()->toBe('e*');
});

it('decode DoubleLLittleEndian repeater all', function () {
    $DoubleLLittleEndian = new DoubleLittleEndian('dl', '*');
    expect($DoubleLLittleEndian->decode())->toBeString()->toBe('e*dl');
});

it('decode DoubleLLittleEndian repeater one', function () {
    $DoubleLLittleEndian = new DoubleLittleEndian('dl', 1);
    expect($DoubleLLittleEndian->decode())->toBeString()->toBe('e1dl');
});

it('decode DoubleLLittleEndian repeater many', function () {
    $DoubleLLittleEndian = new DoubleLittleEndian('dl', 2);
    expect($DoubleLLittleEndian->decode())->toBeString()->toBe('e2dl');
});
