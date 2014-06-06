<?php

class SpeedsterMinify extends Minify
{
    static public $encodeReplace = array('/', '+');
    static public $decodeReplace = array('-', '_');

    /**
     * @param $str
     * @return string
     */
    static public function encodeMinURL($str)
    {
        return str_replace(self::$encodeReplace, self::$decodeReplace, base64_encode(gzdeflate($str, 9)));
    }

    /**
     * @param $str
     * @return string
     */
    static public function decodeMinURL($str)
    {
        if (strpos($str, '/') === 0) {
            $str = substr($str, 1);
        }
        return gzinflate(base64_decode(str_replace(self::$decodeReplace, self::$encodeReplace, $str)));
    }
}
