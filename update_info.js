


function update_info(table, id, user_id) {
    if (table == 'equipment') {
        var str = document.getElementById('quantity_' + id).value;
        id = "quantity";
    } else {
        var str = document.getElementById(id).value;
    }
    
    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("alert_display").innerHTML = this.responseText;
            }
        };
    
    xmlhttp.open("GET", "edit_info.php?table=" + table + "&id=" + id + "&user_id=" + user_id + "&str=" + str, true);
    xmlhttp.send();
    
    
}


function take_life(id) {
    var take_num = document.getElementById('take_hit_point').value;
    var old_num = document.getElementById('hit_point').value;
    var new_num = old_num - take_num;
    document.getElementById('take_hit_point').value = "";
    document.getElementById('hit_point').value = new_num;
    update_info('user', 'hit_point', id);
}

function remove_info(table, id) {
    document.getElementById(table + "_" + id).style.display = "none";
    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.open("GET", "remove_element.php?table=" + table + "&id=" + id, true);
    xmlhttp.send();
}

function update_equipment(id, user_id) {
    var new_id = "quantity_" + id;
    var num = document.getElementById(new_id).value;
    
    if (num <= 0) {
        remove_info('equipment', id);
    } else {
        update_info('equipment', id, id);
    }
}