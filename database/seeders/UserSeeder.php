<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Enum\User\UserGenderEnum;
use App\Models\Enum\User\UserRoleEnum;
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
            'email' => 'admin@myaura.io',
            'birthday' => '1986-01-01',
            'password' => Hash::make('password'),
            'country_id' => $ee->id
        ]);
        $admin->assignRole('admin');

        $admin = User::create([
            'first_name' => 'Sven',
            'last_name' => 'Playbeech',
            'gender' => UserGenderEnum::MALE,
            'email' => 'sven@playbeech.com',
            'birthday' => '1986-01-01',
            'password' => Hash::make('secret'),
            'country_id' => $ee->id
        ]);
        $admin->assignRole('admin');

        $users = User::factory()->count(20)->create();
        foreach ($users as $user) {
            $user->assignRole(UserRoleEnum::GUEST);
        }

        $users = User::factory()->count(50)->create();
        foreach ($users as $user) {
            $user->assignRole(UserRoleEnum::PREMIUM);
        }

        $users = User::factory()->count(20)->create();
        foreach ($users as $user) {
            $user->assignRole(UserRoleEnum::TRIAL);
        }
    }
}
