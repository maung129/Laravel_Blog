<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Blog;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Blog::truncate();
        Category::truncate();

        $roles = collect(['admin','customer']);
        $roles->each(function($role){
            Role::factory()->create([
                'keyword'=>$role
            ]);
        });


        $frontend = Category::factory()->create(['name'=>'frontend']);
        $backend = Category::factory()->create(['name'=>'backend']);

        Blog::factory(2)->create(['category_id'=>$frontend->id]);
        Blog::factory(2)->create(['category_id'=>$backend->id]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
