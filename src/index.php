<?php

// コードベースのファイルのオートロードを追加
spl_autoload_extensions(".php");
spl_autoload_register();

require_once 'vendor/autoload.php';

use Models\Companies\Company;
use Models\User\Employee;

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
echo '<br><br>';

$employee = new Employee(
  $faker->numberBetween(1, 1000),
  $faker->firstName,
  $faker->lastName,
  $faker->email,
  'password',
  $faker->phoneNumber,
  $faker->address,
  new DateTime($faker->date),
  new DateTime($faker->date),
  $faker->jobTitle,
  $faker->jobTitle,
  $faker->randomFloat(2, 30000, 100000),
  new DateTime($faker->date),
  [$faker->word, $faker->word, $faker->word]
);

echo $employee->toString() . "\n";
echo '<br>';
echo $employee->toHTML() . "\n";
echo '<br>';
echo $employee->toMarkdown() . "\n";
echo '<br>';
print_r($employee->toArray());
