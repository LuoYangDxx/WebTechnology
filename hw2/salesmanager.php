<?php ob_start(); session_start(); ?>
<?php
$currUser=$_SESSION['userid'];
if(!$currUser) {header("Location: logout.php");}
$inactive = 600;
// check to see if $_SESSION['timeout'] is set
if(isset($_SESSION['timeout']) ) {
  $session_life = time() - $_SESSION['timeout'];
  if($session_life > $inactive)
        { session_destroy(); header("Location: logout.php"); }
}
$_SESSION['timeout'] = time();

  $con=mysql_connect('127.0.0.1:36841','root','1521');
  if(!$con)
  die("Connect Fail");
  mysql_select_db('hw3',$con);
  $sql="select * from Product";
  $res=mysql_query($sql);
  $sql2="select * from Cate";
  $res2=mysql_query($sql2);
?>
<html>
<head>
<style>
body {
  height: 100%;
  margin: 0;
  padding: 0;
  background: #FFFAF4;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 12px;
  color: #4A513D;
}
.button {
	background-image: url(images/login_07.gif);

}
th.table1{
	background-image: url(images/tab_14.gif);
	letter-spacing: 1px;
	padding: 5px;
}
tr.tr1{
	cellspacing:1;
}
td.td{
padding: 3px;
}
td.td1{
  text-align: center;
  color: red;
}
td.td2{
  text-align: center;
  padding-left: 6px;
  padding-top: 6px;
  padding-bottom: 6px;
  padding-right: 6px;
}
div.lsidebar{
  background:#AAE74A;
  position:absolute;
  width:300px;
  height:100%;
}
div.rsidebar{
  background:#AAE74A;
  float:right;
  width:220px;
  height:100%;
}
div.inner1{
  margin-left:25px;
  margin-top: 30px;
  width:250px; 
  height:350px;
  border:1px solid #009966;
  background: #FFF4C1;
}
div.inner2{
  margin-left:25px;
  margin-top: 30px;
  width:250px; 
  height:140px;
  background: #FFF4C1;
  border:1px solid #009966;
}
div.inner4{
  width:100%; 
  height:25px;
  background: #8C8C00;
}
</style>
</head>
<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="36" background="images/main_07.gif">
      <table width="100%" border="0"cellspacing="0" cellpadding="0">
      <tr>
        <td width="290" height="52" background="images/main_05.gif">&nbsp;   
        </td> <td><p><b>This is my Company system!</p><b></td>
        <td style='text-align:center;'> 
          <img src="images/quit.gif" width="25" height="25" >&nbsp;&nbsp;<span><a href='logout.php' style='font-size:25px'>Log Out</span>
       </tr>
      </table>
    </td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td height="20" background="images/main_07.gif"></td></tr>
</table>

<div class="lsidebar">  
<p style='text-align:center;margin-top:30px;'>
  <img src="images/uesr.gif" width="50" height="50" >
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <img src="images/home.gif" width="50" height="50" >
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <img src="images/edit.png" width="50" height="50" >
  <br>
</p>

<div class="inner1"><div class="inner4"></div>


<div id='operate'style="text-align:center;">
  <h2>Sales Operation!</h2>
  <br><br>
  <input type='button' class='button' value='Add' style='width:100px;' onClick='addPro()'><br><br>
  <input type='button' class='button' value='Edit' style='width:100px;' onClick='editPro()'/><br><br>
  <input type='button' class='button' value='Delete' style='width:100px;' onClick='deletePro()'/><br><br>
  <input type='button' class='button' value='Category' style='width:100px;' onClick='ecategory()'><br><br>
  <input type='button' class='button' value='Discount' style='width:100px;' onClick='setSales()'>
</div>


<!--addpro-->
<div id='addPro'style='text-align:center;background-color:FFF4C1;display:none;width:245px;margin-top:10px;'>
<p style="text-align:center;"><b>Add product!</b></p>
<form id='form2' style="text-align:center;margin-top:20px;">
<label for='ProductName'>Product Name:</label> <input type='text' id='addName'style='width:80px;'>
<br><br>
<label for='price'>Product Price:</label> <input type='text' id='addPrice'style='width:80px;'>
<br><br>
<label for='category'>Category:</label> 
<select id='addcate'><option></option></select>
<br><br>
<label far='description'>Description:</label> 
<textarea rows='3' cols='20' id='addds'></textarea>
<br><br><br>
<div style='text-align:center;'>
<input type='button' class='button' value='create' onClick='createPro()'>
<input type='button' class='button' value='Cancel' onClick='back()'>
</div>
</form>
</div>

<!-- edipro div-->
<div id='editPro'style='text-align:center;background-color:FFF4C1;display:none;width:245px;margin-top:10px;'>
<p style="text-align:center;"><b>Edit product!</b></p>
<form id='form1' style="text-align:center;margin-top:20px;">
<label for='ProductName'>Product Name:</label> <input type='text' style='width:80px;'id='newName'>
<br><br>
<label for='price'>Product Price:</label> <input type='text' style='width:80px;'id='newPrice'>
<br><br>
<label for='category'>Category:</label> 
<select id='cate'><option></option></select>
<br><br>
<label far='description'>Description:</label> 
<textarea rows='3' cols='20' id='newds'></textarea>
<br><br><br>
<div style='text-align:center;'>
  <input type='button' class='button' value='new' onClick='newPro()'>
  <input type='button' class='button' value='Cancel' onClick='back()'>
</div>
</form>
</div>



<!-- setsales div-->
<div id='setSales'style='background-color:FFF4C1;display:none;width:245px;margin-top:10px;'>
<p style="text-align:center;"><b>Set Special Sales!</b></p>
<form id='form4' style="text-align:center;margin-top:20px;">
<br><br>
<label far='Discount'>Discount:</label>
<input type='text' size='5' id='setDis' onBlur='checkDis()'><span>%</span>
&nbsp;&nbsp;&nbsp;&nbsp;
<br><br><label far='Start'>Start Date:</label>
<input type='text' id='start' onBlur='checkDate()'>
&nbsp;&nbsp;&nbsp;&nbsp;
<br><br><label far='End'>End Date:</label><input type='text' id='end' onBlur='checkDate()'>
<br><br>
<div style='text-align:center;'>
  <input type='button' class='button' value='Sure!' onClick='discount()'>
  <input type='button' class='button' value='Cancel' onClick='back()'>
</div>
</form>
</div>


<!--category-->
<div id='category' style='background-color:FFF4C1;display:none;width:245px;margin-top:10px;'>
<p style="text-align:center;"><b>Change Category!</b></p>
<form id='form3' style="text-align:center;margin-top:20px;">

<?php while($row2=mysql_fetch_assoc($res2))
{
echo "&nbsp;&nbsp;<input type='radio'name='cn'/>".$row2['CateName']."<span></span>";
}
?>
<br><br>
<div id='operateC' style='margin-top:5px;'>
  <input type='button' class='button' value='Add' onClick='addCate()'>
  <input type='button' class='button' value='Edit'onClick='editCate()'/>
  <input type='button' class='button' value='Delete' onClick='deleteCate()'/>
  <input type='button' class='button' value='Back' onClick='back()'>
</div>
<br>
<div style='display:none;text-align:center;' id='CAE'>
  <label for='CateName'>Category Name:</label>
  <input type='text'id='aeCate'>
  <label for='Description'>Description</label>
  <input type='text'id='deCate'><br><br>
    <input type='button' class='button' value='OK' onClick='adetCate()'>
    <input type='button' class='button' value='Cancel' onClick='backCate()'>
</div>
</form>
</div>


</div>
  <div class="inner2"><div class="inner4"></div>
  <p style="text-align:center;font-size:15px;"><b>Welcome!</b></p>
  <p style="text-align:center;font-size:15px;">This is MY Supermarket!<br>
  You can do Operations.<br>Also you can log out.<br>
 </p>
</div>
</div>


<div class="rsidebar">
 <p style="text-align:center;font-size:20px;"><b>Our Location:</b><br><br>
New York<br><img src="images/1.jpg"><br><br>
Los Angeles<br><img src="images/2.jpg"><br><br>Chicago<br><img src="images/3.jpg">
</p>
</div>

<?php
  echo "<h2 style='text-align:center;'>
  Welcome! Sale Manager:&nbsp;&nbsp;YourID:&nbsp;&nbsp;<span id='userspan'>".$currUser."</span></h2>";
?>

<!--The menu div -->

<div id='menu'style='margin-left:350px;margin-top:20px;width:1000px;'>
<p style='font-size:15px;text-align:center'><b>Products Menu</b></p>
<table border="2" bordercolor="7FB802" style="border-collapse:collapse;">
<tr class="tr1">
<th class="table1">ProductName</th>
<th class="table1">Price</th>
<th class="table1">Category</th>
<th class="table1">Description</th>
<th class="table1">Discount</th>
<th class="table1">Startdate</th>
<th class="table1">Enddate</th>
</tr>

<?php
while($row=mysql_fetch_assoc($res))
{
  $cid=$row['CategoryId'];
  $pid=$row['ProductId'];
  $sql1="select * from Cate where CateId='$cid'";
  $sql3="select * from Special where ProductId='$pid'";
  $res1=mysql_query($sql1);
  $res3=mysql_query($sql3);
  $row1=mysql_fetch_assoc($res1);
  $row3=mysql_fetch_assoc($res3);
  $today=date("y-m-d");
  $start=$row3['StartDate'];
  $end=$row3['EndDate'];
  $discount=0;
  $price=$row['ProductPrice'];
  if(strtotime($today)<strtotime($end)&&strtotime($today)>strtotime($start)){
  $discount=$row3['Discount'];
  $price=$price-$discount*$price/100;
  }
echo "<tr class='tr1'>"; 
echo "<td class='td'><input type='radio' name='pn'/>".$row['ProductName']."</td>";
if($price!=$row['ProductPrice'])
echo "<td class='td1'>".$price."</td>";
else
echo "<td class='td2'>".$price."</td>";
echo "<td class='td2'>".$row1['CateName']."</td>";
echo "<td class='td'>".$row['Description']."</td>";
echo "<td class='td2'>".$discount."% </td>";
echo "<td class='td2'>".$row3['StartDate']."</td>";
echo "<td class='td2'>".$row3['EndDate']."</td>";
echo "</tr>";
}
?>
</table>
</div>


<script type='text/javascript'>

      var user=document.getElementById('userspan');
      var currUser=user.firstChild.data;
      var product;
      var discount;
      var categorys;
       function deletePro()
       { var j=0;
         var dpn=document.getElementsByName('pn');
         for(i=0;i<dpn.length;i++)
         {
          if(dpn[i].checked)
           {
            product=dpn[i].nextSibling.nodeValue;
            j=1;
           }
         }
         if(j!=0)
          {
           if(confirm('Are you sure to delete these users?'))
            {
            window.location.href='DProduct.php?pn='+product+'&currUser='+currUser;
            }
          }
         else
          {
            alert("Please choose at least one product to delete!");        
          }
       }

       function editPro()
       {
         var opn=document.getElementsByName('pn');
         var j=0;
         for(i=0;i<opn.length;i++)
         {
         if(opn[i].checked) j++;
         }
         if(j!=0) 
         {
           var cate=document.getElementById('cate');
           var cn=document.getElementsByName('cn');
           for(i=0;i<cn.length;i++)
           {
            var options=document.createElement('option');
            options.text=cn[i].nextSibling.nodeValue;
            options.value=options.text;
            cate.options.add(options); 
           }
           document.getElementById('editPro').style.display='block';
           document.getElementById('operate').style.display='none';
         }
         else 
         { alert("Please choose one product to edit!"); }
       }

       function newPro()
       {
         var j=0;
         var opn=document.getElementsByName('pn');
         var ename=document.getElementById('newName').value;
         var eprice=document.getElementById('newPrice').value;
         var eds=document.getElementById('newds').value;
     var ecate=document.getElementById('cate').options[document.getElementById('cate').selectedIndex].text;
        var oldpn;
       for(i=0,j=0;i<opn.length;i++)
        {
          if(opn[i].checked)
         {
          oldpn=opn[i].nextSibling.nodeValue;
          j=1;
         }
        }
        if(j!=0) window.location.href='EditPro.php?pn='+ename+'&price='+eprice+'&ds='+eds+'&cate='+ecate+'&opn='+oldpn+'&currUser='+currUser;
        else alert("Please choose one!");
       }

       function addPro()
       {
        document.getElementById('addPro').style.display='block';
        document.getElementById('operate').style.display='none';
        var cate=document.getElementById('addcate');
        var cn=document.getElementsByName('cn');
         for(i=0;i<cn.length;i++)
        {
       var options=document.createElement('option');
           options.text=cn[i].nextSibling.nodeValue;
           options.value=options.text;
           cate.options.add(options); 
        } 
       }

       function createPro()
       {
         var aname=document.getElementById('addName').value;
         var aprice=document.getElementById('addPrice').value;
         var ads=document.getElementById('addds').value;
     var acate=document.getElementById('addcate').options[document.getElementById('addcate').selectedIndex].text;
         if(aname!=''&&aprice!=''&&ads!=''&&acate!='') 
           {
            if(confirm('Do you want add this product?'))
            {
            window.location.href='AProduct.php?pn='+aname+'&price='+aprice+'&ds='+ads+'&cate='+acate+'&currUser='+currUser;
            }
          }
         else
         {
         alert("You should fill all the blank right!");
         }
       }

       function back()
        {
         document.getElementById('menu').style.display='block';
         document.getElementById('operate').style.display='block';
         document.getElementById('addPro').style.display='none';
         document.getElementById('editPro').style.display='none';
         document.getElementById('category').style.display='none';
         document.getElementById('setSales').style.display='none';
         var cate=document.getElementById('addcate');
         for(i=0;i<cate.options.length;){cate.removeChild(cate.options[i]);}
         document.getElementById('form1').reset();
         document.getElementById('form2').reset();
         document.getElementById('form3').reset();
        }

     function deleteCate()
     {
     var j=0;
     var ddcn;
     var dcn=document.getElementsByName('cn');
     for(i=0;i<dcn.length;i++)
      {
        if(dcn[i].checked)
        {
         ddcn=dcn[i].nextSibling.nodeValue;
         j=1;
        }
      }
     if(j!=0){ if(confirm('Delete these users?'))
           {
           window.location.href='DCate.php?cn='+ddcn+'&currUser='+currUser;
           }
         }
     else 
         {
          alert("Choose one category !");
         }
     }
     function addCate(){
       var cae=document.getElementById('CAE');
       var operateC=document.getElementById('operateC');
       cae.style.display='block';
       operateC.style.display='none';
       categorys=0;
     }

     function editCate()
     {
       var ocn=document.getElementsByName('cn');
       var cae=document.getElementById('CAE');
     
         for(i=0,j=0;i<ocn.length;i++)
         {
          if(ocn[i].checked) j++;
         }
         if(j!=0) { 
            var operateC=document.getElementById('operateC');
           cae.style.display='block';
           operateC.style.display='none';
           categorys=2;}
         else
          {
            alert("Choose one category to edit!");
          }
      }
    function adetCate()
     {
       var j=0;
       var ecn=document.getElementById('aeCate').value;
       var decn=document.getElementById('deCate').value;
       if(categorys!=2)
       {
         if(ecn!='')
          window.location.href='ACategory.php?cn='+ecn+'&currUser='+currUser+'&decn='+decn;
          else alert("Please input Category Name!");
       }
     else{  
         var ocn=document.getElementsByName('cn');
         var oldcn;
        for(i=0;i<ocn.length;i++)
         {
          if(ocn[i].checked)
           {
            oldcn=ocn[i].nextSibling.nodeValue;
            j=1;
           }
         }
         if(j!=0) 
         {
          if(ecn!='')
          window.location.href='EditCate.php?cn='+ecn+'&ocn='+oldcn+'&decn='+decn+'&currUser='+currUser;
          else alert("Category Name Miss!");
         }
      else{
           alert("Choose one Category!");
          }
        }
     }
     function ecategory(){

     document.getElementById('operate').style.display='none';
     document.getElementById('category').style.display='block';
     document.getElementById('menu').style.display='block';
     }
     
     function backCate(){
     document.getElementById('operateC').style.display='block';
     document.getElementById('CAE').style.display='none';
     document.getElementById('category').style.display='block';
     }

     function setSales(){
       var pn=document.getElementsByName('pn');
       
      for(i=0,j=0;i<pn.length;i++){
     if(pn[i].checked) j++;
         }
         if(j!=0) {document.getElementById('setSales').style.display='block';
           document.getElementById('operate').style.display='none';}
         else
         { alert("Choose one product!");
         }
     }
     function discount()
     { var j=0;
       var pn=document.getElementsByName('pn');
       var disc=document.getElementById('setDis').value;
       var start=document.getElementById('start').value;
       var end=document.getElementById('end').value;
         for(i=0;i<pn.length;i++)
         {
          if(pn[i].checked){ discount=pn[i].nextSibling.nodeValue; j=1;}
         }
         if(j!=0) {
          if(checkDis()&&checkDate())
           window.location.href='setDis.php?pn='+discount+'&currUser='+currUser+'&start='+start+'&end='+end+'&disc='+disc;}
         else
         {
           alert("Please choose one product!");
         }
     }
     function checkDis(){
     var disc=document.getElementById('setDis').value;
     var validation=/^[1-9]?\d$/;
     if(!validation.test(disc)){
        alert("Only allow discount 1 to 99");
           return false;
     }else{
      return true;
       }  
     }
     function checkDate(){
     var start=document.getElementById('start').value;
     var end=document.getElementById('end').value;
     var validation=/^((((19|20)\d{2})-(0?(1|[3-9])|1[012])-(0?[1-9]|[12]\d|30))|(((19|20)\d{2})-(0?[13578]|1[02])-31)|(((19|20)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|((((19|20)([13579][26]|[2468][048]|0[48]))|(2000))-0?2-29))$/;
     if(!validation.test(start)||!validation.test(end)){
        alert("Enter date like yyyy-mm-dd");
           return false;
     }else{
      return true;
     }  
   }   
   
</script>
</body>
</html>