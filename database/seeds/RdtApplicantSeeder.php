<?php

use App\RdtApplicant;
use Illuminate\Database\Seeder;

class RdtApplicantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(RdtApplicant::class, 50)->create();
    }
}
