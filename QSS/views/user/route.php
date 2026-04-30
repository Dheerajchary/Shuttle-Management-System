<?php
session_start();
require_once __DIR__ . '/../../config/db.php';
$result = mysqli_query($connection, "SELECT * FROM `route`");
$page_title = 'Routes';
?>
<!DOCTYPE html>
<html lang="en">
<head><?php include __DIR__ . '/../layout/head.php'; ?>
  <style>form{text-align:center;margin-bottom:20px;} body{background-color:#F7EEDD;}</style>
</head>
<body>
<?php include __DIR__ . '/../layout/navbar.php'; ?>
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Schedules</h2>
            <form action="/views/user/schedule.php" method="POST">
              <label>Select the preferred route:</label>
              <select name="route_id" class="form-select mb-3">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <option value="<?= $row['route_id'] ?>"><?= htmlspecialchars($row['source_point']) ?> — <?= htmlspecialchars($row['destination_point']) ?></option>
                <?php endwhile; ?>
              </select>
              <input type="submit" name="submit" class="btn btn-success">
              <a href="/views/user/home.php" class="btn btn-secondary ms-2">Cancel</a>
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
