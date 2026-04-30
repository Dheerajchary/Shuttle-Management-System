<?php
session_start();
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../helpers/auth.php';
require_admin();
$route_id = (int)($_GET['route_id'] ?? $_POST['route_id'] ?? 0);
if (isset($_POST['submit'])) {
    $stop_name  = trim($_POST['stop_name']);
    $first_bus  = $_POST['first_bus'];
    $second_bus = $_POST['second_bus'];
    $third_bus  = $_POST['third_bus'];
    $stmt = mysqli_prepare($connection, "INSERT INTO `schedule`(route_id, stop_name, first_bus, second_bus, third_bus) VALUES (?,?,?,?,?)");
    mysqli_stmt_bind_param($stmt, 'issss', $route_id, $stop_name, $first_bus, $second_bus, $third_bus);
    if (mysqli_stmt_execute($stmt)) {
        header('Location: /views/admin/schedulecrud.php?route_id=' . $route_id);
        exit();
    }
}
$page_title = 'New Stop';
?>
<!DOCTYPE html>
<html lang="en">
<head><?php include __DIR__ . '/../layout/head.php'; ?>
  <style>body{background-color:#AFC8AD;}</style>
</head>
<body>
<?php include __DIR__ . '/../layout/navbar_admin.php'; ?><br>
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-4">
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Enter Stop Details</h2>
            <form action="" method="POST">
              <input type="hidden" name="route_id" value="<?= $route_id ?>">
              <div class="mb-3"><span><b>Stop Name</b></span>
                <input type="text" class="form-control" name="stop_name" required></div>
              <div class="mb-3"><span><b>First Bus Time</b></span>
                <input type="time" class="form-control" name="first_bus" required></div>
              <div class="mb-3"><span><b>Second Bus Time</b></span>
                <input type="time" class="form-control" name="second_bus" required></div>
              <div class="mb-3"><span><b>Third Bus Time</b></span>
                <input type="time" class="form-control" name="third_bus" required></div>
              <div class="d-grid gap-2">
                <input type="submit" name="submit" class="btn btn-success" value="Add Stop">
                <a href="/views/admin/schedulecrud.php?route_id=<?= $route_id ?>" class="btn btn-secondary">Cancel</a>
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
