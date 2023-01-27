<?php

declare(strict_types=1);

use Cxlblm\PhpPacker\Pattern\HexHigh;

/** @phpstan-return \Pest\PendingCalls\TestCall */
it('string hex high repeater zero', function () {
    $stringHexHigh = new HexHigh('string', 0);
    expect($stringHexHigh->encode())->toBeString()->toBe('H0');
})->throws(InvalidArgumentException::class);

it('string hex high repeater two', function () {
    $stringHexHigh = new HexHigh('string', 2);
    expect($stringHexHigh->encode())->toBeString()->toBe('H2');
});

it('string hex high repeater all', function () {
    $stringHexHigh = new HexHigh('string', '*');
    expect($stringHexHigh->encode())->toBeString()->toBe('H*');
});
