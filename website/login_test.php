<?php
session_start();
$_SESSION['timeout'] = time();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $errmsg='';
    if(strlen($email) == 0){
        $errmsg='Invalid login';
    }
    if(strlen($password) == 0){
        $errmsg = 'invalid login';
    }
    if(strlen($email)>0 && strlen($password)>0){
        $sql = "select * from users where email='".$email ."' and password='".$password ."';";
        $con = mysql_connect('localhost:8889', 'root', 'root');
        if( !$con ){
            //DB connect request failed
            $errmsg='Could not connect to the database';
        }
        mysql_select_db('deviserinstruments', $con);
        $res = mysql_query($sql);
        if( !($row=mysql_fetch_array($res))){
            //No rows retrieved
            $errmsg = 'Invalid login';
        } else {
            // login successfully
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            echo "<script>window.location.href='index.php'</script>";
        }
        mysql_close($con);

    }
$_SESSION['errmsg'] = $errmsg;
if($errmsg != '') {
    echo "<script language=javascript>history.back();</script>";
}