<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $rows = [
        		['id' => 1,'name' => 'Admin'],
        		['id' => 2,'name' => 'User'],
        		
        	];

            Role::insert($rows);
    }
}
