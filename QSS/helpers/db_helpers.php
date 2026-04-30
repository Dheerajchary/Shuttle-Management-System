<?php
// helpers/db_helpers.php — replaces card1.php, card2.php, card3.php
function db_count($connection, $table, $id_column) {
    $table     = mysqli_real_escape_string($connection, $table);
    $id_column = mysqli_real_escape_string($connection, $id_column);
    $result = mysqli_query($connection, "SELECT COUNT(`$id_column`) AS count FROM `$table`");
    $row = mysqli_fetch_assoc($result);
    return $row ? (int)$row['count'] : 0;
}
