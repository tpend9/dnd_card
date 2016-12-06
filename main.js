function vis(id, func) {
    if (func == 'hide') {
        func = 'none';
    } else {
        func = 'block';
    }
    document.getElementById(id).style.display = func;
}