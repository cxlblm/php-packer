<?php

declare(strict_types=1);

use Cxlblm\PhpPacker\Pattern\Int16;

/** @phpstan-return \Pest\PendingCalls\TestCall */
it('encode int16 repeater zero', function () {
    $Int16 = new Int16('len', 0);
    expect($Int16->encode())->toBeString()->toBe('s0');
})->throws(InvalidArgumentException::class);

it('encode int16 repeater two', function () {
    $Int16 = new Int16('len', 2);
    expect($Int16->encode())->toBeString()->toBe('s2');
});

it('encode int16 repeater all', function () {
    $Int16 = new Int16('len', '*');
    expect($Int16->encode())->toBeString()->toBe('s*');
});
