function showFrom(){
    document.querySelectorAll(".form-box").forEach(form => form.classList.toggle("active"));
}

function showPassword(){
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}