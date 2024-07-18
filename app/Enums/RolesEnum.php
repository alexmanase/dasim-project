<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum RolesEnum: int implements HasLabel
{
    case SUPER_ADMIN = 1;
    case ADMIN = 2;
    case TRANSPORTER = 3;

    public function getLabel(): ?string
    {
        return match($this) {
            self::SUPER_ADMIN => 'Super Admin',
            self::ADMIN => 'Admin',
            self::TRANSPORTER => 'Transporter'
        };
    }
}
