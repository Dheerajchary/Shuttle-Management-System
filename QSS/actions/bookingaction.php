<?php
session_start();
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../helpers/auth.php';
require_user();

if (!isset($_POST['submit'])) { header('Location: /views/user/booking.php'); exit(); }

$name        = trim($_POST['name']);
$req_date    = trim($_POST['req_date']);
$destination = trim($_POST['destination']);
$pickup      = trim($_POST['pickup']);
$email       = trim($_POST['email']);
$mobile      = trim($_POST['mobile']);
$username    = $_SESSION['username']; // Always trust session, never POST

$stmt = mysqli_prepare($connection,
    "INSERT INTO `booking` (name, username, book_date, destination, pickup_point, email, mobile) VALUES (?,?,?,?,?,?,?)");
mysqli_stmt_bind_param($stmt, 'sssssss', $name, $username, $req_date, $destination, $pickup, $email, $mobile);

if (mysqli_stmt_execute($stmt)) {
    header('Location: /views/user/home.php?booking=success');
} else {
    header('Location: /views/user/booking.php?error=1');
}
exit();
