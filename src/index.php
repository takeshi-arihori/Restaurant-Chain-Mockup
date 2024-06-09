<?php

// コードベースのファイルのオートロード
spl_autoload_extensions(".php");
spl_autoload_register();

require_once 'vendor/autoload.php';

use Models\Companies\Company;

$faker = Faker\Factory::create();

$company = new Company(
  $faker->company,
  $faker->year,
  $faker->text,
  $faker->url,
  $faker->phoneNumber,
  $faker->companySuffix,
  $faker->name,
  $faker->boolean,
  $faker->country,
  $faker->name,
  $faker->numberBetween(10, 1000)
);

echo $company->toString() . "\n";
echo '<br>';
echo $company->toHTML() . "\n";
echo '<br>';
echo $company->toMarkdown() . "\n";
echo '<br>';
print_r($company->toArray());
