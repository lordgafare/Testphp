<?php namespace App\Libraries;

class DocumentNumberGenerator
{
    public function generate($prefix, $suffix, $digits, $number)
    {
        $formattedNumber = str_pad($number, $digits, '0', STR_PAD_LEFT);
        return $prefix . $formattedNumber . $suffix;
    }
}
