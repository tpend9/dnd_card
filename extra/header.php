<?php
session_start();
$nav = array("", "", "");
switch ($title) {
    case "home":
        $title = "Deabatable DND";
        $nav[0] = "class='active'";
        break;
    case "how_works":
        $title = "How It Works";
        $nav[1] = "class='active'";
        break;
    case "dash";
        $title = "Dash";
        $nav[2] = "class='active'";
        break;
}
?>


<!DOCTYPE html>

<html>
<head>
    <title><?php echo $title ?></title>
    
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="index.css" />
</head>

<body>
    
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">DND character sheets</a>
            </div>
            <ul class="nav navbar-nav">
                <li <?php echo $nav[0] ?>>
                    <a href="index.php">Home</a>
                </li>
                <li <?php echo $nav[1] ?>>
                    <a href="#">How It Works</a>
                </li >
                <li <?php echo $nav[2] ?>>
                    <a href="dash.php">Dashborad</a>
                </li>
            </ul>
        </div>
    </nav>