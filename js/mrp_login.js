const login_form = document.querySelector(".login_form"),
login_button = login_form.querySelector(".login_button"),
login_errorText = login_form.querySelector(".login_error-text");

login_form.onsubmit = (e) => {
    e.preventDefault();
}
login_button.onclick = () => {
    let login_xhr = new XMLHttpRequest();
    login_xhr.open("POST", "php/mrp_log_in_h.php", true);
    login_xhr.onload = ()=> {
        if(login_xhr.readyState === XMLHttpRequest.DONE){
            if(login_xhr.status === 200){
                alert("bb");
                let login_data = login_xhr.response;
                if(login_data === "success"){
                    $('#making_login_modal').remove()
                }else{
                    login_errorText.style.display = "block";
                    login_errorText.textContent = data;
                }
            }
        }
    }
    let login_formData = new FormData(login_form);
    login_xhr.send(login_formData);
}