<?php

require('vendor/autoload.php');
require_once('config/config.php');
require_once('config/db.php');
$faker = Faker\Factory::create();

for ($i  = 1; $i <= 20; $i++) {
    $fake_creditCardType = mysqli_real_escape_string($conn,  $faker->creditCardType);
    $fake_creditCardNumber = mysqli_real_escape_string($conn,  $faker->creditCardNumber);
    $fake_credit_exp = mysqli_real_escape_string($conn,  $faker->creditCardExpirationDateString);
    $fake_uid = mysqli_real_escape_string($conn,  $faker->unique()->numberBetween($min=1, $max=100));


    //    echo "$i)firstname=$fake_fname, lastname=$fake_lname, address=$fake_address\n";



    $query = "INSERT INTO carddetail(creditCardType, creditCardNumber, creditCardExpirationDate, userIdNumber) VALUES('$fake_creditCardType', '$fake_creditCardNumber', '$fake_credit_exp', '$fake_uid')";

    if (mysqli_query($conn, $query)) {
    } else {
        echo 'ERROR: ' . mysqli_error($conn);
    }
    
 }
