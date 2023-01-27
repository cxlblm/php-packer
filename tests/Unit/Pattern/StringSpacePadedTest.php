<?php

declare(strict_types=1);

use Cxlblm\PhpPacker\Pattern\StringSpacePadded;

/** @phpstan-return \Pest\PendingCalls\TestCall */
it('string space padded repeater zero', function () {
    $stringSpacePadded = new StringSpacePadded('string', 0);
    expect($stringSpacePadded->encode())->toBeString()->toBe('A0');
})->throws(InvalidArgumentException::class);

it('string space padded repeater many', function () {
    $stringSpacePadded = new StringSpacePadded('string', 5);
    expect($stringSpacePadded->encode())->toBeString()->toBe('A5');
});

it('string space padded repeater auto', function () {
    $stringSpacePadded = new StringSpacePadded('string', '*');
    expect($stringSpacePadded->encode())->toBeString()->toBe('A*');
});
