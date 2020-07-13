<?php

use Illuminate\Database\Seeder;

class UserCollectionSeeder extends Seeder
{
    public function run()
    {
        $users = factory(App\User::class, 10)
            ->create()
            ->each( function ($user) {
                $user->posts()->createMany(
                    factory(App\Post::class, 5)->make()->toArray()
                );
            });

        DB::table('users')->insert([
            'name' => "Javier Flores",
            'email' => "javier.flores@tecsup.edu.pe",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
    }
}
