<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dnd";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


function val ($input) {
    if($input == "") {
        ?>
        <script>
            alert("sorry but you have not fulled all of the inputs");
            //document.location = "dash.php";
        </script>
        <?php
    }
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    
    return $input;
}

$info_1 = val($_POST['hit_point']);
$info_2 = val($_POST['armor']);
$info_3 = val($_POST['max_hit_point']);
$info_4 = val($_POST['hit_dice']);
$id = $_POST['id'];

if ($info_1 == $info_3) {
    $info_1 = $info_3;
}

$sql = "UPDATE user SET hit_point = '$info_1', armor = '$info_2', max_hit_point = '$info_3', hit_dice = '$info_4' WHERE id = '$id'";

if (mysqli_query($conn, $sql)) {
    header("Location: dash.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>