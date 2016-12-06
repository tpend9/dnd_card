<?php
session_start();
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



include("character_sheet/1.php");

$player_name = val($_POST['player_name']);
$email = val($_POST['user_email']);
$username = val($_POST['user_username']);
$password = password_hash(val($_POST['user_password']), PASSWORD_DEFAULT);

$sp = $sheet[0]['sp'];
$gp = $sheet[0]['gp'];

$hit_point = $sheet[1]['hit_point'];


$sql = "INSERT INTO user(name, cp, sp, gp, hit_point, id, level, user_name, password, email)
VALUES ('$player_name','','$sp','$gp','$hit_point','','1','$username','$password','$email')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql = "SELECT id FROM user WHERE user_name = '$username'";
$result = mysqli_query($conn, $sql);
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
    }





//adding equipment
$sql = "";
foreach ($sheet[0]['equipment'] as $value) {
    $name = $value[0];
    $quantity = $value[1];
    $sql = "INSERT INTO `equipment`(`name`, `quantity`, `id`, `user_id`) VALUES
    ('$name','$quantity','','$id')";
    
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

$sql = "";
foreach ($sheet[1]['actions'] as $value) {
    $name = $value['name'];
    $atk_bonus = $value['atk_bonus'];
    $damage = $value['damage'];
    $sql = "INSERT INTO `attack`(`name`, `atk_bonus`, `damage`, `id`, `user_id`) VALUES
    ('$name','$atk_bonus','$damage','','$id')";
    
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

$_SESSION['id'] = $id;
header("Location: dash.php");



?>