<?php

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
        $filepath = base_path('database/seeds/hospitals.csv');
        if (($handle = fopen($filepath, "r")) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, ",", '"')) !== FALSE) {
                DB::table('hospitals')->insert([
                    'id'            => $row[0],
                    'kabkota_id'    => (!empty($row[1])) ? $row[1] : null,
                    'kec_id'        => (!empty($row[2])) ? $row[2] : null,
                    'kel_id'        => (!empty($row[3])) ? $row[3] : null,
                    'name'          => (!empty($row[4])) ? $row[4] : '',
                    'description'   => (!empty($row[5])) ? $row[5] : '',
                    'address'       => (!empty($row[6])) ? $row[6] : '',
                    'phone_numbers' => (!empty($row[7])) ? $row[7] : '',
                ]);
            }
            fclose($handle);
        }
    }
}
