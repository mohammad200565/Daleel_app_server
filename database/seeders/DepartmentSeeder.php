<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::inRandomOrder()->take(User::count() * 0.3)->get();
        foreach ($users as $user) {
            if ( $user->id == 1 ) continue;
            Department::factory()->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
