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
  $sql1="select * from Cate";
  $res1=mysql_query($sql1);
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
  background-image: url(images/main_09.gif);
  letter-spacing: 1px;
  padding: 4px;
}
tr.tr1{cellspacing:1;}
td.td
{
  text-align: center;
  padding-left: 10px;
  padding-top: 6px;
  padding-bottom: 6px;
  padding-right: 6px;
}
td.td1
{ color: #FF2D2D;
  text-align: center;
  padding-left: 10px;
  padding-top: 6px;
  padding-bottom: 6px;
  padding-right: 6px;
}

div.lsidebar{
  background:#AAE74A;
  float: left;
  width:320px;
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
  margin-top: 20px;
  width:85%; 
  height:190px;
  border:1px solid #009966;
  background: #FFF4C1;
}
div.inner2{
  margin-left:25px;
  margin-top: 20px;
  width:85%; 
  height:360px;
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
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-right:15px;">
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
  <div class="inner2"><div class="inner4"></div>
 <p style='font-size:15px;text-align:center'><b>Search Page</b></p>
  <div id='searchfields'style="text-align:center;">
  <input type='button' class='button' value='Employee' onClick='Employee()'>
  <input type='button' class='button' value='Product' onClick='Product()'>
  <input type='button' class='button' value='SpecialSales' onClick='Special()'>
  </div>
  <br>
  <hr width=80% size=2 color=#842B00 style="border:1 dashed #00ffff">

<!--employee-->
  <div id='emp' style='display:block'> 
  <h3 style="text-align:center;">Employee</h3>
  <form id='form2'style="text-align:center;margin-top:20px;">
  Employee identity
  <select id='type'>
  <option></option>
  <option>Sales Manager</option>
  <option>Administrator</option>
  <option>Manager</option>
  </select>
    <br><br><br>
    Pay Range:<input type='text' size='8' id='payl'/>
    End:&nbsp;<input type='text' size='8' id='payt'/>
  </form>
  </div>

<!--product-->
  <div id='pro' style='display:none'> 
  <h3 style="text-align:center;">Product</h3> 
  <form id='form1'style="text-align:center;margin-top:20px;">
  Name: <input type='text' size='10' id='pname'/>&nbsp;
  Category:  
  <select id='cate'>
  <option></option>
  <?php
  while($row1=mysql_fetch_assoc($res1)){
    echo "<option>".$row1['CateName']."</option>";
  }
  ?>
  </select><br><br>
  Price Range: <input type='text' size='8' id='lowp'/>&nbsp;To:&nbsp;<input type='text' size='8' id='topp'/>
  </form>
  </div>

<!--special-->
<div id='spe' style='display:none'>
  <h3 style="text-align:center;">Special Sales Product</h3> 
  <form id='form3'style="text-align:center;margin-top:20px;">
  Name:<input type='text' size='10' id='spname'/> 
  Category: <select id='scate'><option></option>
  <?php
  $res2=mysql_query($sql1);
  while($row2=mysql_fetch_assoc($res2))
  {
    echo "<option>".$row2['CateName']."</option>";
  }
  ?>
  </select><br><br>

  Old Price: <input type='text' size='10' id='lowsp'/>&nbsp; To:&nbsp; <input type='text' size='10' id='topsp'/>
  &nbsp; 
  <br><br>
  StartDate: <input type='text' size='12' id='sdate'/><br><br>
  EndDate:<input type='text' size='12' id='edate'/>
  </form>
  </div>
 <!--search-->
  <div style="text-align:center;">
    <input type='button' class='button' value='Search' onClick='search()'>
</div>
</div>
 <div class="inner1"><div class="inner4"></div>
<p style="text-align:center;font-size:20px;"><b>Welcome!</b></p>
  <p style="text-align:center;font-size:18px;">This is MY Supermarket!<br>
  You can do Operations.<br>Also you can log out.<br>Have a good day!!<br>
 </p>
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
    Welcome! Manager:&nbsp;&nbsp;YourID:&nbsp;&nbsp;<span id='userspan'>".$currUser."</span></h2>";
  ?>
   
<div id='report'style="margin-top:10px;margin-left:450px;"></div> 
  <!--search end-->

 

 <script type='text/javascript'>
  var xmlhttp;
  var searchfield='Employee';
  function Product(){
    var pro=document.getElementById('pro');
    var emp=document.getElementById('emp');
    var spe=document.getElementById('spe');
    pro.style.display='block';
    emp.style.display='none';
    spe.style.display='none'; 
    searchfield='Product';
  }
  function Employee(){
    var pro=document.getElementById('pro');
    var emp=document.getElementById('emp');
    var spe=document.getElementById('spe');
    pro.style.display='none';
    emp.style.display='block';
    spe.style.display='none'; 
    searchfield='Employee';
  }
  function Special(){
    var pro=document.getElementById('pro');
    var emp=document.getElementById('emp');
    var spe=document.getElementById('spe');
    pro.style.display='none';
    emp.style.display='none';
    spe.style.display='block'; 
    searchfield='Special';
  }

  function search(){   
    var userspan=document.getElementById('userspan');
    var currUser=userspan.firstChild.data; 
    var lowp=document.getElementById('lowp').value;
    var topp=document.getElementById('topp').value;
    var pname=document.getElementById('pname').value;
    var cate=document.getElementById('cate').options[document.getElementById('cate').selectedIndex].text;
    var type=document.getElementById('type').options[document.getElementById('type').selectedIndex].text;
    var payl=document.getElementById('payl').value;
    var payt=document.getElementById('payt').value;
    var lowsp=document.getElementById('lowsp').value;
    var topsp=document.getElementById('topsp').value;
    var spname=document.getElementById('spname').value;
    var scate=document.getElementById('scate').options[document.getElementById('scate').selectedIndex].text;
    var sdate=document.getElementById('sdate').value;
    var edate=document.getElementById('edate').value;

    if(window.XMLHttpRequest){
      xmlhttp=new XMLHttpRequest();
    }else if(window.ActiveXObject){
      xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
    }

      if(sdate==''&&edate=='')
    {
    xmlhttp.open('GET','view.php?lowp='+lowp+'&topp='+topp+'&pname='+pname+'&cate='+cate+'&type='+type+'&payl='+payl+'&payt='+payt+'&lowsp='+lowsp+'&topsp='+topsp+'&spname='+spname+'&scate='+scate+'&sdate='+sdate+'&edate='+edate+'&currUser='+currUser+'&searchfield='+searchfield,true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = function(){
       if(xmlhttp.readyState==4 && xmlhttp.status==200){document.getElementById('report').innerHTML = xmlhttp.responseText;}
                                            }
    }
    else if(sdate!=''&&edate=='')
    {
      if(checksDate())
     {
      xmlhttp.open('GET','view.php?lowp='+lowp+'&topp='+topp+'&pname='+pname+'&cate='+cate+'&type='+type+'&payl='+payl+'&payt='+payt+'&lowsp='+lowsp+'&topsp='+topsp+'&spname='+spname+'&scate='+scate+'&sdate='+sdate+'&edate='+edate+'&currUser='+currUser+'&searchfield='+searchfield,true);
      xmlhttp.send();
      xmlhttp.onreadystatechange = function(){
       if(xmlhttp.readyState==4 && xmlhttp.status==200){document.getElementById('report').innerHTML = xmlhttp.responseText;}
                                            }
     }
    }
    else if(sdate==''&&edate!='')
    {
      if(checkeDate())
      {
      xmlhttp.open('GET','view.php?lowp='+lowp+'&topp='+topp+'&pname='+pname+'&cate='+cate+'&type='+type+'&payl='+payl+'&payt='+payt+'&lowsp='+lowsp+'&topsp='+topsp+'&spname='+spname+'&scate='+scate+'&sdate='+sdate+'&edate='+edate+'&currUser='+currUser+'&searchfield='+searchfield,true);
      xmlhttp.send();
      xmlhttp.onreadystatechange = function(){
       if(xmlhttp.readyState==4 && xmlhttp.status==200){document.getElementById('report').innerHTML = xmlhttp.responseText;}
                                            }
      }
    }
      else if(sdate!=''&&edate!='')
    {
      if(checkDate())
     {
      xmlhttp.open('GET','view.php?lowp='+lowp+'&topp='+topp+'&pname='+pname+'&cate='+cate+'&type='+type+'&payl='+payl+'&payt='+payt+'&lowsp='+lowsp+'&topsp='+topsp+'&spname='+spname+'&scate='+scate+'&sdate='+sdate+'&edate='+edate+'&currUser='+currUser+'&searchfield='+searchfield,true);
      xmlhttp.send();
      xmlhttp.onreadystatechange = function(){
       if(xmlhttp.readyState==4 && xmlhttp.status==200){document.getElementById('report').innerHTML = xmlhttp.responseText;}
                                            }
     }
    }
  }
   
  function checkDate(){
     var start=document.getElementById('sdate').value;
     var end=document.getElementById('edate').value;
     var validation=/^((((19|20)\d{2})-(0?(1|[3-9])|1[012])-(0?[1-9]|[12]\d|30))|(((19|20)\d{2})-(0?[13578]|1[02])-31)|(((19|20)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|((((19|20)([13579][26]|[2468][048]|0[48]))|(2000))-0?2-29))$/;
     if(!validation.test(start)||!validation.test(end)){
        alert('Enter date like yyyy-mm-dd');
           return false;
     }else{
      return true;
     }  
   }   
   function checksDate(){
     var start=document.getElementById('sdate').value;
     var validation=/^((((19|20)\d{2})-(0?(1|[3-9])|1[012])-(0?[1-9]|[12]\d|30))|(((19|20)\d{2})-(0?[13578]|1[02])-31)|(((19|20)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|((((19|20)([13579][26]|[2468][048]|0[48]))|(2000))-0?2-29))$/;
     if(!validation.test(start)){
        alert('Enter date like yyyy-mm-dd');
           return false;
     }else{
      return true;
     }  
   }   
   function checkeDate(){
     var end=document.getElementById('edate').value;
     var validation=/^((((19|20)\d{2})-(0?(1|[3-9])|1[012])-(0?[1-9]|[12]\d|30))|(((19|20)\d{2})-(0?[13578]|1[02])-31)|(((19|20)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|((((19|20)([13579][26]|[2468][048]|0[48]))|(2000))-0?2-29))$/;
     if(!validation.test(end)){
        alert('Enter date like yyyy-mm-dd');
           return false;
     }else{
      return true;
    
     }  
   }   
  </script>
  </body> 
  </html>