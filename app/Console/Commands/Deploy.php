<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Deploy extends Command
{
    protected $signature = 'deploy';

    public function handle()
    {
        $req = Http::get(
            'https://forge.laravel.com/servers/825549/sites/2413683/deploy/http?token=Ym78PQrK7iVQP2oopBSbViVldIClgSeniL2oH7cu'
        );

        return $request->successful() ? self::SUCCESS : self::FAILURE;
    }
}
