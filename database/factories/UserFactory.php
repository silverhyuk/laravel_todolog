<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Project::class, function (Faker $faker) {
    // 집계함수를 사용하여 id 의 최소, 최대값을 가져옴
    $min = App\User::min('id');  // 1
    $max = App\User::max('id');
    return [
        'user_id' => $faker->numberBetween($min, $max),   // 2
        'name' => substr($faker->word, 0, 20),            // 3
        'description' => $faker->sentence,                // 4
        'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = '-1 years'),  //5
        'updated_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),           //6
    ];
});

$factory->define(App\Task::class, function (Faker $faker) {
    // 집계함수를 사용하여 id 의 최소, 최대값을 가져옴
    $min = App\Project::min('id');
    $max = App\Project::max('id');

    $dt = $faker->dateTimeBetween($startDate = '-1 months', $endDate = 'now');   // 7

    return [
        'project_id' => $faker->numberBetween($min, $max),
        'name' => substr($faker->sentence, 0, 20),
        'description' => $faker->text,
        'due_date' => $faker->dateTimeBetween($startDate = '-1 months', $endDate = '+1 months'),  // 8
        'created_at' => $dt,
        'updated_at' => $dt,
    ];
});