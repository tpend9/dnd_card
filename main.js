function vis(id, func) {
    if (func == 'hide') {
        func = 'none';
    } else {
        func = 'block';
    }
    document.getElementById(id).style.display = func;
}

function select(id) {
    var tabs = ['main_info_tab', 'background_tab'];
    for (var x = 0; x < tabs.length; x++) {
        document.getElementById(tabs[x]).className = "";
    }
    document.getElementById(id).className = "active";
    
}