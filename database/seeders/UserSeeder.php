<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        $admin = new User();
        $admin->last_name = 'John Licar';
        $admin->middle_name = 'Quayzon';
        $admin->first_name = 'Orion';
        $admin->email = 'licar242@gmail.com';
        $admin->contact_number = '09303203009';
        $admin->password = Hash::make('password');
        $admin->save();
        $admin->attachRole('Admin');

        $Vice_President = new User();
        $Vice_President->last_name = 'Tacoyo';
        $Vice_President->middle_name = 'Gabisay';
        $Vice_President->first_name = 'Kyle';
        $Vice_President->email = 'kyle@gmail.com';
        $Vice_President->contact_number = '09655998518';
        $Vice_President->password = Hash::make('password');
        $Vice_President->save();
        $Vice_President->attachRole('Vice_President');


        $Vice_President = new User();
        $Vice_President->last_name = 'Odtuhan';
        $Vice_President->middle_name = 'Gwaps';
        $Vice_President->first_name = 'Patrick';
        $Vice_President->email = 'patrick@gmail.com';
        $Vice_President->contact_number = '09655998519';
        $Vice_President->password = Hash::make('password');
        $Vice_President->save();
        $Vice_President->attachRole('Department_Head');

        $Vice_President = new User();
        $Vice_President->last_name = 'Vergel';
        $Vice_President->middle_name = 'Martin';
        $Vice_President->first_name = 'Edd';
        $Vice_President->email = 'edd@gmail.com';
        $Vice_President->contact_number = '09655998514';
        $Vice_President->password = Hash::make('password');
        $Vice_President->save();
        $Vice_President->attachRole('Department_Head');
    }
}
