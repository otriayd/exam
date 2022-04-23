<?php

use Faker\Generator as Faker;

$factory->define(App\Userdata::class, function (Faker $faker) {
    return [
		'user_id' => factory(App\User::class)->create()->id,
		'name' => $faker->name,
		'position' => $faker->company,
		'phone' => $faker->tollFreePhoneNumber,
		'address' => $faker->address,
		'vk' => 'https://vk.com',
		'telegram' => 'https://telegram.com',
		'instagram' => 'https://instagram.com',
    ];
});