<?php
session_start();
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../helpers/auth.php';
require_admin();

$result = mysqli_query($connection, "SELECT * FROM vehicle");
$page_title = 'Manage Vehicles';
?>
<!DOCTYPE html>
<html lang="en">
<head><?php include __DIR__ . '/../layout/head.php'; ?>
  <style>#myTable td,th{ text-align:center; vertical-align:middle; }</style>
</head>
<body>
<?php include __DIR__ . '/../layout/navbar_admin.php'; ?>
<div class="d-flex justify-content-end">
  <a href="/views/admin/newvehicle.php" class="btn btn-success" style="margin:10px 10px 0 0;">Add New Vehicle</a>
</div>
<div class="container">
  <h1 class="text-center">Registered Vehicles</h1><br>
  <table id="myTable" class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>ID</th><th>Reg No</th><th>Driver Name</th><th>Join Date</th>
        <th>Mobile</th><th>Age</th><th>License No</th><th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?= $row['vehicle_id'] ?></td>
        <td><?= htmlspecialchars($row['vehicle_reg_no']) ?></td>
        <td><?= htmlspecialchars($row['driver_name']) ?></td>
        <td><?= htmlspecialchars($row['joining_date']) ?></td>
        <td><?= htmlspecialchars($row['mobile']) ?></td>
        <td><?= htmlspecialchars($row['age']) ?></td>
        <td><?= htmlspecialchars($row['license_no']) ?></td>
        <td>
          <a href="/actions/delete_vehicle.php?vehicle_id=<?= $row['vehicle_id'] ?>" class="btn btn-danger btn-sm"
             onclick="return confirm('Delete this vehicle?')">Delete</a>
          <a href="/views/admin/update_vehicle.php?vehicle_id=<?= $row['vehicle_id'] ?>" class="btn btn-info btn-sm">Update</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>
