<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Kandji_model::class, function (Faker\Generator $faker) {

    return [
        'kandji_id' => $faker->unique()->regexify('[A-F0-9]{8}-[A-F0-9]{4}-[A-F0-9]{4}-[A-F0-9]{4}-[A-F0-9]{12}'),
        'name' => $faker->name(),
        'last_check_in' => $faker->dateTimeBetween('-4 months', 'now')->getTimestamp() * 1000,
        'last_enrollment'=> $faker->dateTimeBetween('-6 months', 'now')->getTimestamp() * 1000,
        'first_enrollment'=> $faker->dateTimeBetween('-9 months', 'now')->getTimestamp() * 1000,
        'blueprint_id' => $faker->unique()->regexify('[A-F0-9]{8}-[A-F0-9]{4}-[A-F0-9]{4}-[A-F0-9]{4}-[A-F0-9]{12}'),
        'blueprint_name' => 'Kandji Blueprint',
        'realname' => $faker->name(),
        'email_address' => $faker->email(),
        'agent_version' => $faker->randomElement(['3.3.0.607', '3.2.0.557', '3.1.6.469']),
        'asset_tag' => $faker->unique()->regexify('[0-9]{8}'),
    ];
});