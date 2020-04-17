<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = __DIR__ . '/sql/hospitals.sql';
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
