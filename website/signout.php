<?php
/**
 * Created by PhpStorm.
 * User: sws1991
 * Date: 2015/3/3
 * Time: 22:46
 */
session_start();
if(isset($_SESSION['email']) || isset($_SESSION['password'])){
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    echo "<script>window.location.href='index.php'</script>";
} else {
    echo "<script language=javascript>history.back();</script>";
}