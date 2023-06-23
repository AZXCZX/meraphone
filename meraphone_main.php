<?php
    session_start();
    include_once "php/config.php";
    if(isset($_SESSION['unique_id'])){
    };
    //ini_set( 'display_errors', '0' );
?>

<!DOCTYPE html>
<html lang="ko" class="darkmode">
    <head>
        <meta charest="UTF-8">
        <meta name="keyboards" content ="html, css">
        <link rel="stylesheet" href="./css/meraphone_main_style.css">
        <title>메라폰</title>
    </head>
    <body>
        <div class="mid_width">
            <header class="meraphone_header">
                <div class= "meraphone_head">
                    <h1 clsss="merahpone_logo_searchbar">
                        <div class = "logo">
                            <img src = sample.png alt="test_image">
                        </div>
                        <div class="searchbar">
                                <input class="main_searchbar" type="text", placeholder="검색..">
                        </div>
                    </h1>
                </div>
            </header>
            <div class="sidebar">
                <nav class="nav_clear">
                    <ul class="nav_list">
                        <li class ="nav_element">
                        <button id="making_room_open_modal" class ="making_room_button">방만들기</button>  
                        </li>
                        <li class ="nav_element">    
                            <button id="making_login_open_modal" class ="making_login_button">닉네임로그인</button>  
                        </li> 
                        <li class ="nav_element">   
                            <a class = "nav_element_hyperlink" href="php/mrp_logout.php?logout_id=<?php echo $_SESSION['unique_id']; ?>" class="logout">로그아웃하기</a>
                        </li>
                        <li class ="nav_element">
                            <button id="making_name_open_modal" class ="making_name_button">이름만들기</button>
                        </li>
                    </ul>
                </nav>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
            <div id= "making_name_modal" class = "making_name_modal_overlay">
                <div class ="making_name_modal_window">
                    <section class ="making_name">
                        <form action="#" method="POST" enctype="multipart/form-data" class ="making_name_form", autocomplete="off">
                            <div>
                                <div class="making_name_error_text_in_popup"></div>
                                <button id= "making_name_close_modal" class="making_name_close_modal_class">X</button>
                                <input type= "text" name="nickname" class="making_name_nickname_input" placeholder ="이름을 넣어주세요.." required>
                                <input type="submit" name="submit" class="making_n_button_in_popup"  value="이름정하기">
                            </div>
                        </form>
                    </section>
                </div>
                <script src="js/making_name.js"></script>
            </div>
            <div id="making_login_modal" class = "making_login_modal_overlay">
                <div class ="making_login_modal_window">
                    <form action="#" method="POST" class="login_form" autocomplete="off">
                        <div class ="login_error-text"></div>
                        <div>
                            <button id= "making_login_close_modal" class="making_login_close_modal_class">X</button>
                            <div class = "making_login_modal_title">로그인</div>
                            <input type ="text" name="nickname" placeholder="nickname" class="making_loign_nickname_input" required>
                        </div>
                        <div>
                            <input type ="text" name="unique_id" placeholder="uniqueid" class="making_loign_unique_id_input" required>
                        </div>
                        <div class = "field button">
                            <input type = "submit" name="submit" class="login_button" value="LOGIN">
                        </div>
                    </form>
                    <script src="js/mrp_login.js"></script>
                </div>
            </div>
            <div id = "making_room_modal" class = "making_room_modal_overlay">
                <div class = "making_room_modal_window">
                    <form action="#" method = "POST" class = "making_room_form_in_popup" autocomplete="off">
                        <div>
                            <button id= "making_room_close_modal" class="making_room_close_modal_class">X</button>
                            <input type ="text" name="room_name" class = "making_room_name_in_popup" placeholder="방이름 여기에..." required>
                            <button type="submit", class = "making_room_button_in_popup">방만들기2</button>
                        </div>
                    </form>
                </div>
                 <script src="js/mrp_room_making_in_popup.js"></script>
            </div>
            <div class="main_wrap">
                <div class="main_container">
                    <div class="main_list_sector">
                        <div id="room_area_test">
                            <div class="room_element">
                                <div class = "room_number">
                                    <b>155</b>
                                </div>
                                <div  class = "room_name">
                                    <b>여기는 방입니다</b>
                                </div>
                                <div class = "room_pepole_number">
                                    <b>30명</b>
                                </div>
                            
                            </div>        
                        </div>
                        <div id = "room_area">

                            
                        </div>
                    </div>
                </div>    
            </div>
        </div>
        <script src="js/mrp_show_users.js"></script>
        <script src="js/mrp_mainpage.js"></script>
    </body>
</html>



