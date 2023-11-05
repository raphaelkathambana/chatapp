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

// function show_light(){
//     if (dark == true) {
//         document.body.className = "light";
//         dark = false;
//     }
// }
// function show_dark(){
//     if (dark == false) {
//         document.body.className = "dark";
//         dark = true;}
//     document.getElementById('MyImage').src='img/two.jpg';
// }
