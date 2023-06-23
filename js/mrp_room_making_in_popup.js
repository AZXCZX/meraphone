const making_room_form_in_popup= document.querySelector(".making_room_form_in_popup"),
making_room_name_in_popup = making_room_form_in_popup.querySelector(".making_room_name_in_popup"),
making_room_button_in_popup =  making_room_form_in_popup.querySelector(".making_room_button_in_popup");

making_room_form_in_popup.onsubmit = (e) =>{
    e.preventDefault()
}

making_room_button_in_popup.onclick = () => {
    let xhr_for_room = new XMLHttpRequest();
    xhr_for_room.open("POST", "php/mrp_making_room_insert.php", true);
    xhr_for_room.onload = ()=>{
        
        if(xhr_for_room.readyState === XMLHttpRequest.DONE){
            if(xhr_for_room.status === 200){
                making_room_name_in_popup.value = "";
                $('#making_room_modal').remove()
                
            }
        }
    }
    let room_formData = new FormData(making_room_form_in_popup);
    xhr_for_room.send(room_formData);
}