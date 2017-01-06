<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
    	DB::table('users')->insert([
    			'name' => 'admin',
    			'email' => '1032137120@qq.com',
    			'password' => Crypt::encrypt('123456'),
    	]);
    }
}
