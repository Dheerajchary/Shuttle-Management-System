<?php
session_start();
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../helpers/auth.php';

$booking_id = (int)($_GET['booking_id'] ?? 0);
if (!$booking_id) { header('Location: /views/user/home.php'); exit(); }

$stmt = mysqli_prepare($connection, "DELETE FROM `booking` WHERE `booking_id` = ?");
mysqli_stmt_bind_param($stmt, 'i', $booking_id);
mysqli_stmt_execute($stmt);

if (isset($_SESSION['admin'])) {
    header('Location: /views/admin/bookingcrud.php');
} else {
    header('Location: /views/user/mybooking.php');
}
exit();
