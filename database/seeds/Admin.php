<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "rifqi";
        $user->email = "rifqi@gmail.com";
        $user->password = Hash::make('12345678');
        $user->save();
    }
}
