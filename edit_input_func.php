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
            document.location = "dash.php";
        </script>
        <?php
    }
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    
    return $input;
}

$id = val($_GET['id']);
$element = val($_GET['element']);
$info = val($_GET['info']);

$sql = "UPDATE user SET $element='$info' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: dash.php");
} else {
    echo "Error updating record: " . $conn->error;
}
?>