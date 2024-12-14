<?php

namespace Markwu\Yin;

class Zi {
    public function __construct()
    {
    }

    public function isChineseOnly($string) {
        $pattern = '/^[\x{4E00}-\x{9FFF}\x{3400}-\x{4DBF}]+$/u';

        return preg_match($pattern, $string) === 1;
    }

    public function isFirstNChinese($string, $n) {
        $pattern = '/^[\x{4E00}-\x{9FFF}\x{3400}-\x{4DBF}]{' . $n . ',}/u';

        return preg_match($pattern, $string) === 1;
    }
}
