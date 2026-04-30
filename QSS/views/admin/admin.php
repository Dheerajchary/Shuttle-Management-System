<?php
session_start();
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../helpers/auth.php';
require_once __DIR__ . '/../../helpers/db_helpers.php';
require_admin();

// Use new DB schema column/table names
$total_vehicles = db_count($connection, 'vehicle', 'vehicle_id');
$total_bookings = db_count($connection, 'booking', 'booking_id');
$total_routes   = db_count($connection, 'route', 'route_id');
$page_title = 'Admin Dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head><?php include __DIR__ . '/../layout/head.php'; ?></head>
<body style="background-color:#DDDDDD;">
<?php include __DIR__ . '/../layout/navbar_admin.php'; ?>
<div class="container mt-5">
  <h1 class="text-center mt-4 mb-4">Dashboard</h1>
  <div class="row g-4 mt-2">
    <div class="col-sm-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <i class="fas fa-bus fa-2x mb-2 text-primary"></i>
          <h5 class="card-title">Total Vehicles</h5>
          <p class="display-6 fw-bold"><?= $total_vehicles ?></p>
          <a href="/views/admin/vehiclecrud.php" class="btn btn-primary btn-sm">Manage</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <i class="fas fa-list fa-2x mb-2 text-success"></i>
          <h5 class="card-title">Total Bookings</h5>
          <p class="display-6 fw-bold"><?= $total_bookings ?></p>
          <a href="/views/admin/bookingcrud.php" class="btn btn-primary btn-sm">Manage</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <i class="fas fa-road fa-2x mb-2 text-warning"></i>
          <h5 class="card-title">Total Routes</h5>
          <p class="display-6 fw-bold"><?= $total_routes ?></p>
          <a href="/views/admin/admin_cards.php" class="btn btn-primary btn-sm">Manage</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>
