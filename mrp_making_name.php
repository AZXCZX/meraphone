<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
    }
?>

<html lang="ko" class="darkmode">
    <head>
        <meta charest="UTF-8">
        <meta name="keyboards" content ="html, css">
        <link rel="stylesheet" href="./css/meraphone_main_style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>메라폰_이름설정페이지</title>
    </head>
    <body>
        <section class ="making_name">
            <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="error-text"></div>
                <input type= "text" name="nickname" required>
                <input type="submit" name="submit" class="field_button" value="이름정하기">
            </form>
        </section>
        <div>
            <a href="mrp_room1.php">테스트</a>
        </div>
        <script src="js/making_name.js"></script>
    </body>
</html>