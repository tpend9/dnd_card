<?php
//this will remove the element from the element from the database

include("extra/database_info.php");

$sql = "DELETE FROM " . $_GET['table'] . " WHERE id = " . $_GET['id'];

if (mysqli_query($conn, $sql)) {
    echo $id . " was removed from " . $table;
}
?>