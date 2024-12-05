<?php

namespace Markwu\Yin;

class Zhi {
    public function __construct()
    {
    }

    public function isChineseOnly($string) {
        if (!mb_check_encoding($string, 'UTF-8')) {
            return false;
        }

        $pattern = '/^[\x{4E00}-\x{9FFF}\x{3400}-\x{4DBF}\x{20000}-\x{2A6DF}\x{2A700}-\x{2B73F}\x{2B740}-\x{2B81F}\x{2B820}-\x{2CEAF}\x{F900}-\x{FAFF}\x{2F800}-\x{2FA1F}]+$/u';

        return preg_match($pattern, $string) === 1;
    }

    public function isFirstNChinese($string, $n) {
        if (!mb_check_encoding($string, 'UTF-8')) {
            return false;
        }

        $substring = mb_substr($string, 0, $n, 'UTF-8');

        return $this->isChineseOnly($substring);
    }
}
