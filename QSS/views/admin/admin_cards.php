<?php
session_start();
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../helpers/auth.php';
require_admin();

$result = mysqli_query($connection, "SELECT * FROM `route`");
$page_title = 'Manage Schedules';
?>
<!DOCTYPE html>
<html lang="en">
<head><?php include __DIR__ . '/../layout/head.php'; ?>
  <style>body{background-color:#B5C0D0;}</style>
</head>
<body>
<?php include __DIR__ . '/../layout/navbar_admin.php'; ?>
<h1 class="mt-5 text-center">Manage Schedules</h1><br>
<div class="row d-flex justify-content-center">
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
  <div class="card m-4" style="width:18rem;">
    <div class="card-body">
      <p class="card-text"><?= htmlspecialchars($row['route_name']) ?></p>
      <p class="card-text">Start: <?= htmlspecialchars($row['source_point']) ?></p>
      <p class="card-text">End: <?= htmlspecialchars($row['destination_point']) ?></p>
      <a href="/views/admin/schedulecrud.php?route_id=<?= $row['route_id'] ?>" class="btn btn-primary">Open Schedule</a>
    </div>
  </div>
  <?php endwhile; ?>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>
