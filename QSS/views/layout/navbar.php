<?php // views/layout/navbar.php ?>
<?php if (!isset($_SESSION['username'])): ?>
<nav class="navbar navbar-expand-lg" style="background-color:#5E1675;">
    <div class="container-fluid">
        <a class="navbar-brand text-white fw-bold fs-4" href="/views/user/home.php">QSS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link text-white" href="/views/user/home.php"><i class="fas fa-home"></i> Home</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/views/user/cards.php"><i class="fas fa-road"></i> Routes</a></li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link text-white" href="/views/user/signup.php"><i class="fas fa-user-plus"></i> Sign Up</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/views/user/login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
            </ul>
        </div>
    </div>
</nav>
<?php else: ?>
<nav class="navbar navbar-expand-lg" style="background-color:#5E1675;">
    <div class="container-fluid">
        <a class="navbar-brand text-white fw-bold fs-4" href="/views/user/home.php">QSS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link text-white" href="/views/user/home.php"><i class="fas fa-home"></i> Home</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/views/user/cards.php"><i class="fas fa-list-alt"></i> Schedule</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/views/user/mybooking.php?username=<?= htmlspecialchars($_SESSION['username']) ?>"><i class="fa-solid fa-list"></i> My Bookings</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/views/user/booking.php"><i class="fa-solid fa-user-plus"></i> New Booking</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/views/user/booking_update.php"><i class="fas fa-calendar-check"></i> Upcoming Journey</a></li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link text-white" href="/actions/logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                <li class="nav-item"><a class="nav-link text-white"><i class="fa-solid fa-user"></i> Welcome <?= htmlspecialchars($_SESSION['username']) ?></a></li>
            </ul>
        </div>
    </div>
</nav>
<?php endif; ?>
