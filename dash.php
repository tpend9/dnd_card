<?php
$title = 'dash';
include("extra/header.php");
include("character_sheet/1.php");
?>
<style>
    <?php include("dash.css"); ?>
</style>
<script>
    <?php include('main.js'); ?>
</script>
<?php



function ability_mod($num, $level) {
    $level = $level;
    if ($num <= 8) {
      $num = -1;  
    } elseif($num <= 11) {
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
    $result = $level * $num;
    if ($result >= 0) {
        return "+" . $result;
    } else {
        return $result;
    }
    
}


function other_tables($table, $id) {
    global $conn;
    
    if ($table == "equipment") {
        $info = array('Name', 'Quantity');
    } else {
        $info = array('Name', 'atk_bonus', 'Damage');
    }
    
    
    $result = "
    <table class='table table-hover table-bordered'>
        <tr>";
        for ($x = 0; $x < count($info); $x++) {
            $result .= "<th>" . $info[$x] . "</th>";
        }
    $result .= "
        <th>Remove</th>
        </tr>";
    
    $sql = "SELECT * FROM $table WHERE user_id = $id";
    $query = mysqli_query($conn, $sql);
    
    while ($row = mysqli_fetch_assoc($query)) {
        $result .= "<tr id='" . $table . "_" . $row['id'] . "'>";
                
                for ($x = 0; $x < count($info); $x++) {
                    if ($info[$x] == "Quantity") {
                        $result .= "<td> <input class='form-control' type='number' id='quantity_" . $row['id'] . "' value='" . $row[strtolower($info[$x])] . "' onblur=\"update_equipment('" . $row['id'] . "', '" . $row['user_id'] . "')\" > </td>";
                    } else {
                        $result .= "<td>" . $row[strtolower($info[$x])] . "</td>";
                    }
                }
                
            $result .= "
                <td onclick=\"remove_info('" . $table . "', '" . $row['id'] . "');\" >Remove</td>
            </tr>";
    }
    $result .= "</table>";

    return $result;
}    











include("extra/database_info.php");

$sql = "SELECT * FROM `user` WHERE id = '" . $_SESSION['id'] ."'";
$result = mysqli_query($conn, $sql);

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
?>

<div class="jumbotron row">
    <div class="col-sm-1"></div>
    <div class="col-sm-3">
        <h3><?php echo $row['name'] ?></h3>
    </div>
    <div class="col-sm-7">
        
        <div class="top row">
            <div class="col-sm-6">
                <h3><?php echo $sheet[0]['class'] . " " . $sheet[0]['background'] . " " . $sheet[0]['race'] ?></h3>
                <p>Background</p>
            </div>
            <div class="col-sm-3">
                <h2></h2>
                <input class="form-control" type="number" id="xp" value="<?php echo $row['xp'] ?>" onblur="update_info(<?php echo "'user', 'xp', '" . $row['id'] . "'" ?>);" />
                <p>XP</p>
            </div>
            <div class="col-sm-3">
                <h2></h2>
                <input class="form-control" type="number" id="level" value="<?php echo $row['level'] ?>" onblur="update_info(<?php echo "'user', 'level', '" . $row['id'] . "'" ?>);" />
                <p>Level</p>
            </div>
        </div>
        
        <div class="bottom row">
            <div class="col-sm-4">
                <input class="form-control" type="number" id="cp" value="<?php echo $row['cp'] ?>" onblur="update_info(<?php echo "'user', 'cp', '" . $row['id'] . "'" ?>);" />
                <p>CP</p>
            </div>
            <div class="col-sm-4">
                <input class="form-control" type="number" id="sp" value="<?php echo $row['sp'] ?>" onblur="update_info(<?php echo "'user', 'sp', '" . $row['id'] . "'" ?>);" />
                <p>SP</p>
            </div>
            <div class="col-sm-4">
                <input class="form-control" type="number" id="gp" value="<?php echo $row['gp'] ?>" onblur="update_info(<?php echo "'user', 'gp', '" . $row['id'] . "'" ?>);" />
                <p>GP</p>
            </div>
        </div>
        
        
    </div>
    <div class="col-sm-1"></div>
    
    
    
</div>

    <div class="container" id="alert" >
        
        <span id="update_alert"></span>
    </div>

    <div class="container">
        <ul class="nav nav-tabs">
            <li id="main_info_tab" class="active" onclick="select('main_info_tab'); vis('main_info', 'show'); vis('background', 'hide');"><a>Home</a></li>
            <li id="background_tab" class="" onclick="select('background_tab'); vis('main_info', 'hide'); vis('background', 'show');"><a>Background Information</a></li>
        </ul>
    </div>














<div class="container" id="main_info">
    <div class=" col-xs-12 col-sm-5" >
        
        <div class="display row life ">
            <div class="top ">
                <div class="info_div col-xs-4 col-sm-4" >
                    <h4><?php echo $sheet[$row['level']]['armor'] ?></h4>
                    <p>Armor class</p>
                </div>
                <div class="info_div col-xs-4 col-sm-4" >
                    <h4>+<?php echo $sheet[$row['level']]['proficiency'] ?></h4>
                    <p>Proficiency</p>
                </div>
                <div class="info_div col-xs-4 col-sm-4" >
                    <h4><?php echo $sheet[0]['speed'] ?></h4>
                    <p>Speed</p>
                </div>
            </div>
            
            <div class="dice ">
                <div class="info_div col-xs-4 col-sm-4">
                    <h4><?php echo $sheet[$row['level']]['hit_point'] ?></h4>
                    <p>Max hit points</p>
                </div>
                <div class="info_div col-xs-4 col-sm-4">
                    <input class="form-control" type="number" id="hit_point" value="<?php echo $row['hit_point'] ?>" onblur="update_info(<?php echo "'user', 'hit_point', '" . $row['id'] . "'" ?>);" />
                    <p>Hit points</p>
                </div>
                <div class="info_div col-xs-4 col-sm-4">
                    <input class="form-control" type="number" id="take_hit_point" placeholder="take" onblur="take_life(<?php echo "" . $row['id'] . "" ?>);" />
                    <p>Take off hit pints</p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <?php
                
                echo other_tables('equipment', $row['id']);
                
            ?>
        </div>
        
    </div>
    
    <div class="col-sm-2"></div>
    
    <div class=" col-xs-12 col-sm-5">
        
        <div class="display row  abilty">
            <div class="top ">
                <div class="info_div col-xs-4 col-sm-4">
                    <p>Strength</p>
                    <h4><?php echo $sheet[$row['level']]['abilties']['str'] ?></h4>
                    <p><?php echo ability_mod($sheet[$row['level']]['abilties']['str'], $row['level']) ?></p>
                </div>
                <div class="info_div col-xs-4 col-sm-4">
                    <p>Dexterity</p>
                    <h4><?php echo $sheet[$row['level']]['abilties']['dex'] ?></h4>
                    <p><?php echo ability_mod($sheet[$row['level']]['abilties']['dex'], $row['level']) ?></p>
                </div>
                <div class="info_div col-xs-4 col-sm-4">
                    <p>Constitution</p>
                    <h4><?php echo $sheet[$row['level']]['abilties']['con'] ?></h4>
                    <p><?php echo ability_mod($sheet[$row['level']]['abilties']['con'], $row['level']) ?></p>
                </div>
            </div>
            <div class="bottom ">
                <div class="info_div col-xs-4 col-sm-4">
                    <p>Intelligence</p>
                    <h4><?php echo $sheet[$row['level']]['abilties']['int'] ?></h4>
                    <p><?php echo ability_mod($sheet[$row['level']]['abilties']['int'], $row['level']) ?></p>
                </div>
                <div class="info_div col-xs-4 col-sm-4">
                    <p>Wisdom</p>
                    <h4><?php echo $sheet[$row['level']]['abilties']['wis'] ?></h4>
                    <p><?php echo ability_mod($sheet[$row['level']]['abilties']['wis'], $row['level']) ?></p>
                </div>
                <div class="info_div col-xs-4 col-sm-4">
                    <p>Charisma</p>
                    <h4><?php echo $sheet[$row['level']]['abilties']['cha'] ?></h4>
                    <p><?php echo ability_mod($sheet[$row['level']]['abilties']['cha'], $row['level']) ?></p>
                </div>
            </div>
        </div>
        
        <div class="skills display row">
            <?php
                $skills = array (
                  array('Acrobatics', 'dex'),
                  array('Animal Handling', 'wis'),
                  array('Arcana', 'int'),
                  array('Athletics', 'str'),
                  array('Deception', 'cha'),
                  array('History', 'int'),
                  array('insight', 'wis'),
                  array('intimidation', 'cha'),
                  array('investigation', 'int'),
                  array('Medicine', 'wis'),
                  array('nature', 'int'),
                  array('perception', 'wis'),
                  array('performance', 'cha'),
                  array('persuasion', 'cha'),
                  array('Religion', 'int'),
                  array('Sleight of hand', 'dex'),
                  array('Stealth', 'dex'),
                  array('Survival', 'wis')
                );
                function skill_mod($start, $level) {
                    $skills = $GLOBALS['skills'];
                    $sheet = $GLOBALS['sheet'];
                    $result = "";
                    for ($x = $start; $x < $start + 9; $x++) {
                        $name = $skills[$x][0];
                        $mod = ability_mod($sheet[$level]['abilties'][$skills[$x][1]], $level);
                        $result .= "<li>$mod $name</li>";
                    }
                    return $result;
                }
            
            ?>
            <div class=" left col-xs-6 col-sm-6">
                <ul>
                    <?php
                    
                     echo skill_mod(0, $row['level']);   
                    
                    ?>
                </ul>
            </div>
            
            <div class=" right col-xs-6 col-sm-6">
                <ul>
                <?php
                    
                     echo skill_mod(9, $row['level']);   
                    
                    ?>
                </ul>
            </div>
        </div>
        
        <div class="row">
            <?php
                
                echo other_tables('attack', $row['id']);
                
            ?>
        </div>
        
    </div>
</div>




<div class="container" id="background">
    <div class="col-xs-12 col-sm-5">
        
        <div class="row background-display">
            <h4>Background stroy</h4>
            <p><?php echo $sheet[0]['story'] ?></p>
        </div>
        
        <div class="row proficiencies background-display">
            <ul>
                <li>Languages:
                <?php
                    foreach ($sheet[0]['languages'] as $value ) {
                        echo " " . $value . ", ";
                    }
                ?>
                </li>
                <li>Armor: <?php echo $sheet[0]['armor'] ?></li>
                <li>Weapons: <?php echo $sheet[0]['weapons'] ?></li>
                <li>Senses: <?php echo $sheet[0]['senses'] ?></li>
            </ul>
        </div>
    </div>
    
    <div class="col-sm-2"></div>
    
    <div class="col-xs-12 col-sm-5">
        <div class="row background-display">
            <?php
            $traits = array('personality_trait', 'ideal', 'bond', 'flaw');
            for ($x = 0; $x < count($traits); $x++) {
                ?>
            <div class="col-xs-12">
                <h4><?php echo $traits[$x] ?></h4>
                <p><?php echo $sheet[0][$traits[$x]] ?></p>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<script src="update_info.js"></script>




<?php } ?>