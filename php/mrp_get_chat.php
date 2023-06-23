<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $room_u_i_where_msg_incoming = $_SESSION['room_unique_id'];
        $output = "";
        $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id WHERE room_u_i_where_msg_incoming = {$room_u_i_where_msg_incoming} ORDER BY 1 ASC"; 
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                $converted = date('d M Y h.i.s A', strtotime($row['Time_Stamp']));
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .=  '<li class="chating_from_me_fix">
                                    <div class ="chatername_me">'. $row['nickname'] .'</div>
                                    <div class="message_me">'. $row['msg'] .'</div>
                                    <span class="message_time_me">'. $converted .'</span>   
                                </li>';
                }else{
                    $output .= '<li class="chating_from_other_fix">
                                    <div class ="chatername_other">'. $row['nickname'] .'</div>
                                    <div class="message_other">'. $row['msg'] .'</div>
                                    <span class="message_time_other">'. $row['Time_Stamp'] .'</span>   
                                </li>';
                }
            }
        }else{
            $output .= '<div class="text">아직 아무 메세지도 없습니다</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>