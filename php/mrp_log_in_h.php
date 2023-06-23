<?php
    session_start();
    include_once "config.php";
    $nickname = mysqli_real_escape_string($conn, $_POST['nickname']);
    $unique_id = mysqli_real_escape_string($conn, $_POST['unique_id']);
    if(!empty($nickname) && !empty($unique_id)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE nickname = '{$nickname}'");
        if(mysqli_num_rows($sql)>0){
            $row = mysqli_fetch_assoc($sql);
            $enc_unique_id = $row['unique_id'];
            if($unique_id  === $enc_unique_id){
                $status = "ACTIVE NOW";
                $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                if($sql2){
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo "success";
                }else{
                    echo "비밀번호에러2";
                }
            }else{
                echo "비밀번호에러1";
            }
        }else{
            echo "닉네임맞는거없음";
        }
    }else{
        echo "전부 입력해 주세요";
    }
?>