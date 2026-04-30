<?php
session_start();
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../helpers/auth.php';
require_user();

$username = $_SESSION['username'];
$stmt = mysqli_prepare($connection, "SELECT first_name, last_name, email FROM `users` WHERE username = ?");
mysqli_stmt_bind_param($stmt, 's', $username);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $first_name, $last_name, $email);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);
$page_title = 'New Booking';
?>
<!DOCTYPE html>
<html lang="en">
<head><?php include __DIR__ . '/../layout/head.php'; ?>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <style>body{background-color:#4CCD99;} #req_date{background-color:white;}</style>
</head>
<body>
<?php include __DIR__ . '/../layout/navbar.php'; ?>
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Enter Details</h2>
            <div class="alert alert-info py-2">⚠️ Please check bus schedules before booking.</div>
            <form action="/actions/bookingaction.php" method="post">
              <div class="row gy-2">
                <div class="col-12">
                  <span class="input-group-addon"><b>Name</b></span>
                  <input type="text" class="form-control" name="name" pattern="[A-Za-z0-9 ]+" required>
                </div>
                <div class="col-12">
                  <span class="input-group-addon"><b>Date of Requirement</b></span>
                  <input id="req_date" type="text" class="form-control" name="req_date" readonly required>
                </div>
                <div class="col-12">
                  <span class="input-group-addon"><b>Pickup Point</b></span>
                  <input type="text" class="form-control" name="pickup" pattern="[A-Za-z_ ]+" required>
                </div>
                <div class="col-12">
                  <span class="input-group-addon"><b>Destination</b></span>
                  <input type="text" class="form-control" name="destination" pattern="[A-Za-z_ ]+" required>
                </div>
                <div class="col-12">
                  <span class="input-group-addon"><b>Email</b></span>
                  <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($email ?? '') ?>" required>
                </div>
                <div class="col-12">
                  <span class="input-group-addon"><b>Mobile</b></span>
                  <input type="text" class="form-control" name="mobile" pattern="^[6-9]{1}[0-9]{9}$" required>
                </div>
                <div class="col-12">
                  <div class="d-grid my-3">
                    <input type="submit" name="submit" class="btn btn-success" value="Book Now">
                    <a href="/views/user/home.php" class="btn btn-secondary mt-2">Cancel</a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  $("#req_date").datepicker({ dateFormat:'yy-mm-dd', minDate:0,
    onSelect: function(dateText,inst){ $(inst).val(dateText); }
  });
  $("#req_date").on('click', function(){ return false; });
</script>
<?php include __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>
