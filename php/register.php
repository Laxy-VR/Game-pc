<?php
require_once '../db/connection.php';
//echo "<pre>", print_r($_POST), "</pre>";

$firstname = $_POST["firstname"];
$prefix = $_POST["prefix"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$password = $_POST["password"];
$cpassword = $_POST['confirmpassword'];
$streetname = $_POST['streetname'];
$housenumber = $_POST['housenumber'];
$zipcode = $_POST['postcode'];
$city = $_POST['city'];

if ($password == $cpassword) {
    $hashedpsw = password_hash($password, PASSWORD_DEFAULT);
} else {
    echo 'passwords do not match';
}


$sql = "SELECT * FROM users WHERE email = :email";
$sth = $conn->prepare($sql);
$sth->bindParam(':email', $email);
$sth->execute();

if ($sth->rowCount() == 0) {
    $sql = "INSERT INTO users(`firstname`, `prefix`, `lastname`, `password`, `email`, `streetname`, `housenumber`, `zipcode`, `city`) VALUES(:firstname, :prefix, :lastname, :password, :email, :streetname, :housenumber, :zipcode, :city)";
    $sth = $conn->prepare($sql);
    $sth->bindParam(':firstname', $firstname);
    $sth->bindParam(':prefix', $prefix);
    $sth->bindParam(':lastname', $lastname);
    $sth->bindParam(':password', $hashedpsw);
    $sth->bindParam(':email', $email);
    $sth->bindParam(':streetname', $streetname);
    $sth->bindParam(':housenumber', $housenumber);
    $sth->bindParam(':zipcode', $zipcode);
    $sth->bindParam(':city', $city);
    $sth->execute();
    header("location: ../index.php?page=login");
} else {
    echo 'this email adress already exists';
}
?>