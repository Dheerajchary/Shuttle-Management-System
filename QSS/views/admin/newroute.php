<?php
session_start();
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../helpers/auth.php';
require_admin();
$msg = '';
if (isset($_POST['submit'])) {
    $route_name = trim($_POST['route_name']);
    $from = trim($_POST['from']);
    $to   = trim($_POST['to']);
    $stmt = mysqli_prepare($connection, "INSERT INTO `route`(route_name, source_point, destination_point) VALUES (?,?,?)");
    mysqli_stmt_bind_param($stmt, 'sss', $route_name, $from, $to);
    if (mysqli_stmt_execute($stmt)) {
        header('Location: /views/admin/routecrud.php');
        exit();
    } else { $msg = 'Error: ' . mysqli_error($connection); }
}
$page_title = 'New Route';
?>
<!DOCTYPE html>
<html lang="en">
<head><?php include __DIR__ . '/../layout/head.php'; ?>
  <style>body{background-color:skyblue;}</style>
</head>
<body>
<?php include __DIR__ . '/../layout/navbar_admin.php'; ?><br>
<?php if ($msg): ?><div class="alert alert-danger m-3"><?= htmlspecialchars($msg) ?></div><?php endif; ?>
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Enter Route Details</h2>
            <form action="" method="post">
              <div class="mb-3"><label class="form-label">Route Name</label>
                <input type="text" class="form-control" name="route_name" pattern="[a-zA-Z0-9_ ]+" required></div>
              <div class="mb-3"><label class="form-label">Starting Point</label>
                <input type="text" class="form-control" name="from" pattern="[a-zA-Z0-9_ ]+" required></div>
              <div class="mb-3"><label class="form-label">Drop Point</label>
                <input type="text" class="form-control" name="to" pattern="[a-zA-Z0-9_ ]+" required></div>
              <div class="d-grid gap-2">
                <input type="submit" name="submit" class="btn btn-success" value="Add Route">
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
