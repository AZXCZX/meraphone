<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) > 2){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            $output .= '<a href="chat.php?user_id='. $row['unique_id'] .'">
                            <div>
                                <h2>접속한사람</h2>
                                <h3>'. $row['unique_id'] .'</h3>
                            </div>
                        </a>';
        }   
    }
    else{
        $output .= '<div><h2>오류</h2></div>';
    }
    echo $output;
?>