<?php

include("extra/database_info.php");



$sql = "UPDATE " . $_GET['table'] . " SET " . $_GET['id'] . "='" . $_GET['str'] . "' WHERE id = '" . $_GET['user_id'] . "'";
echo $sql;
if (mysqli_query($conn, $sql)) {
    echo $_GET['id'] . " has been updated";
} 


?>
