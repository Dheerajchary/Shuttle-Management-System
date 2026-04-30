<?php // views/layout/navbar_admin.php ?>
<nav class="navbar navbar-expand-lg" style="background-color:#5E1675;">
    <div class="container-fluid">
        <a class="navbar-brand text-white fw-bold fs-4" href="/views/admin/admin.php">QSS Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link text-white" href="/views/admin/admin.php"><i class="fas fa-home"></i> Home</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/views/admin/vehiclecrud.php"><i class="fas fa-bus"></i> Manage Vehicles</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/views/admin/bookingcrud.php"><i class="fas fa-list"></i> Manage Bookings</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/views/admin/routecrud.php"><i class="fas fa-road"></i> Manage Routes</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/views/admin/admin_cards.php"><i class="fas fa-list-alt"></i> Manage Schedules</a></li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link text-white" href="/actions/logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
            </ul>
        </div>
    </div>
</nav>
