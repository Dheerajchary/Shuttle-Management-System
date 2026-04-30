<?php
session_start();
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../helpers/auth.php';
require_user();

$name = $book_date = $pickup_point = $destination = $mobile = $email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name         = trim($_POST['name']);
    $book_date    = trim($_POST['book_date']);
    $pickup_point = trim($_POST['pickup_point']);
    $destination  = trim($_POST['destination']);
    $mobile       = trim($_POST['mobile']);
    $email        = trim($_POST['email']);
    $booking_id   = (int)$_POST['booking_id'];

    if ($name && $book_date && $pickup_point && $destination && $mobile && $email) {
        $stmt = mysqli_prepare($connection,
            "UPDATE booking SET name=?, book_date=?, pickup_point=?, destination=?, mobile=?, email=? WHERE booking_id=? AND username=?");
        mysqli_stmt_bind_param($stmt, 'ssssssis', $name, $book_date, $pickup_point, $destination, $mobile, $email, $booking_id, $_SESSION['username']);
        if (mysqli_stmt_execute($stmt)) {
            header('Location: /views/user/mybooking.php');
            exit();
        }
    }
} else {
    $id = (int)($_GET['booking_id'] ?? 0);
    if (!$id) { header('Location: /views/user/mybooking.php'); exit(); }

    $stmt = mysqli_prepare($connection, "SELECT * FROM booking WHERE booking_id = ? AND username = ?");
    mysqli_stmt_bind_param($stmt, 'is', $id, $_SESSION['username']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name']; $book_date = $row['book_date'];
        $pickup_point = $row['pickup_point']; $destination = $row['destination'];
        $mobile = $row['mobile']; $email = $row['email'];
    } else { header('Location: /views/user/mybooking.php'); exit(); }
}
$page_title = 'Edit Booking';
?>
<!DOCTYPE html>
<html lang="en">
<head><?php include __DIR__ . '/../layout/head.php'; ?>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <style>body{background-color:#96C291;} #book_date{background-color:white;}</style>
</head>
<body>
<?php include __DIR__ . '/../layout/navbar.php'; ?>
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-4">
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Edit Booking</h2>
            <form action="" method="POST">
              <input type="hidden" name="booking_id" value="<?= (int)($_GET['booking_id'] ?? $_POST['booking_id'] ?? 0) ?>">
              <div class="mb-2"><label>Name</label><input type="text" name="name" class="form-control" value="<?= htmlspecialchars($name) ?>" pattern="[A-Za-z0-9 ]+" required></div>
              <div class="mb-2"><label>Date</label><input type="text" name="book_date" id="book_date" class="form-control" value="<?= htmlspecialchars($book_date) ?>" required></div>
              <div class="mb-2"><label>Pickup Point</label><input type="text" name="pickup_point" class="form-control" value="<?= htmlspecialchars($pickup_point) ?>" pattern="[A-Za-z0-9 ]+" required></div>
              <div class="mb-2"><label>Destination</label><input type="text" name="destination" class="form-control" value="<?= htmlspecialchars($destination) ?>" pattern="[A-Za-z0-9 ]+" required></div>
              <div class="mb-2"><label>Mobile</label><input type="tel" name="mobile" class="form-control" value="<?= htmlspecialchars($mobile) ?>" pattern="^[6-9]{1}[0-9]{9}$" required></div>
              <div class="mb-2"><label>Email</label><input type="email" name="email" class="form-control" value="<?= htmlspecialchars($email) ?>" required></div>
              <div class="d-grid gap-2 mt-3">
                <input type="submit" class="btn btn-primary" value="Update Booking">
                <a href="/views/user/mybooking.php" class="btn btn-secondary">Cancel</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  $("#book_date").datepicker({ dateFormat:'yy-mm-dd', minDate:0,
    onSelect: function(d,i){ $(i).val(d); }
  });
  $("#book_date").on('click', function(){ return false; });
</script>
<?php include __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>
