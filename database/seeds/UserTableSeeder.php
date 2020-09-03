<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([ 
            [   'name' => 'Nathan', 
                'email' => Str::random(12).'@email.com', 
                'password' => bcrypt('yourPassword'), 
                'created_at' => new DateTime, 
                'updated_at' => new DateTime, ], 
            [   'name' => 'David', 
                'email' => Str::random(12).'@email.com', 
                'password' => bcrypt('yourPassword'), 
                'created_at' => new DateTime, 
                'updated_at' => new DateTime, ], 
            [   'name' => 'Lisa', 
                'email' => Str::random(12).'@email.com', 
                'password' => bcrypt('yourPassword'), 
                'created_at' => new DateTime, 
                'updated_at' => new DateTime,], 
        ]);
    }
}
