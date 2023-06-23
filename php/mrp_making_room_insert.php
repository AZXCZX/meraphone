<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $room_id_ran = rand(time(), 98765432);
        $room_name = mysqli_real_escape_string($conn, $_POST['room_name']);
        if(!empty($room_name)){
            $sql_room_id = mysqli_query($conn, "INSERT INTO rooms (room_unique_id	 ,room_name)
                                        VALUES ({$room_id_ran},'{$room_name}')") or die();
            if($sql_room_id){
                $sql2_room_id = mysqli_query($conn, "SELECT * FROM rooms WHERE room_name = '{$room_name}'");
                $result_room_id = mysqli_fetch_assoc($sql2_room_id);
                $_SESSION['room_unique_id'] =  $result_room_id['room_unique_id'];
                echo "success_insert_room_id";

            }
        }
        
    }

?>