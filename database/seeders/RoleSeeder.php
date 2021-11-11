<?php

namespace Database\Seeders;

use App\Models\Role;
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
        $data = [
            ["role"=>"Administrateur"],
            ["role"=>"Sous-admin"]
        ];

        DB::statement("set foreign_key_checks =0");
        DB::statement("TRUNCATE roles");

        foreach($data as $d){
            Role::create($d);
        }
    }
}
