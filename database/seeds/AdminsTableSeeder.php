<?php

//File created with php artisan make:seed AdminsTableSeeder

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Admin::create([
            'name'      =>  'Admin',
            'email'     =>  'admin@admin.com',
            'password'  =>  bcrypt('darkpony'),
        ]);
    }
}
