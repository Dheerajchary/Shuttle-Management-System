<?php
session_start();
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../../helpers/auth.php';
require_admin();

$schedule_id = (int)($_GET['schedule_id'] ?? 0);
if (!$schedule_id) { header('Location: /views/admin/admin_cards.php'); exit(); }

$stmt = mysqli_prepare($connection, "DELETE FROM `schedule` WHERE `schedule_id` = ?");
mysqli_stmt_bind_param($stmt, 'i', $schedule_id);
mysqli_stmt_execute($stmt);
header('Location: /views/admin/admin_cards.php');
exit();
