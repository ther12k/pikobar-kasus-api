<?php

use Illuminate\Database\Seeder;

class OccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ 1, 'Belum Bekerja', 0 ],
            [ 2, 'Ibu Rumah Tangga', 1 ],
            [ 3, 'Pelajar/Mahasiswa', 1 ],
            [ 4, 'Pegawai Negeri', 1 ],
            [ 5, 'Pegawai Swasta', 1 ],
            [ 6, 'Lainnya', 99 ],
            [ 7, 'TNI/Polisi', 1 ],
            [ 8, 'Wiraswasta', 1 ],
            [ 9, 'Petani', 1 ],
            [ 10, 'Peternak', 1 ],
            [ 11, 'Nelayan', 1 ],
            [ 12, 'Tukang Bangunan', 1 ],
            [ 13, 'Pengobatan', 1 ],
            [ 14, 'Hukum', 1 ],
            [ 15, 'Tokoh Agama', 1 ],
            [ 16, 'Pemerintahan', 1 ],
            [ 17, 'Pendidikan', 1 ],
            [ 18, 'Kesehatan', 1 ],
            [ 19, 'Keuangan', 1 ],
            [ 20, 'Mesin', 1 ],
        ];

        foreach ($data as $row) {
            DB::table('occupations')->insert([
                'id' => $row[0],
                'title' => $row[1],
                'sequence' => $row[2],
            ]);
        }
    }
}
