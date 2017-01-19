<?php

include("extra/database_info.php");



$sql = "UPDATE " . $_GET['table'] . " SET " . $_GET['id'] . "='" . $_GET['str'] . "' WHERE id = '" . $_GET['user_id'] . "'";

if (mysqli_query($conn, $sql)) {
    echo '<div class="alert alert-success container" >
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>' . $_GET['id'] . ' was updated suxxessfuly</p>
        </div>';
} else {
    echo '<div class="alert alert-danger container" >
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>' . $_GET['id'] . ' was updated unsuccesssfuly</p>
        </div>';
}


?>
