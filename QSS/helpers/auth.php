<?php
// helpers/auth.php
function require_user() {
    if (!isset($_SESSION['username'])) {
        header('Location: /views/user/login.php');
        exit();
    }
}
function require_admin() {
    if (!isset($_SESSION['admin'])) {
        header('Location: /views/admin/login_admin.php');
        exit();
    }
}
