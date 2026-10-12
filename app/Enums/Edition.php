<?php

namespace App\Enums;

enum Edition: string
{
    case Morning = 'morning';
    case Evening = 'evening';

    public function label(): string
    {
        return match ($this) {
            self::Morning => '朝刊',
            self::Evening => '夕刊',
        };
    }
}
