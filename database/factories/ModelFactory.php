<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

// $factory->define(App\User::class, function (Faker\Generator $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->safeEmail,
//         'password' => bcrypt(str_random(10)),
//         'remember_token' => str_random(10),
//     ];
// });

// $factory->define(App\Customer::class, function ($faker)  {
//     return [
//         'first_name' => $faker->name,
//         'last_name' => $faker->name,
//         'phone' => $faker->phoneNumber,
//         'mobile' => $faker->phoneNumber,
//         'address' => $faker->streetAddress,
//     ];
// });
// $factory->define(App\Journal::class, function ($faker)  {
//     return [
//         'description' => $faker->sentence,
//         'date'=>date('Y-m-d'),
//         'user_id'=>1,
//         'setting_id'=>1,
//         'lf'=>rand(1,29),
//         'status'=>1
        
//     ];
// });


$factory->define(App\JournalTransaction::class, function ($faker)  {
    return [
        'description' => $faker->sentence,
        'debit_amount' => 500,
        'credit_amount' => 500,
        'account_id' => rand(25,31),
        'journalable_id' => rand(1,50),
        'journalable_type' => 'App\Journal',
        'date'=>date('Y-m-d')
    ];
});

