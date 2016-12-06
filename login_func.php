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
            document.location = "index.php";
        </script>
        <?php
    }
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    
    return $input;
}

$username = val($_POST['user_name']);
$password = val($_POST['user_password']);

$sql = "SELECT password, id FROM user WHERE user_name = '$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)){
        
        if (password_verify($password, $row['password'])) {
            $_SESSION['id'] = $row['id'];
            header("Location: dash.php");
        } else {
            ?>
                <script>
                    alert("Sorry, you Password is wrong, or did not mactch your username");
                    document.location = "index.php";
                </script>
            <?php
        }
        
    }
    
} else {
    ?>
        <script>
            alert("Sorry your account could not be found");
            document.location = "index.php";
        </script>
    <?php
}
?>