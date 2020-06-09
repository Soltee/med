<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 10)->create();
        factory(\App\User::class)->create([
            'name' => 'Erika',
            'email' => 'erika@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        factory(\App\User::class)->create([
            'name' => 'Like',
            'email' => 'like@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'patient' => true
        ]);
        factory(\App\Admin::class)->create([
            'name' => 'Kamal',
            'email' => 'kamal@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        
        factory(\App\Location::class, 20)->create();
        factory(\App\Category::class, 6)->create();
        factory(\App\Post::class, 20)->create();
        factory(\App\Product::class, 20)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
