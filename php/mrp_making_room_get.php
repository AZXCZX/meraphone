<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $room_number = 0;
        $room_name = "";
        $room_pepole_number= "3";
        $output_room_making = "";
        
        $sql_making_room = "SELECT * FROM rooms";
        $query_making_room = mysqli_query($conn, $sql_making_room);
        if(mysqli_num_rows($query_making_room)>0){
            while($row_making_room = mysqli_fetch_assoc($query_making_room)){
                $output_room_making .= '<div class="room_element">
                                            <div class = "room_number">
                                                <b>155</b>
                                            </div>
                                            <div  class = "room_name">
                                                <a href="mrp_room1.php?room_unique_id='. $row_making_room['room_unique_id'] .'">'. $row_making_room['room_name'] .'</a>
                                            </div>
                                            <div class = "room_pepole_number">
                                                <b>30명</b>
                                            </div>
                                    
                                        </div>'; 

            }
        }else{
            $output_room_making = "";
        }
    echo $output_room_making;    
    }
?>