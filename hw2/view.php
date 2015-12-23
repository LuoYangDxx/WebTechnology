<?php ob_start(); session_start(); ?>
<?php
    $currUser=$_SESSION['userid'];
    if(!$currUser) {header("Location: logout.php");}
	$_SESSION['userid']=$currUser;
	$searchfield=$_GET['searchfield'];
	$lowp=$_GET['lowp'];
	$topp=$_GET['topp'];
	$pname=$_GET['pname'];
	$cate=$_GET['cate'];
	$type=$_GET['type'];
	$payl=$_GET['payl'];
	$payt=$_GET['payt'];
	$lowsp=$_GET['lowsp'];
	$topsp=$_GET['topsp'];
	$spname=$_GET['spname'];
	$scate=$_GET['scate'];
	$sdate=$_GET['sdate'];
	$edate=$_GET['edate'];
	$con=mysql_connect('127.0.0.1:36841','root','1521');

    if(!$con)
      die("Connect Fail");
      mysql_select_db('hw3',$con);
	
   if($searchfield=='Product')
	 { 
	  if($lowp=='') $lowp=0;
	  if($topp=='') $topp=99999;
	  $sql1="select * from Cate where CateName='$cate'";
	  $res1=mysql_query($sql1);
	  if($row1=mysql_fetch_assoc($res1))
	   {
	    $cid=$row1['CateId'];
	    if($pname=='')
	    $sql2="select * from Product where CategoryId='$cid'and ProductPrice<=".$topp." and ProductPrice>= ".$lowp;
	    else $sql2="select * from Product where ProductName like '%".$pname."%' and CategoryId='$cid' and ProductPrice<=".$topp." and ProductPrice>= ".$lowp;
	   }
	   else
	   {
	    if($pname=='')
	    $sql2="select * from Product where ProductPrice<=".$topp." and ProductPrice>= ".$lowp;
	    else $sql2="select * from Product where ProductName like '%".$pname."%' and ProductPrice<=".$topp." and ProductPrice>= ".$lowp;
	   }
	  $res2=mysql_query($sql2);
	   echo "<div id='Pro' style='position:relative;left:50px;'>
	        <h2>Product</h2>
	        <table border='2' bordercolor='7FB802' style='border-collapse:collapse;'><caption></caption>
			<tr class='tr1'>
            <th class='table1'>ProductName</th>
            <th class='table1'>Price</th>
            <th class='table1'>Category</th>
            <th class='table1'>Description</th>
            </tr>
	   ";
	  while($row2=mysql_fetch_assoc($res2))
	  {
	    $cid=$row2['CategoryId'];
	    $sql3="select * from Cate where CateId='$cid'";
	    $res3=mysql_query($sql3);
	    $row3=mysql_fetch_assoc($res3);  
	    echo "<tr class='tr1'>"; 
        echo "<td class='td'>".$row2['ProductName']."</td>";
        echo "<td class='td'>".$row2['ProductPrice']."</td>";
        echo "<td class='td'>".$row3['CateName']."</td>";
        echo "<td class='td'>".$row2['Description']."</td>";
        echo "</tr>";
	  }
	   echo "</table></div>";
	}
	else if($searchfield=='Employee')
	{
	 if($payl=='') $payl=0;
	 if($payt=='') $payt=999999;
	 if(strlen($type)>0)
	 $sql1="select * from User where Type='$type' and Payments<=".$payt." and Payments>=".$payl;
	 else $sql1="select * from User where Payments<=".$payt." and Payments>=".$payl;
	 
	 echo "<div id='User' style='position:relative;left:50px;'>
	        <h2>Employee</h2>
	        <table border='2' bordercolor='7FB802' style='border-collapse:collapse;'><caption></caption>
			<tr class='tr1'>
            <th class='table1'>Last Name</th>
            <th class='table1'>First Name</th>
            <th class='table1'>Age</th>
            <th class='table1'>Type</th>
			<th class='table1'>Payment</th>
            </tr>
	   ";
	   $res1=mysql_query($sql1);
	 while($row1=mysql_fetch_assoc($res1))
	  {
       echo "<tr class='tr1'>"; 
       echo "<td class='td'>".$row1['LastName']."</td>";
       echo "<td class='td'>".$row1['FirstName']."</td>";
       echo "<td class='td'>".$row1['Age']."</td>";
       echo "<td class='td'>".$row1['Type']."</td>";
	   echo "<td class='td'>".$row1['Payments']."</td>";
       echo "</tr>";
      }
      echo "</table></div>";
	}

   else if($searchfield=='Special')
   {
	  if($lowsp=='') $lowsp=0;
	  if($topsp=='') $topsp=999999;
	  $sql1="select * from Cate where CateName='$scate'";
	  $res1=mysql_query($sql1);
	  if($row1=mysql_fetch_assoc($res1))
	  {
	   $cid=$row1['CateId'];
	   if($spname!='')
	   $sql2="select * from Product where ProductName like '%".$spname."%' and CategoryId='$cid' and ProductPrice<=".$topsp." and ProductPrice>= ".$lowsp ;
	   else $sql2="select * from Product where CategoryId='$cid'and ProductPrice<=".$topsp." and ProductPrice>=".$lowsp ;
	  }else
	  {
	  if($spname!='')
	   $sql2="select * from Product where ProductName like '%".$spname."%' and ProductPrice>= ".$lowsp." and ProductPrice<=".$topsp;
	   else $sql2="select * from Product where ProductPrice>=".$lowsp." and ProductPrice<=".$topsp;
	  }
	  $res2=mysql_query($sql2);
	   echo "<div id='Special' style='position:relative;'>
	        <h2>Special Sales</h2>
	        <table border='2' bordercolor='7FB802' style='border-collapse:collapse;'><caption></caption>
			<tr class='tr1'>
            <th class='table1'>ProductName</th>
            <th class='table1'>ProductPrice</th>
            <th class='table1'>Category</th>
			<th class='table1'>Discount</th>
			<th class='table1'>TheStartDate</th>
			<th class='table1'>TheEndDate</th>
            </tr>
	   ";
	  while($row2=mysql_fetch_assoc($res2))
	 {
	  $pid=$row2['ProductId'];
	  if(strlen($sdate)>0&&strlen($edate)>0)
	  $sql4="select * from Special where ProductId='$pid' and StartDate='$sdate' and EndDate='$edate' and Discount>0";
	  else if(strlen($sdate)>0&&strlen($edate)==0)
	  $sql4="select * from Special where ProductId='$pid' and StartDate='$sdate' and Discount>0";
	  else if(strlen($sdate)==0&&strlen($edate)>0)
	  $sql4="select * from Special where ProductId='$pid' and EndDate='$edate' and Discount>0";
	  else if(strlen($sdate)==0&&strlen($edate)==0)
	  $sql4="select * from Special where ProductId='$pid' and Discount>0";

	  $res4=mysql_query($sql4);
	  $row4=mysql_fetch_assoc($res4);
	  $spid=$row4['ProductId'];
	  $sql5="select * from Product where ProductId='$spid'";
	  $res5=mysql_query($sql5);
	  $row5=mysql_fetch_assoc($res5);
	  $cid=$row5['CategoryId'];
	  $sql3="select * from Cate where CateId='$cid'";
	  $res3=mysql_query($sql3);
	  $row3=mysql_fetch_assoc($res3);
      $today=date("y-m-d");
      $start=$row4['StartDate'];
      $end=$row4['EndDate'];
      $discount=0;
      $price=$row5['ProductPrice'];
      if(strtotime($today)<strtotime($end)&&strtotime($today)>strtotime($start))
      {
      $discount=$row4['Discount'];
      $price=$price-$discount*$price/100;
      }

	  if($row5)
	   {
	   echo "<tr class='tr1'>"; 
       echo "<td class='td'>".$row5['ProductName']."</td>";
       if($price!=$row5['ProductPrice'])
       echo "<td class='td1'>".$price."</td>";
       else
       echo "<td class='td'>".$price."</td>";
       echo "<td class='td'>".$row3['CateName']."</td>";
       echo "<td class='td'>".$row4['Discount']."%</td>";
       echo "<td class='td'>".$row4['StartDate']."</td>";
       echo "<td class='td'>".$row4['EndDate']."</td>";
       echo "</tr>";
	   }
     }
	   echo "</table></div>";
   }
?>