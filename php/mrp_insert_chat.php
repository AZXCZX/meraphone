<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $room_u_i_where_msg_incoming = $_SESSION['room_unique_id'];
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg, room_u_i_where_msg_incoming)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}',{$room_u_i_where_msg_incoming})") or die();
        }
    }else{
        header("location: ../mrp_making_name.php");
    }
?> 