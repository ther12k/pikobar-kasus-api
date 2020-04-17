<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        $user = User::create(
            [
                'name'     => 'Administrator',
                'email'    => 'admin@myapp.id',
                'password' => bcrypt('123456'),
                'status' => 1,
            ]
        );

        $user->assignRole('administrator');

        $user = User::create(
            [
                'name'     => 'Operator Dinas Kesehatan Provinsi',
                'email'    => 'dinkesprov@myapp.id',
                'password' => bcrypt('123456'),
                'province_code' => '32',
                'status' => 1,
            ]
        );

        $user->assignRole('dinkes-provinsi-operator');

        $user = User::create(
            [
                'name'     => 'Operator Dinas Kesehatan Kota Bandung',
                'email'    => 'dinkeskotabandung@myapp.id',
                'password' => bcrypt('123456'),
                'province_code' => '32',
                'city_code' => '32.73',
                'status' => 1,
            ]
        );

        $user->assignRole('dinkes-kabkota-operator');

        $user = User::create(
            [
                'name'     => 'Operator Dinas Kesehatan Kota Depok',
                'email'    => 'dinkeskotadepok@myapp.id',
                'password' => bcrypt('123456'),
                'province_code' => '32',
                'city_code' => '32.76',
                'status' => 1,
            ]
        );

        $user->assignRole('dinkes-kabkota-operator');

        $user = User::create(
            [
                'name'     => 'Operator Dinas Kesehatan Kota Bekasi',
                'email'    => 'dinkeskotabekasi@myapp.id',
                'password' => bcrypt('123456'),
                'province_code' => '32',
                'city_code' => '32.75',
                'status' => 1,
            ]
        );

        $user->assignRole('dinkes-kabkota-operator');
    }
}
