<?php
session_start();
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../helpers/auth.php';
require_user();

$username = $_SESSION['username'];
$stmt = mysqli_prepare($connection, "SELECT * FROM booking WHERE username = ? AND book_date >= CURDATE() AND status = 1");
mysqli_stmt_bind_param($stmt, 's', $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$page_title = 'Upcoming Journey';
?>
<!DOCTYPE html>
<html lang="en">
<head><?php include __DIR__ . '/../layout/head.php'; ?>
  <style>#myTable td,th{ text-align:center; vertical-align:middle; }</style>
</head>
<body>
<?php include __DIR__ . '/../layout/navbar.php'; ?>
<div class="container mt-5">
  <h3 class="text-center">Dear Customer, your Confirmed Journey Details are shown below</h3>
  <table id="myTable" class="table table-bordered table-striped table-hover mt-4">
    <thead>
      <tr><th>Travel Date</th><th>Pick Up</th><th>Destination</th><th>Mobile</th></tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?= htmlspecialchars($row['book_date']) ?></td>
        <td><?= htmlspecialchars($row['pickup_point']) ?></td>
        <td><?= htmlspecialchars($row['destination']) ?></td>
        <td><?= htmlspecialchars($row['mobile']) ?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>
