function showFrom(formId){
    document.getElementById("form-box").forEach(form => form.classList("active"));
    document.getElementById(formId).classList.add("active");
}
