<?php
    session_start();
    include_once "config.php";
    $nickname = mysqli_real_escape_string($conn, $_POST['nickname']);
    if(!empty($nickname)){
        $time = time();
        $ran_id = rand(time(), 100000000);
        $status ="ACTIVE NOW";
        $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, nickname,  status)
        VALUES ({$ran_id},'{$nickname}', '{$status}')");
        if($insert_query){
            $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE nickname = '{$nickname}'");
            $result = mysqli_fetch_assoc($select_sql2);
            $_SESSION['unique_id'] = $result['unique_id'];
            echo "success";
        }


    }else{
        echo "닉네임을 넣어주세요";
    }
?>