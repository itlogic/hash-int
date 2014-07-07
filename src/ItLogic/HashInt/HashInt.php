<?php namespace ItLogic\HashInt;

/**
 * Author https://github.com/vitalko
 * Class HashInt
 * @package ItLogic\HashInt
 */
class HashInt {

    const ADDEND = 699930007;
    const MOD = 99990001;
    const MULTIPLIER = 13;

    /**
     * Encode number to hash
     *
     * @param integer $n Number
     * @return string Hash
     * @throws InvalidArgumentException
     */
    public function encode($n)
    {
        if ($n <= 0 || $n >= HashInt::MOD) {
            throw new InvalidArgumentException("Argument is out of range");
        }

        $n = $this->modInverse($n, HashInt::MOD);
        $n *= HashInt::MULTIPLIER;
        $n += HashInt::ADDEND;

        return strtolower(base_convert($n, 10, 36));
    }

    /**
     * Decode hash to number
     *
     * @param $hash
     * @return int|string
     */
    public function decode($hash)
    {
        $n = base_convert(strtolower($hash), 36, 10);
        $n -= HashInt::ADDEND;
        $n /= HashInt::MULTIPLIER;

        return $this->modInverse($n, HashInt::MOD);
    }

    /**
     * Mod inverse
     * @link http://www.php.net/manual/ru/function.bcdiv.php
     *
     * @param number $a Number
     * @param number $b MOD
     * @return int|string
     */
    protected function modInverse($a, $b)
    {
        $n = $b;
        $x = 0;
        $lx = 1;
        $y = 1;
        $ly = 0;
        while ($b) {
            $t = $b;
            $q = bcdiv($a, $b, 0);
            $b = bcmod($a, $b);
            $a = $t;
            $t = $x;
            $x = bcsub($lx, bcmod(bcmul($q, $x), $n));
            $lx = $t;
            $t = $y;
            $y = bcsub($ly, bcmod(bcmul($q, $y), $n));
            $ly = $t;
        }
        if (bccomp($lx, 0) == -1)
            $lx = bcadd($lx, $n);
        return $lx;
    }

}