<?php
session_start();
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../helpers/auth.php';
require_admin();

$route_id = (int)($_GET['route_id'] ?? 0);
if (!$route_id) { header('Location: /views/admin/admin_cards.php'); exit(); }

$stmt = mysqli_prepare($connection, "SELECT * FROM schedule WHERE route_id = ? ORDER BY first_bus ASC");
mysqli_stmt_bind_param($stmt, 'i', $route_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$page_title = 'Manage Stops';
?>
<!DOCTYPE html>
<html lang="en">
<head><?php include __DIR__ . '/../layout/head.php'; ?>
  <style>#myTable td,th{ text-align:center; vertical-align:middle; }</style>
</head>
<body>
<?php include __DIR__ . '/../layout/navbar_admin.php'; ?><br>
<div class="d-flex justify-content-end">
  <a href="/views/admin/newschedule.php?route_id=<?= $route_id ?>" class="btn btn-success" style="margin:10px 10px 0 0;">Add New Stop</a>
</div>
<div class="container">
  <h1 class="text-center">Existing Stops</h1><br>
  <table id="myTable" class="table table-bordered table-striped table-hover">
    <thead>
      <tr><th>Stop Name</th><th>First Bus</th><th>Second Bus</th><th>Third Bus</th><th>Action</th></tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?= htmlspecialchars($row['stop_name']) ?></td>
        <td><?= htmlspecialchars($row['first_bus']) ?></td>
        <td><?= htmlspecialchars($row['second_bus']) ?></td>
        <td><?= htmlspecialchars($row['third_bus']) ?></td>
        <td>
          <a href="/actions/delete_schedule.php?schedule_id=<?= $row['schedule_id'] ?>" class="btn btn-danger btn-sm"
             onclick="return confirm('Delete this stop?')">Delete</a>
          <a href="/views/admin/update_schedule.php?schedule_id=<?= $row['schedule_id'] ?>" class="btn btn-info btn-sm">Update</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>
