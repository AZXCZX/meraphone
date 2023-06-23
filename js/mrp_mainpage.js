const room_area = document.querySelector("#room_area"),
making_room_modal = document.getElementById("making_room_modal"),
making_room_open_modal = document.getElementById("making_room_open_modal"),
making_room_close_modal = document.getElementById("making_room_close_modal"),
making_login_modal = document.getElementById("making_login_modal"),
making_login_open_modal = document.getElementById("making_login_open_modal"),
making_login_close_modal = document.getElementById("making_login_close_modal"),
making_name_modal = document.getElementById("making_name_modal"),
making_name_open_modal = document.getElementById("making_name_open_modal"),
making_name_close_modal = document.getElementById("making_name_close_modal");


making_room_open_modal.addEventListener("click", () => {
    making_room_modal.style.display="flex";
    document.body.style.overflow = "hidden";;
});

making_room_close_modal.addEventListener("click", () =>{
    making_room_modal.style.display="none";
    document.body.style.onverflow="auto";
});

making_room_modal.addEventListener("click", e => {
    const modal_room_evTarget = e.target
    if(modal_room_evTarget.classList.contains("making_room_modal_overlay")) {
        making_room_modal.style.display = "none"
    }
})

window.addEventListener("keyup", e => {
    if(making_room_modal.style.display === "flex" && e.key === "Escape") {
        making_room_modal.style.display = "none"
    }
})

making_login_open_modal.addEventListener("click", () => {
    making_login_modal.style.display="flex";
    document.body.style.overflow = "hidden";;
});

making_login_close_modal.addEventListener("click", () =>{
    making_login_modal.style.display="none";
    document.body.style.onverflow="auto";
});

making_login_modal.addEventListener("click", e => {
    const modal_login_evTarget = e.target
    if(modal_login_evTarget.classList.contains("making_login_modal_overlay")) {
        making_login_modal.style.display = "none"
    }
})

window.addEventListener("keyup", e => {
    if(making_login_modal.style.display === "flex" && e.key === "Escape") {
        making_login_modal.style.display = "none"
    }
})

making_name_open_modal.addEventListener("click", () => {
    making_name_modal.style.display="flex";
    document.body.style.overflow = "hidden";;
});

making_name_close_modal.addEventListener("click", () =>{
    making_name_modal.style.display="none";
    document.body.style.onverflow="auto";
});

making_name_modal.addEventListener("click", e => {
    const modal_name_evTarget = e.target
    if(modal_name_evTarget.classList.contains("making_name_modal_overlay")) {
        making_name_modal.style.display = "none"
    }
});

window.addEventListener("keyup", e => {
    if(making_name_modal.style.display === "flex" && e.key === "Escape") {
        making_name_modal.style.display = "none"
    }
})




setInterval(() => {
    let xhr_get_room_name = new XMLHttpRequest();
    xhr_get_room_name.open("POST", "php/mrp_making_room_get.php",true)
    xhr_get_room_name.onload = ()=>{
        if(xhr_get_room_name.readyState === XMLHttpRequest.DONE){
            if(xhr_get_room_name.status === 200){
                let data = xhr_get_room_name.response;
                room_area.innerHTML = data;
                
                
            }
        }
    }
    xhr_get_room_name.send()
}, 500);

