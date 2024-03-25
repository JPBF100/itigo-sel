<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new \App\Models\User([
            'name' => 'JPBF',
            'email' => 'joao@exemplo.com',
            'password' => Hash::make('123senha')
        ],);

        $user->save();

        $user2 = new \App\Models\User([
            'name' => 'JPBF10',
            'email' => 'pedro@exemplo.com',
            'password' => Hash::make('senha123')
        ],);

        $user2->save();
    }
}
