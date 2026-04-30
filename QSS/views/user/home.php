<?php
session_start();
require_once __DIR__ . '/../../config/db.php';
$page_title = 'Home';
// Show booking success message if redirected here after booking
$booking_success = isset($_GET['booking']) && $_GET['booking'] === 'success';
?>
<!DOCTYPE html>
<html lang="en">
<head><?php include __DIR__ . '/../layout/head.php'; ?>
  <link rel="stylesheet" href="/public/assets/css/style.css">
</head>
<body style="background-color:#7F9F80;">
<?php include __DIR__ . '/../layout/navbar.php'; ?>

<?php if ($booking_success): ?>
  <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
    ✅ Booking successful! We will confirm your booking shortly.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
<?php endif; ?>

<div class="container mt-5">
  <h1 class="text-center mt-5 mb-5" style="font-family:poppins;font-weight:bold;">Quick Shuttle Services</h1>

  <div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="/public/assets/img/img1.jpg" class="d-block w-100" alt="Affordable" height="500">
        <div class="carousel-caption d-none d-md-block">
          <p class="h1" style="font-weight:bolder;width:fit-content;margin:auto;">Affordable</p>
          <p style="font-weight:bolder;width:fit-content;margin:auto;color:white;">Experience Uncompromised Quality at a Price That Doesn&apos;t Break the Bank</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/public/assets/img/img2.jpg" class="d-block w-100" alt="Safest" height="500">
        <div class="carousel-caption d-none d-md-block">
          <p class="h1" style="font-weight:bolder;width:fit-content;margin:auto;">Safest</p>
          <p style="font-weight:bolder;width:fit-content;margin:auto;color:white;">We Prioritize Your Safety Above All Else</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/public/assets/img/img3.jpg" class="d-block w-100" alt="Timely" height="500">
        <div class="carousel-caption d-none d-md-block">
          <p class="h1" style="font-weight:bolder;width:fit-content;margin:auto;">Timely</p>
          <p style="font-weight:bolder;width:fit-content;margin:auto;color:white;">We Value Your Time as Much as You Do</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
</div>

<div class="container" id="middle">
  <div class="row align-items-center justify-content-center" style="height:80vh;">
    <div class="col-6 mx-auto text-center">
      <h3>Bored of your daily morning journeys?</h3>
      <p>Your daily commute made easy</p>
      <?php if (isset($_SESSION['username'])): ?>
        <a class="btn btn-success btn-lg" href="/views/user/cards.php">Book a shuttle</a>
      <?php else: ?>
        <a class="btn btn-success" href="/views/user/login.php">Click here to book a shuttle</a>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>
