<?php
session_start();
require_once __DIR__ . '/../../config/db.php';

// Accept route_id from GET or POST, validate as integer
$route_id = (int)($_GET['route_id'] ?? $_POST['route_id'] ?? 0);
if (!$route_id) { header('Location: /views/user/cards.php'); exit(); }

$stmt = mysqli_prepare($connection, "SELECT * FROM `schedule` WHERE `route_id` = ? ORDER BY `first_bus`");
mysqli_stmt_bind_param($stmt, 'i', $route_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$page_title = 'Bus Schedule';
?>
<!DOCTYPE html>
<html lang="en">
<head><?php include __DIR__ . '/../layout/head.php'; ?>
  <style>#myTable td,th{ text-align:center; vertical-align:middle; }</style>
</head>
<body>
<?php include __DIR__ . '/../layout/navbar.php'; ?>
<h3 class="mt-5 text-center">Bus Schedule</h3><br>
<div class="container">
  <div class="col-md-12">
    <table id="myTable" class="table table-bordered table-striped table-hover">
      <thead>
        <tr><th>STOP NAME</th><th>FIRST</th><th>SECOND</th><th>THIRD</th></tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?= htmlspecialchars($row['stop_name']) ?></td>
          <td><?= htmlspecialchars($row['first_bus']) ?></td>
          <td><?= htmlspecialchars($row['second_bus']) ?></td>
          <td><?= htmlspecialchars($row['third_bus']) ?></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
  <div class="text-center mb-5">
    <?php if (isset($_SESSION['username'])): ?>
      <a class="btn btn-success" href="/views/user/booking.php">Book a Vehicle</a>
    <?php else: ?>
      <a class="btn btn-success" href="/views/user/login.php">Login To Book A Vehicle</a>
    <?php endif; ?>
  </div>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>
