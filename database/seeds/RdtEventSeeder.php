<?php

use App\RdtEvent;
use Illuminate\Database\Seeder;

class RdtEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(RdtEvent::class, 20)->create();
    }
}
