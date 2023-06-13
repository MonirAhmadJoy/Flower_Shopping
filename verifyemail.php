<?php
session_start();
require_once './dbconn.php';

$email = base64_decode($_GET['id']);
$query = mysqli_query($link, "UPDATE `user` SET `email_verified_at` = NOW() WHERE `email` = '$email';");

if (mysqli_affected_rows($link) == 0) {
  echo "<script>alert('An email is sent to your gmail. Please check')</script>";

} else {
  $email_check = mysqli_query($link, "SELECT * FROM `user` WHERE `email`='$email';");
  $row = mysqli_fetch_assoc($email_check);
  $user_id = $row['user_id'];
  $_SESSION['user_login'] = $user_id;
  header('location:index.php');
  exit;
}
?>