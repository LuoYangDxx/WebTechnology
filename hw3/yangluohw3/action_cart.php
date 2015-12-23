<?php
error_reporting(0);

include_once('judgereferer.php');
include_once('connect.php');
include_once('common.php');
     if(isset($_GET['num']))
    {
     if(!is_numeric($_GET['num']) || $_GET['num']<=0)
    { 
    ?>

<script language="javascript">
alert("Qty is not correct");
location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";
</script>

<?php 	
    return; 
     }
    }

if($_GET['del'] && is_numeric($_GET['del']))
{
delcart($_GET['del']);
$action = "del";
}elseif($_GET['empty']==1)
{
setcookie("shopcartinfo",time()-300);
$action = "empty";	
	}elseif($_GET['add']){
addcart($_GET['add'],$_GET['num']);
$action = "add";	
}elseif($_POST['save'])
 {
$arr_pid = $_POST['pid'];
$arr_num = $_POST['num'];
foreach($arr_num as $id =>$num )
  {
	if(!is_numeric($num) || $num<=0)
	{
		?>

   <script>
   alert("QTY. is not correct!");
   location.href="cart.php";
   </script>   

		<?php 
	return ;	
		}

$cur_cart_array[$arr_pid[$id]]=$num;		
	}
	
setcookie("shopcartinfo",serialize($cur_cart_array));	
$action = "save";	

	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TITLE>Come2Us</TITLE>
<link href="images/1.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<div class="wrap">
<?php
include "header.php";
?>
<div class="title">Operate Cart</div>
<table width="100%" style="margin:0 auto" border="0">

  
  <tr>
    <td colspan="5">
    	<?php if($action =="del"){echo "Delete successfully";}
    	elseif($action=="add"){echo "Add successfully";}
    	elseif($action=="save"){echo "Save successfully";}
    	elseif($action == "empty"){echo "Empty successfully";} 
    	?>
    !</td>
  </tr>
  
 
</table>
<div style="text-align:right"><button onClick="history.go(-1);">Continue Shopping</button> <button onClick="window.location.href='cart.php'">View the Cart</button> <button onClick="window.location.href='cart-order.php'">Order</button></div>
<div class="clr">&nbsp;</div>
</div>
</body>
</html>
