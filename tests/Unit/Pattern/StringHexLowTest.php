<?php

declare(strict_types=1);

use Cxlblm\PhpPacker\Pattern\HexLow;

/** @phpstan-return \Pest\PendingCalls\TestCall */
it('string hex low repeater zero', function () {
    $stringHexLow = new HexLow('string', 0);
    expect($stringHexLow->encode())->toBeString()->toBe('h0');
})->throws(InvalidArgumentException::class);

it('string hex low repeater two', function () {
    $stringHexLow = new HexLow('string', 2);
    expect($stringHexLow->encode())->toBeString()->toBe('h2');
});

it('string hex low repeater all', function () {
    $stringHexLow = new HexLow('string', '*');
    expect($stringHexLow->encode())->toBeString()->toBe('h*');
});
