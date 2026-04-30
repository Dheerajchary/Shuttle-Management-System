<?php
session_start();
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../helpers/auth.php';
require_admin();
if (isset($_POST['submit'])) {
    $veh_reg_no    = trim($_POST['veh_reg_no']);
    $driver_name   = trim($_POST['driver_name']);
    $joining_date  = $_POST['joining_date'];
    $mobile        = trim($_POST['mobile']);
    $age           = (int)$_POST['age'];
    $license_no    = trim($_POST['license_no']);
    $stmt = mysqli_prepare($connection,
        "INSERT INTO `vehicle`(vehicle_reg_no, driver_name, joining_date, mobile, age, license_no) VALUES (?,?,?,?,?,?)");
    mysqli_stmt_bind_param($stmt, 'ssssis', $veh_reg_no, $driver_name, $joining_date, $mobile, $age, $license_no);
    if (mysqli_stmt_execute($stmt)) {
        header('Location: /views/admin/vehiclecrud.php');
        exit();
    }
}
$page_title = 'New Vehicle';
?>
<!DOCTYPE html>
<html lang="en">
<head><?php include __DIR__ . '/../layout/head.php'; ?>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <style>body{background-color:#FFDBAA;} #joining_date{background-color:white;}</style>
</head>
<body>
<?php include __DIR__ . '/../layout/navbar_admin.php'; ?><br>
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-4">
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Enter Vehicle Details</h2>
            <form action="" method="POST">
              <div class="mb-3"><span><b>Vehicle Registration No</b></span>
                <input type="text" class="form-control" name="veh_reg_no" required></div>
              <div class="mb-3"><span><b>Driver Name</b></span>
                <input type="text" class="form-control" name="driver_name" pattern="[A-Za-z ]+" required></div>
              <div class="mb-3"><span><b>Joining Date</b></span>
                <input type="text" id="joining_date" class="form-control" name="joining_date" readonly required></div>
              <div class="mb-3"><span><b>Mobile</b></span>
                <input type="tel" class="form-control" name="mobile" pattern="^[6-9]{1}[0-9]{9}$" required></div>
              <div class="mb-3"><span><b>Age</b></span>
                <input type="number" class="form-control" name="age" min="18" max="70" required></div>
              <div class="mb-3"><span><b>License No</b></span>
                <input type="text" class="form-control" name="license_no" required></div>
              <div class="d-grid gap-2">
                <input type="submit" name="submit" class="btn btn-success" value="Add Vehicle">
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
