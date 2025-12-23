<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    public function run(): void
    {
        User::create([
            'first_name' => 'Daleel',
            'last_name' => 'Admin',
            'profileImage' => 'https://www.pngall.com/wp-content/uploads/5/Admin-Profile-PNG-Image.png',
            'personIdImage' => 'https://www.pngall.com/wp-content/uploads/5/Admin-Profile-PNG-Image.png',
            'birthdate' => '1990-01-01',
            'verification_state' => 'verified',
            'phone' => '0933995477',
            'email' => 'daleel@admin.com',
            'password' => Hash::make('Daleel2025@DaleelAdmin'),
        ]);
        User::create([
            'first_name' => 'Mohammad',
            'last_name' => 'Al Homsi',
            'profileImage' => '/storage/app/public/mohammadAlHomsi.jpg',
            'personIdImage' => 'https://www.pngall.com/wp-content/uploads/5/Admin-Profile-PNG-Image.png',
            'birthdate' => '2005-06-05',
            'verification_state' => 'verified',
            'phone' => '0935038135',
            'email' => 'mmmmohammadalhomsi@admin.com',
            'password' => Hash::make('password'),
            'location' => [
                'city' => 'Damascus',
            ]
        ]);
        User::create([
            'first_name' => 'Mohammad',
            'last_name' => 'Haboosh',
            'profileImage' => '/storage/app/public/mohammadHaboosh.jpg',
            'personIdImage' => 'https://www.pngall.com/wp-content/uploads/5/Admin-Profile-PNG-Image.png',
            'birthdate' => '2004-07-08',
            'verification_state' => 'verified',
            'phone' => '0943885435',
            'email' => 'mohammadhaboosh@admin.com',
            'password' => Hash::make('password'),
            'location' => [
                'city' => 'Damascus',
            ]
        ]);
        User::create([
            'first_name' => 'Yazan',
            'last_name' => 'Mahfooz',
            'profileImage' => '/storage/app/public/yazanMahfooz.jpg',
            'personIdImage' => 'https://www.pngall.com/wp-content/uploads/5/Admin-Profile-PNG-Image.png',
            'birthdate' => '2005-12-26',
            'verification_state' => 'verified',
            'phone' => '0933803688',
            'email' => 'yazanmahfooz8@admin.com',
            'password' => Hash::make('password'),
            'location' => [
                'city' => 'Damascus'
            ]
        ]);
        User::create([
            'first_name' => 'Loulia',
            'last_name' => 'Al Shaar',
            'profileImage' => '/storage/app/public/louliaAlShaar.jpg',
            'personIdImage' => 'https://www.pngall.com/wp-content/uploads/5/Admin-Profile-PNG-Image.png',
            'birthdate' => '2005-1-1',
            'verification_state' => 'verified',
            'phone' => '0991744605',
            'email' => 'louliaalshaar@admin.com',
            'password' => Hash::make('password'),
            'location' => [
                'city' => 'Damascus'
            ]
        ]);
        User::create([
            'first_name' => 'Zain',
            'last_name' => 'Nhlawy',
            'profileImage' => '/storage/app/public/zainNhlawy.jpg',
            'personIdImage' => 'https://www.pngall.com/wp-content/uploads/5/Admin-Profile-PNG-Image.png',
            'birthdate' => '2005-1-1',
            'verification_state' => 'verified',
            'phone' => '0954179314',
            'email' => 'zainnhlawy@admin.com',
            'password' => Hash::make('password'),
            'location' => [
                'city' => 'Damascus'
            ]
        ]);
        
        Department::create( [
            'headDescription' => 'Homsi Home',
            'user_id' => 2,
            'area' => 50,
            'bedrooms' => 1,
            'bathrooms' => 1,
            'rentFee' => 500,
            'status' => 'furnished',
            'verification_state' => 'verified',
            'floor' => 1,
            'location' => [
                'city' => 'Damascus'
            ]
        ]);
        Department::create( [
            'headDescription' => 'Habbosh Home',
            'user_id' => 3,
            'area' => 50,
            'bedrooms' => 1,
            'bathrooms' => 1,
            'rentFee' => 500,
            'status' => 'furnished',
            'verification_state' => 'verified',
            'floor' => 1,
            'location' => [
                'city' => 'Damascus'
            ]
        ]);
        Department::create( [
            'headDescription' => 'Yazan Home',
            'user_id' => 4,
            'area' => 50,
            'bedrooms' => 1,
            'bathrooms' => 1,
            'rentFee' => 500,
            'status' => 'furnished',
            'verification_state' => 'verified',
            'floor' => 1,
            'location' => [
                'city' => 'Damascus'
            ]
        ]);
        Department::create( [
            'headDescription' => 'Loulia Home',
            'user_id' => 5,
            'area' => 50,
            'bedrooms' => 1,
            'bathrooms' => 1,
            'rentFee' => 500,
            'status' => 'furnished',
            'verification_state' => 'verified',
            'floor' => 1,
            'location' => [
                'city' => 'Damascus'
            ]
        ]);
        Department::create( [
            'headDescription' => 'Zain Home',
            'user_id' => 6,
            'area' => 50,
            'bedrooms' => 1,
            'bathrooms' => 1,
            'rentFee' => 500,
            'status' => 'furnished',
            'verification_state' => 'verified',
            'floor' => 1,
            'location' => [
                'city' => 'Damascus'
            ]
        ]);
        User::factory(100)->create();
        $this->call(DepartmentSeeder::class);
        for ($i = 0; $i < 500; $i++) {
            User::inRandomOrder()->first()?->favorites()->toggle(Department::inRandomOrder()->first()?->id);
        }
        $this->call(ReviewSeeder::class);
        $this->call(NotificationSeeder::class);
        $this->call(RentSeeder::class);
        $this->call(CommentSeeder::class);
    }
}
