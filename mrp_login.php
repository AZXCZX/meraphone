<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
    }
?>

<html>
    <head>
        <meta charest="UTF-8">
        <meta name="keyboards" content ="html, css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>메라폰 로그인</title>
    </head>
    <body>
        <form action="#" method="POST" class="login_form" enctype = "multipart/form-data" autocomplete="off">
            <div class ="error-text"></div>
            <div>
                <input type ="text" name="nickname" placeholder="nickname" required>
            </div>
            <div>
                <input type ="text" name="unique_id" placeholder="uniqueid" required>
            </div>
            <div class = "field button">
                <input type = "submit" name="submit" class="login_button" value="로그인하기">
            </div>
        </form>

        <script src="js/mrp_login.js"></script>
    </body>

</html>