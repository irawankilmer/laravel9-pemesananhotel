<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Facility;
use App\Models\Type;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Facility::factory()->count(15)->create();
        Type::factory()->count(15)->create();

        Role::create(['name' => 'Administrator']);
        Role::create(['name' => 'Resepsionis']);
        Role::create(['name' => 'Tamu']);

        $user = User::create([
            'username'      => 'adminpertama',
            'email'         => 'adminpertama@gmail.com',
            'password'      => Hash::make('adminpertama')
        ]);

        $user->admin()->create([
            'fullName'      => 'Admin Pertama',
            'gender'        => 1,
            'address'       => 'Samarang',
            'phone'         => '082',
            'avatar'        => 'default.png'
        ]);

        $user->assignRole('Administrator');
    }
}
