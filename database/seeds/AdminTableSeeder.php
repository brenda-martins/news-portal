<?php

use Illuminate\Database\Seeder;
use App\Models\Administrator;


class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name' => 'Administrador',
            'email' => 'admin@email.com',
            'password' =>  bcrypt('123456'),
        ];


        Administrator::create($admin);
    }
}
