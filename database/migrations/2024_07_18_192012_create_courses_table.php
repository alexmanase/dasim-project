<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->string('client_name');
            $table->date('loading_date');
            $table->string('loading_country'); // todo: use enum
            $table->string('loading_location'); // todo: use enum
            $table->string('loading_street'); // todo: use enum
            $table->string('loading_number'); // todo: use enum
            $table->string('loading_extra_details')->nullable(); // todo: use enum
            $table->string('loading_additional_charging_points')->nullable(); // todo: use enum
            $table->date('maximum_date_for_unload')->nullable();
            $table->string('unloading_country'); // todo: use enum
            $table->string('unloading_location'); // todo: use enum
            $table->string('unloading_street'); // todo: use enum
            $table->string('unloading_number'); // todo: use enum
            $table->string('unloading_extra_details')->nullable(); // todo: use enum
            $table->string('unloading_additional_charging_points')->nullable(); // todo: use enum
            $table->json('type_of_cargo');
            $table->unsignedSmallInteger('tonnage');
            $table->unsignedSmallInteger('volume');
            $table->unsignedTinyInteger('length_of_storage')->nullable();
            $table->unsignedTinyInteger('truck_type');
            $table->unsignedBigInteger('value');

            $table->timestamps();
        });
    }
};
