<?php

include("extra/database_info.php");



$sql = "UPDATE " . $_GET['table'] . " SET " . $_GET['id'] . "='" . $_GET['str'] . "' WHERE id = '" . $_GET['user_id'] . "'";

if (mysqli_query($conn, $sql)) {
    echo "success" $_GET['id'] . " has been updated";
} else {
    echo "danger This did not work";
}


?>
