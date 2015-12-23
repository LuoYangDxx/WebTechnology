<?php  
function antisqlin($pcon){
 $sqlindb = array('cast', 'set', 'exec', 'insert', 'select', 'delete', 'update', 'execute', 'from', 'declare', 'varchar', 'script', 'iframe');
 foreach($sqlindb as $invalue){
    $pcon = str_ireplace($invalue,"",$pcon);
 }
 return $pcon;
}

function addcart($goods_id,$goods_num){
	$goods_id=$goods_id;
	$goods_num=$goods_num;
    
if(!get_magic_quotes_gpc()){	
$cur_cart_array = unserialize($_COOKIE['shopcartinfo']); 
$cur_cart_array_size = unserialize($_COOKIE['shopcartsize']); 
}else{
$cur_cart_array = unserialize(stripslashes($_COOKIE['shopcartinfo'])); 
$cur_cart_array_size = unserialize(stripslashes($_COOKIE['shopcartsize'])); 	
	
	}

if(empty($cur_cart_array)){
	$cur_cart_array[$goods_id]=$goods_num;
	
	setcookie("shopcartinfo",serialize($cur_cart_array));
	
	}else{
		  $cur_cart_array[$goods_id]=$cur_cart_array[$goods_id]+$goods_num;
	
		setcookie("shopcartinfo",serialize($cur_cart_array));
		
		}
}

function delcart($goods_id){
	$goods_id=$goods_id;
	$goods_num=$goods_num;
    
if(!get_magic_quotes_gpc()){	
$cur_cart_array = unserialize($_COOKIE['shopcartinfo']); 
$cur_cart_array_size = unserialize($_COOKIE['shopcartsize']); 
}else{
$cur_cart_array = unserialize(stripslashes($_COOKIE['shopcartinfo'])); 
$cur_cart_array_size = unserialize(stripslashes($_COOKIE['shopcartsize'])); 	
	
	}

if(!empty($cur_cart_array)){
	unset($cur_cart_array[$goods_id]);
	
	setcookie("shopcartinfo",serialize($cur_cart_array));
	
	}
}

?>