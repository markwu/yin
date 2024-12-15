<?php

namespace Markwu\Yin;

class Zi {
    public function __construct()
    {
    }

    public function isChineseOnly($string) {
        $pattern = '/^[\x{4E00}-\x{9FFF}\x{3400}-\x{4DBF}\x{20000}-\x{2A6DF}\x{2A700}-\x{2B73F}\x{2B740}-\x{2B81F}\x{2B820}-\x{2CEAF}\x{F900}-\x{FAFF}\x{2F800}-\x{2FA1F}]+$/u';

        return preg_match($pattern, $string) === 1;
    }

    public function isFirstNChinese($string, $n) {
        $pattern = '/^[\x{4E00}-\x{9FFF}\x{3400}-\x{4DBF}\x{20000}-\x{2A6DF}\x{2A700}-\x{2B73F}\x{2B740}-\x{2B81F}\x{2B820}-\x{2CEAF}\x{F900}-\x{FAFF}\x{2F800}-\x{2FA1F}]{' . $n . ',}/u';

        return preg_match($pattern, $string) === 1;
    }
}
