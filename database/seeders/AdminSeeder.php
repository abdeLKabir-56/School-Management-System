<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'nom'=>"admin",
                "isAdmin"=>true,
                'email'=>"admin@gmail.com",
                'password'=>Hash::make("admin")

            ]
        );
        User::create(
            [
                'nom'=>"ahmed",
                'prenom'=>"elourdighi",
                "isAdmin"=>false,
                'email'=>"ahmedElourdighi@gmail.com",
                'DateNaissance'=>"2023-05-05 18:56:42",
                'telephone'=>"0607200300",
                'filiere'=>"genie informatique",
                'password'=>Hash::make("1234@@@@####")

            ]
           
        );
        User::create(
            [
                'nom'=>"mohamed",
                'prenom'=>"samiri",
                "isAdmin"=>false,
                'email'=>"mohamed00@gmail.com",
                'DateNaissance'=>"2023-05-05 18:56:42",
                'telephone'=>"5689065444",
                'filiere'=>"genie electrique",
                'password'=>Hash::make("mohamed123")

            ]
            );
            User::create(
                [
                    'nom'=>"rachid",
                    'prenom'=>"hshadi",
                    "isAdmin"=>false,
                    'email'=>"hshadi09mk@gmail.com",
                    'DateNaissance'=>"2003-05-05 18:56:42",
                    'telephone'=>"0680065444",
                    'filiere'=>"genie informatique",
                    'password'=>Hash::make("mohamed123")
    
                ]
                );
                User::create(
                    [
                        'nom'=>"khalid",
                        'prenom'=>"rachidi",
                        "isAdmin"=>false,
                        'email'=>"khalid00@gmail.com",
                        'DateNaissance'=>"2009-05-05 18:56:42",
                        'telephone'=>"0680060444",
                        'filiere'=>"genie informatique",
                        'password'=>Hash::make("mohamkhed123")
        
                    ]
                    );
            
            
    }
}
