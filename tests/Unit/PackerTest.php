<?php

use Cxlblm\PhpPacker\Packer;
use Cxlblm\PhpPacker\Pattern\Float_;
use Cxlblm\PhpPacker\Pattern\StringNulPadded;
use Cxlblm\PhpPacker\Pattern\StringSpacePadded;
use Cxlblm\PhpPacker\Pattern\Uint8;
use Cxlblm\PhpPacker\Patterns;

it('encode', function () {
    $patterns = Patterns::make([
        new StringNulPadded('name', 10),
        new Uint8('age'),
    ]);
    $packer = new Packer($patterns);
    $r = $packer->encode(['age' => 122, 'name' => 'abcdeg']);
    expect($r)->toBeString()->toBe("abcdeg\0\0\0\0z");
    expect(bin2hex($r))->toBe('616263646567000000007a');
});

it('encode integer', function () {
    $patterns = Patterns::make([
        new Uint8('c'),
    ]);
    $packer = Packer::make($patterns);
    expect($patterns->encode())->toBeString()->toBe('C1');
    expect(bin2hex($packer->encode(['c' => 42])))->toBeString()->toBe('2a');
});

it('encode string', function () {
    $patterns = Patterns::make([
        StringNulPadded::makeAuto('c'),
    ]);
    $packer = Packer::make($patterns);
    expect($patterns->encode())->toBeString()->toBe('a*');
    expect(bin2hex($packer->encode(['c' => 'Hello, world!'])))
        ->toBeString()
        ->toBe('48656c6c6f2c20776f726c6421');
});

it('encode multi values', function () {
    $patterns = Patterns::make([
        new Uint8('i'),
        new Float_('f'),
        StringSpacePadded::makeAuto('c'),
    ]);
    $packer = Packer::make($patterns);
    expect($patterns->encode())->toBeString()->toBe('C1f1A*');
    expect(bin2hex($packer->encode([
        'i' => 42,
        'f' => 3.14,
        'c' => 'Hello, world!',
    ])))
        ->toBeString()
        ->toBe('2ac3f5484048656c6c6f2c20776f726c6421');
});

it('packer decode', function () {
    $patterns = Patterns::make([
        new StringNulPadded('name', 10),
        new Uint8('age'),
    ]);
    $packer = new Packer($patterns);
    $r = "abcdeg\0\0\0\0z";
    $r = $packer->decode($r);
    expect($r)->toBeArray()->toBe([
        'name' => hex2bin('61626364656700000000'),
        'age' => 122,
    ]);
});

it('packerStringNullPaddedEncode', function () {
    $patterns = Patterns::make([
        new StringNulPadded('name', 10),
        new Uint8('ages', 5),
    ]);
    $packer = new Packer($patterns);
    $r = $packer->encode(['ages' => [122, 33, 44, 24, 65], 'name' => 'defse']);
    expect($r)->toBeString()->toBe("defse\0\0\0\0\0z!,\x18A");
    expect(bin2hex($r))->toBe('646566736500000000007a212c1841');
});

it('packerStringNulPaddedDecode', function () {
    $patterns = Patterns::make([
        new StringNulPadded('name', 10),
        new Uint8('ages', '*'),
    ]);
    $packer = new Packer($patterns);
    $r = "defse\0\0\0\0\0z!,\x18A";
    $r = $packer->decode($r);
    expect($r)->toBeArray()->toBe([
        'name' => hex2bin('64656673650000000000'),
        'ages' => [
            122,
            33,
            44,
            24,
            65,
        ],
    ]);
});

it('packerStringxxabde', function () {
    $patterns = Patterns::make([
        new StringNulPadded('name', 10),
        new Uint8('ages', 2),
    ]);
    $packer = new Packer($patterns);
    $r = "defse\0\0\0\0\0z!";
    $r = $packer->decode($r);
    expect($r)->toBe([
        'name' => hex2bin('64656673650000000000'),
        'ages' => [122, 33],
    ]);
});

it('packer age is array', function () {
    $patterns = Patterns::make([
        new Uint8('ages', 2),
        new StringNulPadded('names', '*'),
    ]);
    $packer = new Packer($patterns);
    $r = $packer->decode($packer->encode(['ages' => [1, 2], 'names' => 'abc']));

    expect($r)->toBe([
        'ages' => [1, 2],
        'names' => 'abc',
    ]);
});

it('packer has two age is array', function () {
    $patterns = Patterns::make([
        new Uint8('ages', 2),
        new Uint8('ages1', 1),
        new StringNulPadded('names', '*'),
    ]);
    $packer = new Packer($patterns);
    $r = $packer->decode($packer->encode(['ages1' => 23, 'ages' => [1, 2], 'names' => 'abc']));

    expect($r)->toBe([
        'ages' => [23, 2],
        'names' => 'abc',
    ]);
});
