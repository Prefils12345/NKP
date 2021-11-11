<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("set foreign_key_checks =0");
        DB::statement("TRUNCATE users");
        $user = new User();
        $user->prenom = "Prefils";
        $user->nom = "Nguengoro";
        $user->sexe = "M";
        $user->phone = "065239199";
        $user->roles_id = 1;
        $user->email = "nguengorop@gmail.com";
        $user->password = Hash::make('123456');
        $user->save();
    }
}
