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

function other_tables($table, $id) {
    global $conn;
    if ($table == 'attack') {
        $info = array('ATK Bonus', 'Damage', 'atk_bonus', 'damage');
    } elseif ($table == 'equipment') {
        $info = array('Info', 'Quantity', 'info', 'quantity');
    }
        $results = "
            <table>
                    <tr>
                        <td>
                            <h4>Name</h4>
                        </td>
                        <td>
                            <h4>$info[0]</h4>
                        </td>
                        <td>
                            <h4>$info[1]</h4>
                        </td>
                        <td>
                            <h4>Edit</h4>
                        </td>
                    </tr>";
                        
                        $sql = "SELECT * FROM $table WHERE user_id = $id";
                        $result = mysqli_query($conn, $sql);
    
    

                        while($row = mysqli_fetch_assoc($result)) {
                    $show = "'$table', '$id', '" . $row['id'] ."', '" . $row['name'] . "', '" . $row[$info[2]] . "', '" . $row[$info[3]] . "', 'name', '" . $info[0] . "', '" . $info[1] . "'";          
                    $results .= "
                        <tr>
                            <td>
                                <p>" . $row['name'] . "</p>
                            </td>
                            <td>
                                <p>" . $row[$info[2]] . "</p>
                            </td>
                            <td>
                                <p>" . $row[$info[3]] . "</p>
                            </td>
                            <td>
                                <p onclick=\"show_edit($show);\">Edit</p>
                            </td>
                        </tr>
                    ";
                     }
                     $results .= "</table>";
                return $results;
                        

}

?>



<!DOCTYPE html>

<html>
<head>
    <title>Name | dashborad</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
    <script src="main.js"></script>
    <style>
        * {
            padding: 0;
            margin: 0;
        }
    </style>
</head>

<body>
    <div onclick="lightbox_vis('hide');" id='lightbox' class='lightbox'></div>
    <div id="edit_table">
        <h4 class="exit_lightbox" onclick='lightbox_vis("hide");'>X</h4>
        <h4>Edit Info</h4>
        <form action="" method="post">
        <table>
            <tr>
                <td>
                    <h4 id="head_1">Name</h4>
                </td>
                <td>
                    <h4 id="head_2">Info</h4>
                </td>
                <td>
                    <h4 id="head_3">Quantiy</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <input type='text' id="info_1" name="info_1" />
                </td>
                <td>
                    <textarea id="info_2" name="info_2"></textarea>
                </td>
                <td>
                    <input type="number" id="info_3" name="info_3" />
                </td>
            </tr>
        </table>
        <button type="button" class="edit_func_button" id="edit" onclick="edit_func('edit');">Edit</button>
        <button type="button" class="edit_func_button" id="delete" onclick="edit_func('delete');">Delete</button>
        <input type="text" name="func" id="func" hidden='true' />
        <input type='text' name='table' id="table" hidden='true' />
        <input type='number' name="user_id" id="user_id" hidden='true' />
        <input type="number" name="id" id="id" hidden='true' />
        <br />
        <button type="submit" value="Submit">Submit</button>
        </form>
    </div>
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
                <?php
                
                echo other_tables('attack', $row['id']);
                
                ?>
            </div>
            
            <div class="attacks">
                <h4>EQUIPMENT</h4>
                <?php
                
                echo other_tables('equipment', $row['id']);
                
                ?>
            </div>

            </td>
            
            <td class="main">
            
            <div class="abill">
                        <div>
                            <h4>STRENGTH</h4>
                            <p><?php echo $row['strenght'] ?></p>
                            <p class="lower_num">+<?php echo  ability_mod($row['strenght'], $row['level']) ?></p>
                        </div>
                        <div>
                            <h4>DEXTERITY</h4>
                            <p><?php echo $row['dexterity'] ?></p>
                            <p class="lower_num">+<?php echo ability_mod($row['dexterity'], $row['level']) ?></p>
                        </div>
                        <div>
                            <h4>CONSTITUTION</h4>
                            <p><?php echo $row['constitation'] ?></p>
                            <p class="lower_num">+<?php echo ability_mod($row['constitation'], $row['level']) ?></p>
                        </div>
                        <div>
                            <h4>INTELLIGENCE</h4>
                            <p><?php echo $row['intelligence'] ?></p>
                            <p class="lower_num">+<?php echo ability_mod($row['intelligence'], $row['level']) ?></p>
                        </div>
                        <div>
                            <h4>WISDOM</h4>
                            <p><?php echo $row['wisdom'] ?></p>
                            <p class="lower_num">+<?php echo ability_mod($row['wisdom'], $row['level']) ?></p>
                        </div>
                        <div>
                            <h4>CHARISMA</h4>
                            <p><?php echo $row['charisma'] ?></p>
                            <p class="lower_num">+<?php echo ability_mod($row['charisma'], $row['level']) ?></p>
                        </div>
            </div>
            
            
            
            <div class="skills">
                <h4>SKILLS</h4>
                <ul>
                    <li> +<?php echo ability_mod($row['dexterity'], $row['level']) ?>  Acrobatics (Dex)</li>
                    <li> +<?php echo ability_mod($row['wisdom'], $row['level']) ?>  Animal Handling (Wis)</li>
                    <li> +<?php echo ability_mod($row['intelligence'], $row['level']) ?>  Arcana (Int)</li>
                    <li> +<?php echo  ability_mod($row['strenght'], $row['level']) ?>  Athletics (Str)</li>
                    <li> +<?php echo ability_mod($row['charisma'], $row['level']) ?>  Deception (Cha)</li>
                    <li> +<?php echo ability_mod($row['intelligence'], $row['level']) ?>  History (Int)</li>
                    <li> +<?php echo ability_mod($row['wisdom'], $row['level']) ?>  Insight (Wis)</li>
                    <li> +<?php echo ability_mod($row['charisma'], $row['level']) ?>  Intimidation (Cha)</li>
                    <li> +<?php echo ability_mod($row['intelligence'], $row['level']) ?>  Investigation (Int)</li>
                    <li> +<?php echo ability_mod($row['wisdom'], $row['level']) ?>  Medicine (Wis)</li>
                    <li> +<?php echo ability_mod($row['intelligence'], $row['level']) ?>  Nature (Int)</li>
                    <li> +<?php echo ability_mod($row['wisdom'], $row['level']) ?>  Perception (Wis)</li>
                    <li> +<?php echo ability_mod($row['charisma'], $row['level']) ?>  Performance (Cha)</li>
                    <li> +<?php echo ability_mod($row['charisma'], $row['level']) ?>  Persuasion (Cha)</li>
                    <li> +<?php echo ability_mod($row['intelligence'], $row['level']) ?>  Religion (Int)</li>
                    <li> +<?php echo ability_mod($row['dexterity'], $row['level']) ?>  Sleight of Hand (Dex)</li>
                    <li> +<?php echo ability_mod($row['dexterity'], $row['level']) ?>  Stealth (Dex)</li>
                    <li> +<?php echo ability_mod($row['wisdom'], $row['level']) ?>  Survival (Wis)</li>
                </ul>
                
            </div>
            </td>
        </tr>
    </table>
 </section>
 <?php }  ?>

</body>
</html>
