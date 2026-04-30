<?php
session_start();
require_once __DIR__ . '/../../config/db.php';
$result = mysqli_query($connection, "SELECT * FROM `route`");
$page_title = 'Bus Routes';
?>
<!DOCTYPE html>
<html lang="en">
<head><?php include __DIR__ . '/../layout/head.php'; ?>
  <style>
    .card{ border: 2px solid black; }
    p{ font-weight: bold; }
    body{ background-color:#76ABAE; }
  </style>
</head>
<body>
<?php include __DIR__ . '/../layout/navbar.php'; ?>
<h1 class="mt-5 text-center">Bus Routes</h1>
<div class="row d-flex justify-content-center">
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
  <div class="card m-4" style="width:18rem;">
    <div class="card-body">
      <p class="card-text">Route no: <?= htmlspecialchars($row['route_id']) ?></p>
      <p class="card-text">Pickup Point: <?= htmlspecialchars($row['source_point']) ?></p>
      <p class="card-text">Drop Point: <?= htmlspecialchars($row['destination_point']) ?></p>
      <a href="/views/user/schedule.php?route_id=<?= $row['route_id'] ?>" class="btn btn-primary">Book</a>
    </div>
  </div>
  <?php endwhile; ?>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>
