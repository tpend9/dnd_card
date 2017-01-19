<?php

include("extra/database_info.php");

function val ($input) {
    if($input == "") {
        ?>
        <script>
            alert("sorry but you have not fulled all of the inputs");
            document.location = "dash.php";
        </script>
        <?php
    }
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    
    return $input;
}

$info_1 = val($_POST['info_1']);
$info_2 = val($_POST['info_2']);
$info_3 = val($_POST['info_3']);
$func = val($_POST['func']);
$table = val($_POST['table']);
$user_id = val($_POST['user_id']);
$id = val($_POST['id']);
if ($table == 'attack') {
        $info = array('atk_bonus', 'damage');
    } elseif ($table == 'equipment') {
        $info = array('info', 'quantity');
    }

if ($func == "edit") {
    $sql = "UPDATE $table SET name = '$info_1', $info[0] = '$info_2', $info[1] = '$info_3' WHERE id = '$id'";
    echo $sql;
    if (mysqli_query($conn, $sql)) {
        header("Location: dash.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    
    
} elseif ($func == "delete") {
    
        
    $sql = "DELETE FROM $table WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: dash.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    
}

?>