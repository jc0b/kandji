<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Kandji_model::class, function (Faker\Generator $faker) {

    $user_email = $faker->email();
    $name = $faker->name();
    $names = explode(" ", $name);
    $userName = str_replace(' ', '.', str_replace('.', '', trim(strtolower($name))));
    $computerName = $names[0] . '\'s ' . 'Mac';

    $passport_enabled = $faker->boolean();
    if ($passport_enabled) {
        $passport_users = $userName . ' : ' . $user_email;
    } else {
        $passport_users = '';
    }

    return [
        'device_id' => $faker->unique()->regexify('[A-F0-9]{8}-[A-F0-9]{4}-[A-F0-9]{4}-[A-F0-9]{4}-[A-F0-9]{12}'),
        'name' => $computerName,
        'kandji_agent_version' => $faker->randomElement(['3.3.0.607', '3.2.0.557', '3.1.6.469']),
        'asset_tag' => $faker->unique()->regexify('[0-9]{8}'),
        'last_check_in' => $faker->dateTimeBetween('-4 months', 'now')->getTimestamp(),
        'last_enrollment'=> $faker->dateTimeBetween('-6 months', 'now')->getTimestamp(),
        'first_enrollment'=> $faker->dateTimeBetween('-9 months', 'now')->getTimestamp(),
        'blueprint_id' => $faker->unique()->regexify('[A-F0-9]{8}-[A-F0-9]{4}-[A-F0-9]{4}-[A-F0-9]{4}-[A-F0-9]{12}'),
        'blueprint_name' => 'Kandji Blueprint',
        'realname' => $name,
        'email_address' => $user_email,
        'passport_enabled' => $passport_enabled ? 'True' : 'False',
        'passport_users' => $passport_users,
    ];
});