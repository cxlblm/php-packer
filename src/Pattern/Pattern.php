<?php

namespace Cxlblm\PhpPacker\Pattern;

interface Pattern
{
    public function getIdentifier(): string;

    public function getName(): string;
}
