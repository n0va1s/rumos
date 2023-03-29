<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create(
            [
                'name'=>'João Paulo Novais',
                'email'=>'jp.trabalho@gmail.com',
                'password'=> Hash::make('linux1'),
                'community_id' => Option::where('group', 'SEC')->first()->id,
                'role_id' => Option::where('group', 'RLE')->first()->id,
            ]
        );
    }
}
