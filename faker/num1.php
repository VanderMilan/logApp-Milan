<?php

require('vendor/autoload.php');
require_once('../config/config.php');
require_once('../config/db.php');
$faker = Faker\Factory::create();

for ($i  = 1; $i <= 100; $i++) {
    $fake_email = mysqli_real_escape_string($conn,  $faker->safeEmail);
    $fake_lastname =mysqli_real_escape_string($conn, $faker->lastname);
    $fake_firstname = mysqli_real_escape_string($conn, $faker->firstname);
    $fake_username = mysqli_real_escape_string($conn, $faker->userName);
    $fake_password = mysqli_real_escape_string($conn, $faker->password);


    //    echo "$i)firstname=$fake_fname, lastname=$fake_lname, address=$fake_address\n";



    $query = "INSERT INTO useraccount(email, lastname, firstname, username, password) VALUES('$fake_email', '$fake_lastname', '$fake_firstname', '$fake_username','$fake_password')";

    if (mysqli_query($conn, $query)) {
        header('Location: ' . ROOT_URL . '');
    } else {
        echo 'ERROR: ' . mysqli_error($conn);
    }
}
