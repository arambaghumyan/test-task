<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $admin = [
            	'id' => 1,
            	'role_id' => 1,
            	'name' => "Admin",
            	'email' => 'admin@admin.com',
            	'password' => Hash::make('admin2022'),
            ];        		

            User::insert($admin);
    }
}
