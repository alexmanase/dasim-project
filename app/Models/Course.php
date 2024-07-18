<?php

namespace App\Models;

use App\Enums\CargoTypeEnum;
use App\Enums\TruckTypeEnum;
use Illuminate\Database\Eloquent\Casts\AsEnumArrayObject;
use Illuminate\Database\Eloquent\Casts\AsEnumCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function casts()
    {
        return [
            'loading_date' => 'date',
            'loading_location' => 'array',
            'maximum_date_for_unload' => 'date',
            'unloading_location' => 'array',
            'type_of_cargo' => AsEnumCollection::of(CargoTypeEnum::class),
            'truck_type' => TruckTypeEnum::class
        ];
    }
}
