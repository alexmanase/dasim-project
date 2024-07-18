<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum TruckTypeEnum: int implements HasLabel
{
    case PRELATA = 1;
    case FRIGORIFIC = 2;
    case ALTE_VALORI = 3;

    public function getLabel(): ?string
    {
        return match($this) {
            self::PRELATA => 'Prelata',
            self::FRIGORIFIC => 'Frigorific',
            self::ALTE_VALORI => 'Alte valori',
        };
    }
}
