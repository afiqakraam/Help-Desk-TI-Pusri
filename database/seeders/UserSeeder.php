<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $role = Role::findOrCreate('Client'); // Find or create the role 'Client'
        $permissions = Permission::pluck('name'); // Assuming you have permissions set up
        $role->syncPermissions($permissions);

        for ($i = 0; $i < 5; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'no_telp' => $faker->phoneNumber,
                'password' => Hash::make('12345678'),
            ]);
            
            $user->assignRole($role); // Assign the 'Client' role to the user
        }
    }
}
