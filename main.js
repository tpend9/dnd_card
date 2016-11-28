function edit_func (func) {
    change_info(func, 'func');
    document.getElementById(func).style.backgroundColor = "red";

    if (func == "edit") {
        document.getElementById('delete').style.backgroundColor = 'white';
    } else if (func == 'delete') {
        document.getElementById('edit').style.backgroundColor = "white";

    }
}

function lightbox_vis(func, info) {
    if (func == "show") {
        var func = 'block';
    } else if (func == "hide") {
        var func = 'none';
    }
    document.getElementById('lightbox').style.display = func;
    document.getElementById(info).style.display = func;
}
function change_info (info, id) {
    document.getElementById(id).value = info;
}

function show_edit(table, user_id, id, info_1, info_2, info_3, head_1, head_2, head_3, func, info) {
    
    if (func == "new") {
        document.getElementById('edit').style.display = 'none';
        document.getElementById('delete').style.display = 'none';
    } else {
        document.getElementById('edit').style.display = 'block';
        document.getElementById('delete').style.display = 'block'; 
    }
    
    
    change_info(info_1, 'info_1');
    change_info(info_2, 'info_2');
    change_info(info_3, 'info_3');
    change_info(func, 'func');
    change_info(id, "id");
    change_info(user_id, "user_id");
    change_info(table, 'table');
    document.getElementById('head_1').innerHTML = head_1;
    document.getElementById('head_2').innerHTML = head_2;
    document.getElementById('head_3').innerHTML = head_3;
    
    document.getElementById('title').innerHTML = table;
    lightbox_vis('show', info);
}

function life_vis(info_1, info_2, info_3, info_4, id) {
    change_info(info_1, 'hit_point');
    change_info(info_2, 'armor');
    change_info(info_3, 'max_hit_point');
    change_info(info_4, 'hit_dice');
    change_info(id, "life_id");
    lightbox_vis('show', 'edit_life');
}