<?php
session_start();
require '../db/connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT U_ID, password, role FROM users WHERE email = :Mail";
$sth = $conn->prepare($sql);
$sth->bindParam(':Mail', $email);
$sth->execute();
$result = $sth->fetch();
$userid = $result['U_ID'];
$role = $result['role'];
$hashedpsw = $result['password'];

if (password_verify($password, $hashedpsw)) {
  if ($role == 'admin') {
      $_SESSION['role'] = 'admin';
      $_SESSION['userid'] = "$userid";
      header('Location: ../?page=CPUlist');
  } else if ($role == 'user') {
      $_SESSION['role'] = 'user';
      $_SESSION['userid'] = "$userid";
      header('Location: ../?page=home');
  }
} else {
    echo 'Password is incorrect';
    header('Location: ../?page=login&error=wronglogin');
}
?>
