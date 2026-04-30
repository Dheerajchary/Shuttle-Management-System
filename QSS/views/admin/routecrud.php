<?php
session_start();
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../helpers/auth.php';
require_admin();

$result = mysqli_query($connection, "SELECT * FROM route");
$page_title = 'Manage Routes';
?>
<!DOCTYPE html>
<html lang="en">
<head><?php include __DIR__ . '/../layout/head.php'; ?>
  <style>#myTable td,th{ text-align:center; vertical-align:middle; }</style>
</head>
<body>
<?php include __DIR__ . '/../layout/navbar_admin.php'; ?>
<div class="d-flex justify-content-end">
  <a href="/views/admin/newroute.php" class="btn btn-success" style="margin:10px 10px 0 0;">Add New Route</a>
</div>
<div class="container">
  <h1 class="text-center">Existing Routes</h1><br>
  <table id="myTable" class="table table-bordered table-striped table-hover">
    <thead>
      <tr><th>Route Name</th><th>Pickup Point</th><th>Drop Point</th><th>Action</th></tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?= htmlspecialchars($row['route_name']) ?></td>
        <td><?= htmlspecialchars($row['source_point']) ?></td>
        <td><?= htmlspecialchars($row['destination_point']) ?></td>
        <td>
          <a href="/actions/delete_route.php?route_id=<?= $row['route_id'] ?>" class="btn btn-danger btn-sm"
             onclick="return confirm('Delete this route?')">Delete</a>
          <a href="/views/admin/update_route.php?route_id=<?= $row['route_id'] ?>" class="btn btn-info btn-sm">Update</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>
