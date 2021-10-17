<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Super Administrator','Administrator','Customer'];
        foreach ($roles as $role){
            DB::table('roles')->insert([
                'name' => $role
            ]);
        }
    }
}
