<?php
session_start();
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../helpers/auth.php';
require_admin();
$route_name = $from = $to = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $route_name = trim($_POST['route_name']);
    $from = trim($_POST['from']);
    $to   = trim($_POST['to']);
    $id   = (int)$_POST['route_id'];
    $stmt = mysqli_prepare($connection, "UPDATE `route` SET route_name=?, source_point=?, destination_point=? WHERE route_id=?");
    mysqli_stmt_bind_param($stmt, 'sssi', $route_name, $from, $to, $id);
    if (mysqli_stmt_execute($stmt)) { header('Location: /views/admin/routecrud.php'); exit(); }
} else {
    $id = (int)($_GET['route_id'] ?? 0);
    $stmt = mysqli_prepare($connection, "SELECT * FROM `route` WHERE route_id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
    if ($row) { $route_name=$row['route_name']; $from=$row['source_point']; $to=$row['destination_point']; }
    else { header('Location: /views/admin/routecrud.php'); exit(); }
}
$page_title = 'Update Route';
?>
<!DOCTYPE html>
<html lang="en">
<head><?php include __DIR__ . '/../layout/head.php'; ?>
  <style>body{background-color:#76ABAE;}</style>
</head>
<body>
<?php include __DIR__ . '/../layout/navbar_admin.php'; ?>
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-4">
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Update Route Details</h2>
            <form action="" method="POST">
              <input type="hidden" name="route_id" value="<?= (int)($_GET['route_id'] ?? $_POST['route_id'] ?? 0) ?>">
              <div class="mb-3"><label>Route Name</label>
                <input type="text" name="route_name" class="form-control" value="<?= htmlspecialchars($route_name) ?>" required></div>
              <div class="mb-3"><label>Starting Point</label>
                <input type="text" name="from" class="form-control" value="<?= htmlspecialchars($from) ?>" required></div>
              <div class="mb-3"><label>End Point</label>
                <input type="text" name="to" class="form-control" value="<?= htmlspecialchars($to) ?>" required></div>
              <div class="d-grid gap-2">
                <input type="submit" class="btn btn-primary" value="Update">
                <a href="/views/admin/routecrud.php" class="btn btn-secondary">Cancel</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>
