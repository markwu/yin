<?php

namespace Markwu\Yin;

class Yin {

    var $zhuyin_pinyin;
    var $pinyin_zhuyin;
    var $zhuyin_pinyin_tone;
    var $pinyin_zhuyin_tone;
    var $debug = false;

    public function __construct()
    {
        $this->zhuyin_pinyin = json_decode(file_get_contents(__DIR__ . '/../data/zhuyin_pinyin.json'), true);
        $this->pinyin_zhuyin = json_decode(file_get_contents(__DIR__ . '/../data/pinyin_zhuyin.json'), true);
        $this->zhuyin_pinyin_tone = json_decode(file_get_contents(__DIR__ . '/../data/zhuyin_pinyin_tone.json'), true);
        $this->pinyin_zhuyin_tone = json_decode(file_get_contents(__DIR__ . '/../data/pinyin_zhuyin_tone.json'), true);
    }

    public function toPinyin($zhuyin) {
        $tone = mb_substr($zhuyin, -1, 1);
        if(array_key_exists($tone, $this->zhuyin_pinyin_tone)) {
            $tone = $this->zhuyin_pinyin_tone[$tone];
            $chars = mb_substr($zhuyin, 0, mb_strlen($zhuyin) - 1);
        } else {
            $tone = 1;
            $chars = $zhuyin;
        }

        if (array_key_exists($chars, $this->zhuyin_pinyin)) {
            $pinyin = $this->zhuyin_pinyin[$chars] . $tone;
        } else {
            $pinyin = $zhuyin;
            if($this->debug)
                echo "[DEBUG] Zhuyin to Pinyin Error: {$zhuyin}\n";
        }

        return $pinyin;
    }

    public function toZhuyin($pinyin) {
        $tone = mb_substr($pinyin, -1, 1);
        if(array_key_exists($tone, $this->pinyin_zhuyin_tone)) {
            $tone = $this->pinyin_zhuyin_tone[$tone];
            $chars = mb_substr($pinyin, 0, mb_strlen($pinyin) - 1);
        } else {
            $tone = "";
            $chars = $pinyin;
        }

        if (array_key_exists($chars, $this->pinyin_zhuyin)) {
            $zhuyin = $this->pinyin_zhuyin[$chars] . $tone;
        } else {
            $zhuyin = $pinyin;
            if($this->debug)
                echo "[DEBUG] Pinyin to Zhuyin Error: {$pinyin}\n";
        }

        return $zhuyin;
    }
}
