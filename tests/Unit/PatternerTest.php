<?php

namespace Unit;

use Cxlblm\PhpPacker\Pattern\StringNulPadded;
use Cxlblm\PhpPacker\Pattern\Uint8;
use Cxlblm\PhpPacker\Patterns;

it('encode char', function () {
    $patterns = Patterns::make(
        [
            new StringNulPadded('abc', 10),
        ]
    );

    expect($patterns->encode())->toBeString()->toBe('a10');
});

it('encode many', function () {
    $patterns = Patterns::make(
        [
            new StringNulPadded('name', 10),
            new Uint8('age'),
        ]
    );

    expect($patterns->encode())->toBeString()->toBe('a10C1');
});

it('encode array', function () {
    $patterns = Patterns::make(
        [
            new StringNulPadded('name', 10),
            new Uint8('ages', 2),
        ]
    );

    expect($patterns->encode())->toBeString()->toBe('a10C2');
});

it('encode many format data', function () {
    $patterns = Patterns::make(
        [
            new StringNulPadded('name', 10),
            new Uint8('age'),
        ]
    );

    $r = $patterns->tidyParams(['name' => 'abc', 'age' => 20]);
    expect($r)->toBeArray()->toBe(['abc', 20]);
});

it('encode array many format data', function () {
    $patterns = Patterns::make(
        [
            new StringNulPadded('name', 10),
            new Uint8('ages'),
        ]
    );

    $r = $patterns->tidyParams(['name' => 'abc', 'ages' => [122, 20]]);
    expect($r)->toBeArray()->toBe(['abc', 122, 20]);
});

it('encode string auto', function () {
    $patterns = Patterns::make(
        [
            new StringNulPadded('s', '*'),
        ]
    );

    expect($patterns->encode())->toBeString()->toBe('a*');
    $r = $patterns->tidyParams(['s' => 'ssssssssssssssssssss']);
    expect($r)->toBeArray()->toBe(['ssssssssssssssssssss']);
});

it('decode char', function () {
    $patterns = Patterns::make(
        [
            new StringNulPadded('name', 10),
        ]
    );

    expect($patterns->decode())->toBeString()->toBe('a10name');
});

it('decode many', function () {
    $patterns = Patterns::make(
        [
            new StringNulPadded('name', 10),
            new Uint8('age'),
        ]
    );

    expect($patterns->decode())->toBeString()->toBe('a10name/C1age');
});

it('get names', function () {
    $patterns = Patterns::make(
        [
            new StringNulPadded('name', 10),
            new Uint8('age'),
        ]
    );

    expect($patterns->getNames())->toBeArray()->toBe(['name', 'age']);
});
