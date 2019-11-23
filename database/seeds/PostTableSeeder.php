<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create()->each(function (\App\User $user) {
            $user->posts()->save(factory(App\Post::class)->make([
                'user_id' => $user->id,
            ]));
        });
    }
}
