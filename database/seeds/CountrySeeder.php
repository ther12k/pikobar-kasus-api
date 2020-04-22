<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = __DIR__ . '/sql/countries.sql';
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
