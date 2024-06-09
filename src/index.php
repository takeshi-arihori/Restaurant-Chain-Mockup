<?php

require_once 'vendor/autoload.php';

$faker = Faker\Factory::create();

echo $faker->name . "\n";
echo '<br>';
echo $faker->address . "\n";
echo '<br>';
echo $faker->text . "\n";
