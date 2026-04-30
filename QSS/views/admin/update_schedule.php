<?php
session_start();
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../helpers/auth.php';
require_admin();
$stop_name = $first_bus = $second_bus = $third_bus = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stop_name  = trim($_POST['stop_name']);
    $first_bus  = $_POST['first_bus'];
    $second_bus = $_POST['second_bus'];
    $third_bus  = $_POST['third_bus'];
    $id = (int)$_POST['schedule_id'];
    $stmt = mysqli_prepare($connection, "UPDATE schedule SET stop_name=?, first_bus=?, second_bus=?, third_bus=? WHERE schedule_id=?");
    mysqli_stmt_bind_param($stmt, 'ssssi', $stop_name, $first_bus, $second_bus, $third_bus, $id);
    if (mysqli_stmt_execute($stmt)) { header('Location: /views/admin/admin_cards.php'); exit(); }
} else {
    $id = (int)($_GET['schedule_id'] ?? 0);
    $stmt = mysqli_prepare($connection, "SELECT * FROM schedule WHERE schedule_id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
    if ($row) { $stop_name=$row['stop_name']; $first_bus=trim($row['first_bus']); $second_bus=trim($row['second_bus']); $third_bus=trim($row['third_bus']); }
    else { header('Location: /views/admin/admin_cards.php'); exit(); }
}
$page_title = 'Update Schedule';
?>
<!DOCTYPE html>
<html lang="en">
<head><?php include __DIR__ . '/../layout/head.php'; ?>
  <style>body{background-color:#B9B4C7;}</style>
</head>
<body>
<?php include __DIR__ . '/../layout/navbar_admin.php'; ?>
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-4">
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Update Schedule</h2>
            <form action="" method="POST">
              <input type="hidden" name="schedule_id" value="<?= (int)($_GET['schedule_id'] ?? $_POST['schedule_id'] ?? 0) ?>">
              <div class="mb-3"><label>Stop Name</label>
                <input type="text" name="stop_name" class="form-control" value="<?= htmlspecialchars($stop_name) ?>" required></div>
              <div class="mb-3"><label>First Bus</label>
                <input type="time" name="first_bus" class="form-control" value="<?= $first_bus ?>" required></div>
              <div class="mb-3"><label>Second Bus</label>
                <input type="time" name="second_bus" class="form-control" value="<?= $second_bus ?>" required></div>
              <div class="mb-3"><label>Third Bus</label>
                <input type="time" name="third_bus" class="form-control" value="<?= $third_bus ?>" required></div>
              <div class="d-grid gap-2">
                <input type="submit" class="btn btn-primary" value="Update">
                <a href="/views/admin/admin_cards.php" class="btn btn-secondary">Cancel</a>
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
