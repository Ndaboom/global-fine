<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelSeeder extends Seeder
{
    const PATH = __DIR__ . '/dumps/models/dump.sql';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared(file_get_contents(self::PATH));

        $this->command->info('Models seeded!');
    }
}
