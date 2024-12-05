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
        $pattern = '/^[\x{4e00}-\x{9fff}\x{3400}-\x{4dbf}\x{20000}-\x{2a6df}\x{2a700}-\x{2b73f}\x{2b740}-\x{2b81f}\x{2b820}-\x{2ceaf}\x{f900}-\x{faff}\x{2f800}-\x{2fa1f}]{' . $n . ',}/u';

        return preg_match($pattern, $string) === 1;
    }
}
