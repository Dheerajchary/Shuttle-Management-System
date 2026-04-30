<?php
session_start();
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../helpers/auth.php';
require_admin();

$route_id = (int)($_GET['route_id'] ?? 0);
if (!$route_id) { header('Location: /views/admin/routecrud.php'); exit(); }

$stmt = mysqli_prepare($connection, "DELETE FROM `route` WHERE `route_id` = ?");
mysqli_stmt_bind_param($stmt, 'i', $route_id);
mysqli_stmt_execute($stmt);
header('Location: /views/admin/routecrud.php');
exit();
