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
  $sql="select * from User";
  $res=mysql_query($sql);
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
.button {background-image: url(images/login_07.gif);}
th.table1
{
  background-image: url(images/tab_14.gif);
  letter-spacing: 1px;
  padding: 5px;
}
tr.tr1{cellspacing:1;}
td.td
{
  text-align: center;
  padding-left: 6px;
  padding-top: 6px;
  padding-bottom: 6px;
  padding-right: 6px;
}
div.lsidebar{
   background:#AAE74A;
  float: left;
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
  margin-left:20px;
  margin-top: 30px;
  width:200px; 
  height:220px;
  border:1px solid #009966;
  background: #FFF4C1;
}
div.inner2{
  margin-left:25px;
  margin-top: 20px;
  width:85%; 
  text-align: center;
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
  <br> <br><br><br> 
  <h2 style='text-align:center;'>SYSTEM OPERATION</h2>
</p>

  <div class="inner2">
  <div class="inner4"></div>
  <p style="text-align:center;font-size:15px;"><b>Admin Operation!</b></p><br>
 <div id='operate'style="text-align:center;margin-bottom:20px;">
  <input type='button' class='button' value='Add' onClick='addUser()'>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type='button' class='button' value='Edit'onClick='editUser()'/>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type='button' class='button' value='Delete' onClick='deleteUser()'/>
  <br>
</div>


<!--edituser-->
<div id='editUser'style='margin-left:20px;margin-bottom:20px;margin-top:20px;display:none;width:85%;text-align:center;border:2px #B2D235 solid;'>
<p style="text-align:center;"><b>Edit User!</b></p>
<form id='form1'style="text-align:center;margin-top:20px;">
<label for='password'>Password:</label> <input type='text' id='newPwd' style='width:100px;'>
<br><br>
<label for='lastname'>Last Name:</label> <input type='text' id='newLn' style='width:100px;'><br><br>
<label far='firstname'>First Name:</label> <input type='text' id='newFn' style='width:100px;'>
<br><br>
<label far='age'>Age:</label> <input type='text' id='newAge' onBlur='checkAge()' style='width:80px;'><br><br>
<label far='pay'>Pay:</label> <input type='text' id='newPay' onBlur='checkPay()' style='width:80px;'>
<br><br>

<div style='text-align:center;'>
<input type='radio' name='newType'/>Admin
<input type='radio' name='newType'/>Manager
<input type='radio' name='newType'/>Sales 
</div>
<br>
<br>
<div style='text-align:center;'>
  <input type='button' class='button' value='Edituser' onClick='newUser()'>
  <input type='button' class='button' value='Cancel' onClick='backAdmin()'>
</div>

</form>
</div>

<!--adduser-->
<div id='addUser'style='margin-left:20px;margin-bottom:20px;margin-top:20px;display:none;width:85%;text-align:center;border:2px #B2D235 solid;'>
<p style="text-align:center;"><b>Add User!</b></p>
<form id='form2'style="text-align:center;margin-top:20px;">
<label for='password'>Password:</label> <input type='text' id='addPwd'style='width:100px;'>
<br><br>
<label for='lastname'>Last Name:</label> <input type='text' id='addLn'style='width:100px;'><br><br>
<label far='firstname'>First Name:</label> <input type='text' id='addFn'style='width:100px;'>
<br><br>
<label far='age'>Age:</label> <input type='text' id='addAge' onBlur='checkAge()'style='width:100px;'><br><br>
<label far='pay'>Pay:</label> <input type='text' id='addPay' onBlur='checkPay()'style='width:100px;'>
<br><br>

<div style="text-align:center;">
<input type='radio' name='addType'/>Admin
<input type='radio' name='addType'/>Manager
<input type='radio' name='addType'/>Sales
</div>
<br>
<br>
<div style='text-align:center;'>
  <input type='button' class='button' value='OK!' onClick='createUser()'>
  <input type='button' class='button' value='Cancel' onClick='backAdmin()'>
</div>
</form>
</div>




</div>
</div>


<div class="rsidebar">
 <p style="text-align:center;font-size:20px;"><b>Our Location:</b><br><br>
New York<br><br><img src="images/1.jpg"><br><br>
Los Angeles<br><br><img src="images/2.jpg"><br><br>Chicago<br><br><img src="images/3.jpg">
</p>
</div>

<?php
  echo "<h2 style='text-align:center;'>
  Welcome! Administrator:&nbsp;&nbsp;YourID:&nbsp;&nbsp;<span id='userspan'>".$currUser."</span></h2>";
?>


<div id='admin' style='margin-top:40px;margin-left:450px;width:600px;'>
<p style='font-size:15px;text-align:center'><b>Users Menu</b></p>
<table border="2" bordercolor="7FB802" style="border-collapse:collapse;">
<tr class="tr1">
<th class="table1">UserId</th>
<th class="table1">Password</th>
<th class="table1">Last Name</th>
<th class="table1">First Name</th>
<th class="table1">Age</th>
<th class="table1">Type</th>
<th class="table1">Pay</th>
</tr>

<?php
while($row=mysql_fetch_assoc($res)){
echo "<tr>"; 
echo "<td class='td'><input type='checkbox' name='uid'/>".$row['UserId']."</td>";
echo "<td class='td'>".$row['Password']."</td>";
echo "<td class='td'>".$row['LastName']."</td>";
echo "<td class='td'>".$row['FirstName']."</td>";
echo "<td class='td'>".$row['Age']."</td>";
echo "<td class='td'>".$row['Type']."</td>";
echo "<td class='td'>".$row['Payments']."</td>";
echo "</tr>";
}
?>
</table>
</div>


 <script type='text/javascript'>
       var userspan=document.getElementById('userspan');
       var currUser=userspan.firstChild.data;
       var users=[];
       function deleteUser()
       {
         var j=0;
         var duid=document.getElementsByName('uid');
         for(i=0;i<duid.length;i++)
         {
         if(duid[i].checked)
           {users[j]=duid[i].nextSibling.nodeValue;j=1;}
         }
         if(j!=0)
           { if(confirm('Do you want to delete these users?'))
             {
             window.location.href='DUser.php?uid='+users+'&currUser='+currUser;
             }
           }
         else{ alert('Choose at least one!');}
       }

       function editUser()
       {
         var j=0;
         var ouid=document.getElementsByName('uid');
          for(i=0;i<ouid.length;i++)
           {
            if(ouid[i].checked) j++;
           }
           if(j==1)  
           {
            document.getElementById('editUser').style.display='block';
            document.getElementById('operate').style.display='none';
           }
           else if(j==0) alert('You should choose one to edit!');
           else
         {
           alert('You only can choose one!');
         }
       }

       function newUser()
       {
       var j=0;
       var ouid=document.getElementsByName('uid');
       var epwd=document.getElementById('newPwd').value;
       var eln=document.getElementById('newLn').value;
       var efn=document.getElementById('newFn').value;
       var eage=document.getElementById('newAge').value;
       var epay=document.getElementById('newPay').value;
       var etype=document.getElementsByName('newType');
       var type;
       var flag=0;
       for(i=0;i<etype.length;i++)
       {
       if(etype[i].checked)
       {type=etype[i].nextSibling.nodeValue;flag=1;}
       }
     if(flag==0) type='';
     var olduid=[];
     for(i=0;i<ouid.length;i++)
         {
        if(ouid[i].checked)
          {
          olduid[j]=ouid[i].nextSibling.nodeValue;
          j++;
          }
         }       
          if(j==1) window.location.href='EditUser.php?pwd='+epwd+'&ln='+eln+'&fn='+efn+'&age='+eage+'&pay='+epay+'&type='+type+'&ouid='+olduid[0]+'&currUser='+currUser;
          else if(j>1) alert('Only can choose one!');
          else if(j==0)  alert('Choose one first!');   
       }

       function addUser()
       {
         document.getElementById('addUser').style.display='block';
         document.getElementById('operate').style.display='none';         
       }

       function createUser(){

      if(checkPay()&&checkAge())
      {
         var apwd=document.getElementById('addPwd').value;
         var aln=document.getElementById('addLn').value;
         var afn=document.getElementById('addFn').value;
         var aage=document.getElementById('addAge').value;
         var apay=document.getElementById('addPay').value;
         var atype=document.getElementsByName('addType');
         var type;

         for(i=0;i<atype.length;i++)
         {
          if(atype[i].checked){
          type=atype[i].nextSibling.nodeValue;
             }
         } 

         if(apwd!=''&&aln!=''&&afn!=''&&aage!=''&&type!=''&&apay!='') 
         {
         if(confirm('Do you want create the user?'))
         {
           window.location.href='AUser.php?pwd='+apwd+'&ln='+aln+'&fn='+afn+'&age='+aage+'&pay='+apay+'&type='+type+'&currUser='+currUser;
         }
         }
         else alert('You should fill all the blank right!');
       }
       
       }

       function backAdmin()
       { 
         document.getElementById('editUser').style.display='none';
         document.getElementById('operate').style.display='block';
         document.getElementById('admin').style.display='block';
         document.getElementById('addUser').style.display='none';
         document.getElementById('form1').reset();
         document.getElementById('form2').reset();
       }


   function checkAge()
    { 
     var aage=document.getElementById('addAge').value;
     var eage=document.getElementById('newAge').value;
     var validation=/^[1-9]?\d$/;
     var temp;
     if(aage=='') temp=eage;
     else temp=aage;
     if(temp!='')
       {
         if(validation.test(temp))
         {
           return true;
         }else 
         {alert('Age only allowed 1 to 99');return false; }
       }
     }


    function checkPay()
    { 
     var apay=document.getElementById('addPay').value;
     var epay=document.getElementById('newPay').value;
     var validation=/^[1-9]?\d$/;
     var temp;
     if(apay=='') temp=epay;
     else temp=apay;
     if(temp!='')
       {
         if(validation.test(temp))
         {
           return true;
         }else 
         {alert('Pay only allowed 1 to 99');
           return false; }
       }
     }

</script>
</body>
</html>

