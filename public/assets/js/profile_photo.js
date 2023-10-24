let imageView = document.querySelector("#raw_image");
let inputFile = document.querySelector("#input_file");
let submitBtn = document.querySelector("#done_submit");
let avatarFormPath = document.querySelector("#avatar_input")

inputFile.addEventListener("change", handleEdit);
function handleClickAvatar(name) {
    imageView.src = `avatars/${name}.png`;
    avatarFormPath.value = `${name}.png`;

}

function activateFileInput() {
    inputFile.click();
}

function handleEdit() {
    let input = inputFile;
    console.log(input.files);
    if (input.files.length) {
        let localUrl = window.URL.createObjectURL(input.files[0]);
        console.log(localUrl);
        imageView.src = localUrl; 
    }
}

function activateSubmit() {
    submitBtn.click();
}