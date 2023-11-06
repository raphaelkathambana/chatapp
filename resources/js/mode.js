let dark = true;
function Mode() {
    if (dark) {
        document.body.className = "light";
        dark = false;
    }
    else if (!dark) {
        document.body.className = "dark";
        dark = true;
    }
}
