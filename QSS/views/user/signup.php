<?php
session_start();
require_once __DIR__ . '/../../config/db.php';
$error = ''; $success = '';

if (isset($_POST['submit'])) {
    $firstname = trim($_POST['firstname']);
    $lastname  = trim($_POST['lastname']);
    $email     = strtolower(trim($_POST['email']));
    $mobile    = trim($_POST['mobile']);
    $username  = strtolower(trim($_POST['username']));
    // ✅ Hash the password — never store plain text
    $password  = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = mysqli_prepare($connection, "SELECT user_id FROM `users` WHERE username = ? OR email = ?");
    mysqli_stmt_bind_param($stmt, 'ss', $username, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        $error = 'Username or email already exists.';
    } else {
        mysqli_stmt_close($stmt);
        $stmt = mysqli_prepare($connection,
            "INSERT INTO `users` (first_name, last_name, email, username, password, mobile) VALUES (?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'ssssss', $firstname, $lastname, $email, $username, $password, $mobile);
        if (mysqli_stmt_execute($stmt)) {
            $success = 'Account created! You can now log in.';
        } else {
            $error = 'Something went wrong. Please try again.';
        }
    }
    mysqli_stmt_close($stmt);
}
$page_title = 'Sign Up';
?>
<!DOCTYPE html>
<html lang="en">
<head><?php include __DIR__ . '/../layout/head.php'; ?></head>
<body style="background-color:#7F9F80;">
<?php include __DIR__ . '/../layout/navbar.php'; ?>
<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-6 col-lg-5">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-4">
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Create your account</h2>
            <?php if ($error): ?><div class="alert alert-danger"><?= htmlspecialchars($error) ?></div><?php endif; ?>
            <?php if ($success): ?><div class="alert alert-success"><?= htmlspecialchars($success) ?> <a href="login.php">Login here</a></div><?php endif; ?>
            <form action="" method="POST">
              <div class="row g-3">
                <div class="col-6">
                  <span><b>First Name</b></span>
                  <input type="text" class="form-control" name="firstname" pattern="[A-Za-z]+" required>
                </div>
                <div class="col-6">
                  <span><b>Last Name</b></span>
                  <input type="text" class="form-control" name="lastname" pattern="[A-Za-z]+" required>
                </div>
                <div class="col-12">
                  <span><b>Email</b></span>
                  <input type="email" class="form-control" name="email" required>
                </div>
                <div class="col-12">
                  <span><b>Mobile</b></span>
                  <input type="tel" class="form-control" name="mobile" pattern="^[6-9]{1}[0-9]{9}$" required>
                </div>
                <div class="col-12">
                  <span><b>Username</b></span>
                  <input type="text" class="form-control" name="username" pattern="[A-Za-z0-9_]+" required>
                </div>
                <div class="col-12">
                  <span><b>Password</b></span>
                  <input type="password" class="form-control" name="password" minlength="6" required>
                </div>
                <div class="col-12 d-grid">
                  <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
                </div>
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
