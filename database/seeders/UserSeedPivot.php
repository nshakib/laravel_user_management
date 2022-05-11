<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeedPivot extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            
            1 => [
                'roles' => [1],
            ],

        ];

        foreach ($roles as $id => $role) {
            $user = User::find($id);

            foreach ($role as $key => $ids) {
                $user->{$key}()->sync($ids);
            }
        }
    }
}

