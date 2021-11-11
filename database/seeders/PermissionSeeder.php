<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            //Gestion des rôles
            ["nom"=>"role.index","display_name"=>"Afficher les rôles","module"=>"Gestion des rôles"],
            ["nom"=>"role.create","display_name"=>"Ajouter un rôle","module"=>"Gestion des rôles"],
            ["nom"=>"role.edit","display_name"=>"Modifier un rôle","module"=>"Gestion des rôles"],
            ["nom"=>"role.destroy","display_name"=>"Supprimer un rôle","module"=>"Gestion des rôles"],
            ["nom"=>"role.show","display_name"=>"Voir un rôle","module"=>"Gestion des rôles"],

            //Gestion des utilisateurs
            ["nom"=>"user.index","display_name"=>"Afficher les utilisateurs","module"=>"Gestion des utilisateurs"],
            ["nom"=>"user.create","display_name"=>"Ajouter un utilisateur","module"=>"Gestion des utilisateurs"],
            ["nom"=>"user.edit","display_name"=>"Modifier un utilisateur","module"=>"Gestion des utilisateurs"],
            ["nom"=>"user.destroy","display_name"=>"Supprimer un utilisateur","module"=>"Gestion des utilisateurs"],
            ["nom"=>"user.show","display_name"=>"Voir un utilisateur","module"=>"Gestion des utilisateurs"],
            ["nom"=>"user.changestate","display_name"=>"Activer ou desactiver un utilisateur","module"=>"Gestion des utilisateurs"],
           
            //Gestion des identifications
            ["nom"=>"identification.index","display_name"=>"Afficher les utilisateurs","module"=>"Gestion l'identifcation"],
            ["nom"=>"identification.create","display_name"=>"Ajouter un utilisateur","module"=>"Gestion l'identifcation"],
            ["nom"=>"identification.edit","display_name"=>"Modifier un utilisateur","module"=>"Gestion l'identifcation"],
            ["nom"=>"identification.destroy","display_name"=>"Supprimer un utilisateur","module"=>"Gestion l'identifcation"],
            ["nom"=>"identification.show","display_name"=>"Voir un utilisateur","module"=>"Gestion l'identifcation"],
            ["nom"=>"identification.changestate","display_name"=>"Activer ou desactiver un utilisateur","module"=>"Gestion l'identifcation"],
    
            
        ];

        DB::statement("set foreign_key_checks =0");
        DB::statement("TRUNCATE permissions");
        foreach($data as $d){
            Permission::create($d);
        }

        $role = Role::find(1);
        $permissions = Permission::all();
        $role->permissions()->sync($permissions);
    }
}
