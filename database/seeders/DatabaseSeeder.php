<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::table('posts')->truncate();


        User::factory(25)->create()->each(function($user){
            $user->posts()->save(Post::factory()->make());
        });

        // \App\Models\User::factory(10)->create()->each(function($user){
        //     $user->posts()->save(factory('App\Models\Post')->make());
        // });
        // \App\Models\Post::factory(10)->create();

    }
}
