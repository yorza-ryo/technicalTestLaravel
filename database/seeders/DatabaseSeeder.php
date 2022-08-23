<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(10)->create();
        \App\Models\Product::factory(10)->create();
        \App\Models\UserDetail::factory(10)->create();
        \App\Models\UserSetting::factory(10)->create();
        \App\Models\UserToken::factory(10)->create();
        \App\Models\RolePermission::factory(4)->create();
        \App\Models\ProductDetail::factory(10)->create();
        \App\Models\ProductThumbnail::factory(10)->create();

        $roles = \App\Models\RolePermission::all();
        \App\Models\User::all()->each(function ($user) use ($roles) {
            $user->rolePermissions()->attach(
                $roles->random(rand(1, 1))->pluck('id')->toArray()
            );
        });

        $product = \App\Models\Product::all();
        \App\Models\User::all()->each(function ($user) use ($product) {
            $user->products()->attach(
                $product->random(rand(1, 1))->pluck('id')->toArray()
            );
        });
    }
}
