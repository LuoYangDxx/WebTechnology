//check product
function check_prod(){
var title = $.trim($("#title").val());
var price = $.trim($("#price").val());
var oprice = $.trim($("#oprice").val());

var sp = $('input:radio[name="sp"]:checked').val();
var sdate = $.trim($("#sdate").val());
var edate = $.trim($("#edate").val());
var content = $.trim($("#content").val());


var search_date = /^\d{4}-\d{1,2}-\d{1,2}$/;
var search_num = /^[0-9]+(.[0-9]{0,2})?$/;




if(title==''  ){
alert("Please input the title");
$("#title").focus();
return false;
}
if(price==''  ){
alert("Please input the price");
$("#price").focus();
return false;
}
if(!search_num.test(price)){
alert("Price is not correct");
$("#price").val("");
$("#price").focus();
return false;
}


if(sp==1){
	
if(oprice==''  ){
alert("Please input the original price");
$("#oprice").focus();
return false;
}
if(!search_num.test(oprice)  || oprice<price){
alert("Original price is not correct");
$("#oprice").val("");
$("#oprice").focus();
return false;
}	
	
	
if(!search_date.test(sdate)){
alert("Start date is not correct");
$("#sdate").val("");
$("#sdate").focus();
return false;
}
if(!search_date.test(edate)){
alert("End date is not correct");
$("#edate").val("");
$("#edate").focus();
return false;
}

}
if(content==''  ){
alert("Please input the content");
$("#content").focus();
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

//reload page
function reload_cur_page(){
	location.reload(true);
}
	