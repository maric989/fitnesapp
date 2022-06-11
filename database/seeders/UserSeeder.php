<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Enum\User\UserGenderEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    const ADMIN_COUNTRY = 'Estonia';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ee = Country::where('name', self::ADMIN_COUNTRY)->first();

        $admin = User::create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'gender' => UserGenderEnum::MALE,
            'email' => 'admin@myaura.com',
            'password' => Hash::make('password'),
            'country_id' => $ee->id
        ]);
        $admin->assignRole('admin');
    }
}
