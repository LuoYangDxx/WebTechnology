//check register
function CheckReg(){
var email = $.trim($("#email").val());
var password = $.trim($("#pwd").val());

var nickname = $("#nickname").val();


var search_mail = /^[0-9a-z][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}[0-9a-z]\.){1,4}[a-z]{2,4}$/;
var search_pwd = /^[A-Za-z0-9]{6,12}$/;
var search_nick = /^[A-Za-z0-9]{3,20}$/;



if(nickname==''  ){
alert("Please input the nickname");
$("#nickname").focus();
return false;
}
if(!search_nick.test(nickname)){
alert("NickName is not correct.It must have 3-20 long");
$("#nickname").val("");
$("#nickname").focus();
return false;
}

if(email==''  ){
alert("Please input the email");
$("#email").focus();
return false;
}
if(!search_mail.test(email)){
alert("Email is not correct");
$("#email").val("");
$("#email").focus();
return false;
}

if(password==''  ){
alert("Please input the password");
$("#pwd").focus();
return false;
}
if(!search_pwd.test(password)){
alert("Password is not correct.It must have 6-12 long");
$("#pwd").val("");
$("#pwd").focus();
return false;
}






return true;
}









//SIGN IN 
function CheckLog(){
var email = $.trim($("#email").val());
var password = $.trim($("#pwd").val());




var search_mail = /^[0-9a-z][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}[0-9a-z]\.){1,4}[a-z]{2,4}$/;
var search_pwd = /^[A-Za-z0-9]{6,12}$/;






if(email==''  ){
alert("Please input the email");
$("#email").focus();
return false;
}
if(!search_mail.test(email)){
alert("Email is not correct");
$("#email").val("");
$("#email").focus();
return false;
}

if(password==''  ){
alert("Please input the password");
$("#pwd").focus();
return false;
}
if(!search_pwd.test(password)){
alert("Password is not correct.It must have 6-12 long");
$("#pwd").val("");
$("#pwd").focus();
return false;
}






return true;

	
	
	}







//order 
function order(){
	
   	var fullname = $.trim($('#fullname').val());
	var address1 = $('#address1').val();
	var address2 = $('#address2').val();
	var city = $('#city').val();
	var state = $('#state').val();
	var zip = $('#zip').val();
	var phone = $('#phone').val();
	
	
	
	

     

	
	
    if(fullname =='' ){
    alert("Please input the fullname！");
    $("#fullname").focus();
    return false;
}
    if(address1 =='' ){
    alert("Please input the address1！");
    $("#address1").focus();
    return false;
}   
     if(address2 =='' ){
    alert("Please input the address2！");
    $("#address2").focus();
    return false;
}   
    if(city =='' ){
    alert("Please input the city！");
    $("#city").focus();
    return false;
} 
    if(state =='' ){
    alert("Please input the state！");
    $("#state").focus();
    return false;
}   
    if(zip =='' ){
    alert("Please input the zip！");
    $("#zip").focus();
    return false;
}   
    if(phone =='' ){
    alert("Please input the phone！");
    $("#phone").focus();
    return false;
}   
   
  return true;
    
	

}



function check_cate(){
	var fid = $.trim($('#fid').val());
	var cname = $.trim($('#cname').val());
	if(fid==''){
		alert("Please select the father category");
		$("#fid").focus();
		return false;
		}
	if(cname==''){
		alert("Please input the category name");
		$("#cname").focus();
		return false;
		}
	return true;
	
	
	}


function submit_form(){
	$('#cfrm').submit();
	
	}






//reload page
function reload_cur_page(){
	location.reload(true);
}
	