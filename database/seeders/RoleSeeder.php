<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    const ROLES = [
        'admin', 'premium', 'trial', 'guest'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::ROLES as $role) {
            Role::create([
                'name' => $role
            ]);
        }
    }
}
