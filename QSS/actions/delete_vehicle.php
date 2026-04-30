<?php
session_start();
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../helpers/auth.php';
require_admin();

$vehicle_id = (int)($_GET['vehicle_id'] ?? 0);
if (!$vehicle_id) { header('Location: /views/admin/vehiclecrud.php'); exit(); }

$stmt = mysqli_prepare($connection, "DELETE FROM `vehicle` WHERE `vehicle_id` = ?");
mysqli_stmt_bind_param($stmt, 'i', $vehicle_id);
mysqli_stmt_execute($stmt);
header('Location: /views/admin/vehiclecrud.php');
exit();
