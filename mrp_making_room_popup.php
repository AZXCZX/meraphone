<?php
    session_start();
    if(isset($_SESSION['uniuqe_id'])){
        
    }
?>
<html>
    <head>
        <meta charest="UTF-8">
        <meta name="keyboards" content ="html, css">
        <link rel="stylesheet" href="./css/mrp_making_room_popup.css">
        <title>메라폰 방만들기</title>
    </head>
    <body>
        <form action="#" method = "POST" class = "making_room_form_in_popup" autocomplete="off">
            <input type ="text" name="room_name" class = "making_room_name_in_popup" required>
            <button type="submit", class = "making_room_button_in_popup">방만들기2</button>
        </form>
    </body>
    <script src="js/mrp_room_making_in_popup.js"></script>

</html>




