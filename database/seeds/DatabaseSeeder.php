<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name'=>'Vũ Thị Tuyết Măng',
            'email'=>'mp753114@gmail.com',
            'gender'=>'nam',
            'token'=>'1',
            'password'=>bcrypt('1')
        ]);
    }
}
