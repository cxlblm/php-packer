<?php

namespace Cxlblm\PhpPacker\Pattern;

abstract class Number extends Base
{
    public function decodeMatch(string $key): bool
    {
        $name = $this->getName();
        $len = $this->getNameLen();

        if ($this->getRepeater() == 1) {
            return $key == $name;
        }

        return $len < strlen($key) && str_starts_with($key, $name);
    }

    public function isMulti(): bool
    {
        $repeater = $this->getRepeater();
        if ($repeater > 1 || $repeater == '*') {
            return true;
        }

        return false;
    }
}
