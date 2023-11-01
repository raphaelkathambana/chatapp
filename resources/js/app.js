var dark = true;
function Mode() {
    if (dark == true) {
        document.body.className = "light";
        dark = false;
    }
    else if (dark == false) {
        document.body.className = "dark";
        dark = true;
    }
}
