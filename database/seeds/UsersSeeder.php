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
            ]
        );

        $user->setStatus('active');
        $user->assignRole('administrator');

        $user = User::create(
            [
                'name'     => 'Operator Dinas Kesehatan Provinsi',
                'email'    => 'dinkesprov@myapp.id',
                'password' => bcrypt('123456'),
                'province_code' => '32',
            ]
        );

        $user->setStatus('active');
        $user->assignRole('dinkes-provinsi-operator');

        $user = User::create(
            [
                'name'     => 'Operator Dinas Kesehatan Kota Bandung',
                'email'    => 'dinkeskotabandung@myapp.id',
                'password' => bcrypt('123456'),
                'province_code' => '32',
                'city_code' => '32.73',
            ]
        );

        $user->setStatus('active');
        $user->assignRole('dinkes-kabkota-operator');

        $user = User::create(
            [
                'name'     => 'Operator Dinas Kesehatan Kota Depok',
                'email'    => 'dinkeskotadepok@myapp.id',
                'password' => bcrypt('123456'),
                'province_code' => '32',
                'city_code' => '32.76',
            ]
        );

        $user->setStatus('active');
        $user->assignRole('dinkes-kabkota-operator');

        $user = User::create(
            [
                'name'     => 'Operator Dinas Kesehatan Kota Bekasi',
                'email'    => 'dinkeskotabekasi@myapp.id',
                'password' => bcrypt('123456'),
                'province_code' => '32',
                'city_code' => '32.75',
            ]
        );

        $user->setStatus('active');
        $user->assignRole('dinkes-kabkota-operator');
    }
}
