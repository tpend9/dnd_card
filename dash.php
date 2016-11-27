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
?>



<!DOCTYPE html>

<html>
<head>
    <title>Name | dashborad</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
    <style>
        * {
            padding: 0;
            margin: 0;
        }
    </style>
</head>

<body>
    <?php
    
    $sql = "SELECT * FROM user WHERE id = 1";
    $result = mysqli_query($conn, $sql);
    
    
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            ?>
 <section class="dash">
    <div class="top">
        <table>
            
                
                    <h4 class="name">name <?php echo $row['name'] ?></h4>
                    
            <tr>
                <td>
                    <h4>CLASS & LEVEL</h4>
                    <p><?php echo $row['class'] ?></p>
                </td>
                <td>
                    <h4>BACKGROUND</h4>
                    <p><?php echo $row['background'] ?></p>
                </td>
                <td>
                    <h4>RACE</h4>
                    <p><?php echo $row['race'] ?></p>
                </td>
                
                <td>
                    <h4>Copper piece</h4>
                    <p><?php echo $row['cp'] ?></p>
                </td>
                <td>
                    <h4>Silver piece</h4>
                    <p><?php echo $row['sp'] ?></p>
                </td>
                <td>
                    <h4>Gold piece</h4>
                    <p><?php echo $row['gp'] ?></p>
                </td>
            </tr>
        </table>
    </div>
    <br/>
    <table>
        <tr>
            <td class="main">

            <div class="life">
                <h3>Life</h3>
                        <div>
                            <h4>HIT POINTS</h4>
                            <p><?php echo $row['hit_point'] ?></p>
                        </div>
                        <div>
                            <h4>ARMOR</h4>
                            <p><?php echo $row['armor'] ?></p>
                        </div>
                        <div>
                            <h4>MAX HIT POINTS</h4>
                            <p><?php echo $row['max_hit_point'] ?></p>
                        </div>
                        <div>
                            <h4>HIT DICE</h4>
                            <p><?php echo $row['hit_dice'] ?></p>
                        </div>
            </div>
            <div class="attacks">
                <h4>ATTACKS</h4>
                <table>
                    <tr>
                        <td>
                            <h4>NAME</h4>
                        </td>
                        <td>
                            <h4>ATK BONUS</h4>
                        </td>
                        <td>
                            <h4>DAMAGE</h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>longbow</p>
                        </td>
                        <td>
                            <p>+9</p>
                        </td>
                        <td>
                            <p>3D3</p>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="attacks">
                <h4>EQUIPMENT</h4>
                <table>
                    <tr>
                        <td>
                            <h4>NAME</h4>
                        </td>
                        <td>
                            <h4>INFORMATION</h4>
                        </td>
                        <td>
                            <h4>QUANTITY</h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>longbow</p>
                        </td>
                        <td>
                            <p>+9</p>
                        </td>
                        <td>
                            <p>3D3</p>
                        </td>
                    </tr>
                </table>
            </div>

            </td>
            
            <td class="main">
            
            <div class="abill">
                        <div>
                            <h4>STRENGTH</h4>
                            <p>0</p>
                            <p class="lower_num">19</p>
                        </div>
                        <div>
                            <h4>DEXTERITY</h4>
                            <p>2</p>
                            <p class="lower_num">30</p>
                        </div>
                        <div>
                            <h4>CONSTITUTION</h4>
                            <p>2</p>
                            <p class="lower_num">29</p>
                        </div>
                        <div>
                            <h4>INTELLIGENCE</h4>
                            <p>3</p>
                            <p class="lower_num">10</p>
                        </div>
                        <div>
                            <h4>WISDOM</h4>
                            <p>3</p>
                            <p class="lower_num">20</p>
                        </div>
                        <div>
                            <h4>CHARISMA</h4>
                            <p>3</p>
                            <p class="lower_num">30</p>
                        </div>
            </div>
            
            
            
            <div class="skills">
                <h4>SKILLS</h4>
                <ul>
                    <li> +2  Acrobatics (Dex)</li>
                    <li> +3  Animal Handling (Wis)</li>
                    <li> +2  Arcana (Int)</li>
                    <li> +2  Athletics (Str)</li>
                    <li> +4  Deception (Cha)</li>
                    <li> +1  History (Int)</li>
                    <li> +2  Insight (Wis)</li>
                    <li> +4  Intimidation (Cha)</li>
                    <li> +2  Investigation (Int)</li>
                    <li> +5  Medicine (Wis)</li>
                    <li> +3  Nature (Int)</li>
                    <li> +6  Perception (Wis)</li>
                    <li> +5  Performance (Cha)</li>
                    <li> +3  Persuasion (Cha)</li>
                    <li> +1  Religion (Int)</li>
                    <li> +2  Sleight of Hand (Dex)</li>
                    <li> +2  Stealth (Dex)</li>
                    <li> +6  Survival (Wis)</li>
                </ul>
                
            </div>
            </td>
        </tr>
    </table>
 </section>
 <?php }  ?>

</body>
</html>
