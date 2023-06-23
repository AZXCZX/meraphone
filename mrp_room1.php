<?php
    session_start();
    include_once "php/config.php";
    if(!isset($_SESSION['unique_id'])&&!isset($_SESSION['room_unique_id'])){
        header("location: mrp_making_name.php");
    }
?>


<html>
    <head>
        <meta charest="UTF-8">
        <meta name="keyboards" content ="html, css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="./css/mrp_room1_style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <title>메라폰.방1</title>
    </head>
    <body>
        <?php
            $_SESSION['room_unique_id'] = mysqli_real_escape_string($conn, $_GET['room_unique_id']);
            $room_unique_id_current = $_SESSION['room_unique_id'];
            $sql_room_unique_id = "SELECT * FROM rooms WHERE room_unique_id = $room_unique_id_current";
            $query_room_uniuqe_id = mysqli_query($conn, $sql_room_unique_id);
            $row_room_uniuqe_id = mysqli_fetch_assoc($query_room_uniuqe_id);
            $room_unique_id = $row_room_uniuqe_id['room_unique_id'];
            $outgoing_id = $_SESSION['unique_id'];
            $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($query);
            $user_id = $row['unique_id'];
        ?>
        <div class="mid_width">
            <header class="meraphone_header">
                <div class= "meraphone_head">
                    <h1 clsss="merahpone_logo_searchbar">
                        <div class = "logo">
                            <img src = sample.png alt="test_image">
                        </div>
                        <div class="room_name">
                            <b class ="roon_name_text">테스트방</b>
                        </div>
                    </h1>
                </div>
            </header>
            <div class="main_wrap">
                <div class="main_container">
                    <div class="chat_wrap" id="chatView">
                        <ul class="chating_area">
                            <li class="chating_from_other_fix">
                                <div class ="chatername_other">
                                    <b>사람2</b><?php echo $_SESSION['room_unique_id'] ?>
                                </div>
                                <div>
                                <div class="message_other">안녕 어떻게 지네니</div>
                                <span class="message_time_other">10:20 오전</span>    
                            </li>
                            <li class="chating_from_me_fix">
                                <div class ="chatername_me">
                                    <b>나</b>
                                </div>
                                <div class="message_me">잘니낸다 너는</div>
                                <span class="message_time_me">10:25 오전</span> 
                                    
                            </li>
                            <li class="chating_from_me_fix">
                                <div class ="chatername_me">
                                    <b>나</b>
                                </div>
                                <div class="message_me">아 맞다 그거 들고옴?</div>
                                <span class="message_time_me">10:25 오전</span>     
                            </li>
                            <li class="chating_from_me_fix">
                                <div class ="chatername_me">
                                    <b>나</b>
                                </div>
                                <div class="message_me">아 맞다 그거 들고옴?</div>
                                <span class="message_time_me">10:25 오전</span>     
                            </li>
                        </ul>
                        <ul class ="chating_area" id="chat-box">

                        </ul>
                        <div class="message_send_box_fix">
                            <div class="message_send_box">
                                <div class="plus_button">
                                    <span class="material-symbols-outlined">add</span>
                                </div>
                                    <form class="message_form" action="#">
                                        <div>
                                            <input type="text" class="room_unique_id" name="room_unique_id" value="<?php echo $room_unique_id; ?>" hidden>
                                            <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                                            <input type="text" name="message" class="messagebox" autocomplete="off">
                                            <button type="submit",id="send" class="send_message"><span id="send_icon" class="material-symbols-outlined">send</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/mrp_chat.js"></script>
    </body>
</html>
