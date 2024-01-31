<?php

namespace helpers;

class GenerateRandomDate
{
    public static function generateRandomDateTime(): string
    {
        $year = mt_rand(2020, 2023);
        $month = str_pad(mt_rand(1, 12), 2, '0', STR_PAD_LEFT);
        $day = str_pad(mt_rand(1, 28), 2, '0', STR_PAD_LEFT);
        $hour = str_pad(mt_rand(0, 23), 2, '0', STR_PAD_LEFT);
        $minute = str_pad(mt_rand(0, 59), 2, '0', STR_PAD_LEFT);
        $second = str_pad(mt_rand(0, 59), 2, '0', STR_PAD_LEFT);

        return "{$year}-{$month}-{$day} {$hour}:{$minute}:{$second}";
    }
}
