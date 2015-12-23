<?php
$servername=$HTTP_SERVER_VARS['SERVER_NAME'];   
$sub_from=$HTTP_SERVER_VARS["HTTP_REFERER"];   
$sub_len=strlen($servername);   
$checkfrom=substr($sub_from,7,$sub_len);   
if($checkfrom!=$servername){  
?>  
  <script language="JavaScript" type="text/javascript">
 location.href="index.php";
  </script>
<?php  } 