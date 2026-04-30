<?php
session_start();
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../helpers/auth.php';
require_user();

// Always use session — never trust GET for username
$username = $_SESSION['username'];
$stmt = mysqli_prepare($connection, "SELECT * FROM `booking` WHERE username = ?");
mysqli_stmt_bind_param($stmt, 's', $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$page_title = 'My Bookings';
?>
<!DOCTYPE html>
<html lang="en">
<head><?php include __DIR__ . '/../layout/head.php'; ?>
  <style>#myTable td,th{ text-align:center; vertical-align:middle; }</style>
</head>
<body>
<?php include __DIR__ . '/../layout/navbar.php'; ?>
<div class="container">
  <h1 class="text-center mt-5">My Bookings</h1>
  <div class="col-md-12">
    <table id="myTable" class="table table-bordered table-striped table-hover mt-4">
      <thead>
        <tr>
          <th>Travel Date</th><th>Pick Up</th><th>Destination</th>
          <th>Mobile</th><th>Status</th><th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?= htmlspecialchars($row['book_date']) ?></td>
          <td><?= htmlspecialchars($row['pickup_point']) ?></td>
          <td><?= htmlspecialchars($row['destination']) ?></td>
          <td><?= htmlspecialchars($row['mobile']) ?></td>
          <td><?= $row['status'] == 1 ? '<span class="badge bg-success">Confirmed</span>' : '<span class="badge bg-warning text-dark">Pending</span>' ?></td>
          <td>
            <a href="/actions/delete_booking.php?booking_id=<?= $row['booking_id'] ?>" class="btn btn-danger btn-sm"
               onclick="return confirm('Delete this booking?')">Delete</a>
            <a href="/views/user/update_booking.php?booking_id=<?= $row['booking_id'] ?>" class="btn btn-info btn-sm">Edit</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>
