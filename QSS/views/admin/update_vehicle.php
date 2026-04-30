<?php
session_start();
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../helpers/auth.php';
require_admin();
$veh_reg_no=$driver_name=$joining_date=$mobile=$age=$license_no='';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $veh_reg_no   = trim($_POST['veh_reg_no']);
    $driver_name  = trim($_POST['driver_name']);
    $joining_date = $_POST['joining_date'];
    $mobile       = trim($_POST['mobile']);
    $age          = (int)$_POST['age'];
    $license_no   = trim($_POST['license_no']);
    $id = (int)$_POST['vehicle_id'];
    $stmt = mysqli_prepare($connection,
        "UPDATE vehicle SET vehicle_reg_no=?, driver_name=?, joining_date=?, mobile=?, age=?, license_no=? WHERE vehicle_id=?");
    mysqli_stmt_bind_param($stmt, 'ssssiis', $veh_reg_no, $driver_name, $joining_date, $mobile, $age, $license_no, $id);
    if (mysqli_stmt_execute($stmt)) { header('Location: /views/admin/vehiclecrud.php'); exit(); }
} else {
    $id = (int)($_GET['vehicle_id'] ?? 0);
    $stmt = mysqli_prepare($connection, "SELECT * FROM vehicle WHERE vehicle_id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
    if ($row) { $veh_reg_no=$row['vehicle_reg_no']; $driver_name=$row['driver_name']; $joining_date=trim($row['joining_date']); $mobile=$row['mobile']; $age=$row['age']; $license_no=$row['license_no']; }
    else { header('Location: /views/admin/vehiclecrud.php'); exit(); }
}
$page_title = 'Update Vehicle';
?>
<!DOCTYPE html>
<html lang="en">
<head><?php include __DIR__ . '/../layout/head.php'; ?>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <style>body{background-color:#DBAFA0;} #joining_date{background-color:white;}</style>
</head>
<body>
<?php include __DIR__ . '/../layout/navbar_admin.php'; ?>
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-4">
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Update Vehicle Details</h2>
            <form action="" method="POST">
              <input type="hidden" name="vehicle_id" value="<?= (int)($_GET['vehicle_id'] ?? $_POST['vehicle_id'] ?? 0) ?>">
              <div class="mb-3"><label>Registration Number</label>
                <input type="text" name="veh_reg_no" class="form-control" value="<?= htmlspecialchars($veh_reg_no) ?>" required></div>
              <div class="mb-3"><label>Driver Name</label>
                <input type="text" name="driver_name" class="form-control" value="<?= htmlspecialchars($driver_name) ?>" required></div>
              <div class="mb-3"><label>Joining Date</label>
                <input type="text" name="joining_date" id="joining_date" class="form-control" value="<?= htmlspecialchars($joining_date) ?>" readonly required></div>
              <div class="mb-3"><label>Mobile</label>
                <input type="text" name="mobile" class="form-control" value="<?= htmlspecialchars($mobile) ?>" required></div>
              <div class="mb-3"><label>Age</label>
                <input type="number" name="age" class="form-control" value="<?= htmlspecialchars($age) ?>" required></div>
              <div class="mb-3"><label>License Number</label>
                <input type="text" name="license_no" class="form-control" value="<?= htmlspecialchars($license_no) ?>" required></div>
              <div class="d-grid gap-2">
                <input type="submit" class="btn btn-primary" value="Update">
                <a href="/views/admin/vehiclecrud.php" class="btn btn-secondary">Cancel</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  $("#joining_date").datepicker({ dateFormat:'yy-mm-dd', onSelect:function(d,i){ $(i).val(d); } });
  $("#joining_date").on('click', function(){ return false; });
</script>
<?php include __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>
