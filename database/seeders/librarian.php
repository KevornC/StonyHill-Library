<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class librarian extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user=
        [
            [
                'name'=>'Solomon Jones',
                'email'=>'solomonjones@gmail.com',
                'password'=>Hash::make('password')
            ]
        ];
        
        foreach ($user as $key => $value) {
            # code...
            User::create($value);
        }
    }
}
