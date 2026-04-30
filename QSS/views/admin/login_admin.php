<?php
session_start();
require_once __DIR__ . '/../../config/db.php';

$error = '';

if (isset($_POST['submit'])) {
    $username = strtolower(trim($_POST['username']));

    // ✅ Prepared statement — no SQL injection
    $stmt = mysqli_prepare($connection, "SELECT password, role FROM `users` WHERE username = ? AND role = 'admin'");
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $hashed_password, $role);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    // ✅ password_verify checks against bcrypt hash
    if ($hashed_password && password_verify($_POST['password'], $hashed_password)) {
        $_SESSION['admin']    = $username;
        $_SESSION['username'] = $username;
        header('Location: /views/admin/admin.php');
        exit();
    } else {
        $error = 'Incorrect admin credentials.';
    }
}
$page_title = 'Admin Login';
?>
<!DOCTYPE html>
<html lang="en">
<head><?php include __DIR__ . '/../layout/head.php'; ?></head>
<body style="background-color:#7F9F80;">
<?php include __DIR__ . '/../layout/navbar.php'; ?>

<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-8 col-md-5 col-lg-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-4">
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Admin Login</h2>

            <?php if ($error): ?>
              <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form action="" method="post">
              <div class="mb-3">
                <span class="input-group-addon"><b>Username</b></span>
                <input type="text" class="form-control" name="username" required>
              </div>
              <div class="mb-3">
                <span class="input-group-addon"><b>Password</b></span>
                <input type="password" class="form-control" name="password" required>
              </div>
              <div class="d-grid gap-2">
                <button type="submit" name="submit" class="btn btn-success">Log in as Admin</button>
                <a href="/views/user/login.php" class="btn btn-outline-secondary">Back to User Login</a>
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
