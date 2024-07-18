<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum CargoTypeEnum: int implements HasLabel
{
    case MARFURI_GENERALE = 1;
    case MARFURI_ALIMENTARE = 2;
    case FRIGORIFIC_CU_CONGELARE = 3;
    case FRIGORIFIC_CU_REFRIGERARE = 4;
    case PERICULOASE = 5;
    case AGABARITICE = 6;
    case ANIMALE_VII = 7;
    case LEMN_SI_CHERESTEA = 8;
    case ALTE_TIPURI_DE_MARFA = 9;

    public function getLabel(): ?string
    {
        return match($this) {
            self::MARFURI_GENERALE => 'Mărfuri generale',
            self::MARFURI_ALIMENTARE => 'Mărfuri alimentare',
            self::FRIGORIFIC_CU_CONGELARE => 'Transport frigorific cu congelare',
            self::FRIGORIFIC_CU_REFRIGERARE => 'Transport frigorific cu refrigerare',
            self::PERICULOASE => 'Mărfuri periculoase',
            self::AGABARITICE => 'Mărfuri agabaritice',
            self::ANIMALE_VII => 'Animale vii',
            self::LEMN_SI_CHERESTEA => 'Lemn și cherestea',
            self::ALTE_TIPURI_DE_MARFA => 'Alte tipuri de marfa',
        };
    }
}
