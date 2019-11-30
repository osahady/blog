<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\Role;
use App\User;
use App\Photo;
use App\Comment;
use App\Category;
use App\CommentReply;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'role_id' => $faker->numberBetween(1, 3),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Post::class, function (Faker $faker) {
    return [
        'category_id' => $faker->numberbetween(1,4),
        'photo_id' => 1,
        'title' => $faker->sentence(7,11),
        'body' => $faker->sentence(10, 15), // password
        'slug' => $faker->slug(),
    ];
});


$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['php', 'laravel', 'bootstrap', 'javascript']),
        
    ];
});


$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['administrator', 'author', 'subscriber']),
        
    ];
});

$factory->define(Photo::class, function (Faker $faker) {
    return [
        'file' => 'aj.png',
        
    ];
});


$factory->define(Comment::class, function (Faker $faker) {
    return [
        'post_id' => $faker->numberBetween(1, 10),
        'is_active' =>1 ,
        'author' => $faker->name,
        'email' => $faker->safeEmail,
        'body' => $faker->paragraph(1, true),
        'photo' => 'aj.png',
        
    ];
});


$factory->define(CommentReply::class, function (Faker $faker) {
    return [
        'comment_id' => $faker->numberBetween(1, 10),
        'is_active' =>1 ,
        'author' => $faker->name,
        'email' => $faker->safeEmail,
        'body' => $faker->paragraph(1, true),
        'photo' => 'aj.png',
        
    ];
});
