<?php
session_start();
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../helpers/auth.php';
require_admin();

$result = mysqli_query($connection, "SELECT * FROM `booking`");
$page_title = 'Manage Bookings';
?>
<!DOCTYPE html>
<html lang="en">
<head><?php include __DIR__ . '/../layout/head.php'; ?>
  <style>#myTable td,th{ text-align:center; vertical-align:middle; }</style>
</head>
<body>
<?php include __DIR__ . '/../layout/navbar_admin.php'; ?>
<div class="container">
  <h2 class="mt-5 text-center">Manage Bookings</h2><br>
  <table id="myTable" class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>Booking ID</th><th>Travel Date</th><th>Pick Up</th>
        <th>Destination</th><th>Mobile</th><th>Status</th><th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?= $row['booking_id'] ?></td>
        <td><?= htmlspecialchars($row['book_date']) ?></td>
        <td><?= htmlspecialchars($row['pickup_point']) ?></td>
        <td><?= htmlspecialchars($row['destination']) ?></td>
        <td><?= htmlspecialchars($row['mobile']) ?></td>
        <td>
          <?php if ($row['status'] == 1): ?>
            <span class="badge bg-success">Confirmed</span>
          <?php else: ?>
            <a href="/actions/confirm_booking.php?booking_id=<?= $row['booking_id'] ?>" class="btn btn-success btn-sm">Confirm</a>
          <?php endif; ?>
        </td>
        <td>
          <a href="/actions/delete_booking.php?booking_id=<?= $row['booking_id'] ?>" class="btn btn-danger btn-sm"
             onclick="return confirm('Delete this booking?')">Delete</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>
