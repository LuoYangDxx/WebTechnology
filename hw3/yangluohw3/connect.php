<?php
ob_start();session_start();

setcookie(session_name(), session_id(), time() + 1200);

mysql_connect('127.0.0.1:36841','root','1521');
mysql_select_db('hw4');
mysql_query('hw4');

?>