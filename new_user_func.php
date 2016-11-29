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

function ability_mod($num, $level) {
    $level = $level/2;
    if($num <= 11) {
        $num = 0;
    } elseif( $num <= 13) {
        $num = 1;
    } elseif ($num <= 15) {
        $num = 2;
    } elseif ($num <= 17) {
        $num = 3;
    } elseif ($num <= 19) {
        $num = 4;
    } elseif ($num <= 21) {
        $num = 5;
    } elseif ($num <=23) {
        $num = 6;
    } elseif ($num <= 25) {
        $num = 7;
    } elseif ($num <= 27) {
        $num = 8;
    } elseif ($num <= 29) {
        $num = 9;
    } elseif ($num <= 31) {
        $num = 10;
    } elseif ($num <= 33) {
        $num = 11;
    } elseif ($num <= 35) {
        $num = 12;
    } elseif ($num <= 37) {
        $num = 13;
    } elseif ($num <= 39) {
        $num = 14;
    } else {
        $num = 15;
    }
    
    return floor($level * $num);
}




$player_name = val($_POST['player_name']);
$email = val($_POST['user_email']);
$username = val($_POST['user_username']);
$password = val($_POST['user_password']);


$class = array('Barbarian', 'Bard', 'Druid', 'Monk', 'Paladin', 'Ranger', 'Sorcerer', 'Warlock');
$class = $class[rand(0, count($class))];
$backgound = array('Acolyte', 'Charlatan', 'Criminal', 'Entertainer', 'Folk Hero', 'Guild Artisan', 'Hermit', 'Noble', 'Outlander', 'Sage', 'Sailor', 'Soldier', 'Urchin', 'Urchin', 'Haunted One');
$backgound = $backgound[rand(0, count($backgound))];
$race = array('Dragonborn', 'Dwarf', 'Eladrin', 'Elf', 'Gnome', 'Half-elf', 'Half-orc', 'Halfling', 'Human', 'Tiefling');
$race = $race[rand(0, count($race))];


function ran($dice, $num) {
    $result = 0;
    for ($x = 0; $x <= $num; $x++) {
        $result += rand(1, $dice);
    }
    return $result;
}


$strength = ran(6, 3);
$constitation = ran(6, 3);
$wisdom = ran(6, 3);
$dextrity = ran(6, 3);
$intelligence = ran(6, 3);
$charisma = ran(6, 3);

$hit_point = ability_mod($constitation, 1) + 8;
$hit_dice = array(4, 6, 8, 10);
$hit_dice = $hit_dice[rand(0, count($hit_dice))];

$gp = ran(6, 5);




?>