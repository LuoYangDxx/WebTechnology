<?php ob_start(); session_start(); ?>
<?php
if(isset($_SESSION['userid'])){
    $_SESSION = array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),'',time()-3600);
    }
    session_destroy();
}
header("Location: prelogin.html");
?>