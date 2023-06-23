const making_name_form = document.querySelector(".making_name_form"),
making_n_button_in_popup = making_name_form.querySelector(".making_n_button_in_popup"),
making_name_error_text_in_popup = making_name_form.querySelector(".making_name_error_text_in_popup");

making_name_form.onsubmit = (e)=>{
    e.preventDefault();
}

making_n_button_in_popup.onclick = ()=>{
    let making_name_xhr = new XMLHttpRequest();
    making_name_xhr.open("POST", "php/mrp_making_n_h.php", true);
    making_name_xhr.onload = ()=>{
        if(making_name_xhr.readyState === XMLHttpRequest.DONE){
            if(making_name_xhr.status === 200){
                let making_name_data = making_name_xhr.response;
                if(making_name_data ==="success"){
                    $('#making_name_modal').remove()
                    return false;
                }else{
                    making_name_error_text_in_popup.style.display = "block";
                    making_name_error_text_in_popup.textContent = data;
                }
            }
        }
    }
    let making_nameformData = new FormData(making_name_form);
    making_name_xhr.send(making_nameformData);
}