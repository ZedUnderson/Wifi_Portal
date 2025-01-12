<?php ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="expires" content="-1" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
<title>System Zone Hotspot</title>
<style type="text/css">
body {
 color: #737373; 
 font-size: 14px; 
 font-family: verdana;
}
.container{
   width:300px;
   height:auto;
   margin:0 auto;
   margin-top:10vh;
   -webkit-box-shadow: 3px 3px 5px 6px #ccc;  /* Safari 3-4, iOS 4.0.2 - 4.2, Android 2.3+ */
   -moz-box-shadow:    3px 3px 5px 6px #ccc;  /* Firefox 3.5 - 3.6 */
    box-shadow:         3px 3px 5px 6px #ccc; 
   padding:15px 20px 25px 20px;
}
.banner{
  width:100%;
  text-align:center;
}
.banner img{
   max-width:100%; 
   height:auto;   
}
.banner label{
   font-size:20px;
   font-weight:bold;
}
.error-panel{
  width:100%;
  height:auto;
  margin-top:20px;
  color:red;
}
.login-panel{
  width:290px;
  margin-top:30px;
}
.login-input{
   width:100%;
   height:40px;
   margin-top:20px;
   margin-bottom:20px;
}
.login-input input{
  width:100%;
  height:35px;
}
#login-button{
  width:102%;
  text-align:right;
}
#login-button input{
  width:100px;
  height:38px;
  background-color:#b97d00;
  border-color:#b97d00;
  color:#fff;
}
#login-button input:hover{
  background-color:#000;
  border:1px solid #000;
}
.free-trial{
  width:100%;
  margin-top:20px;
  margin-bottom:10px;
  text-align:center;
}
.free-trial a{
  text-decoration:none;
  color:#b97d00;
}
.free-trial a:hover{
  text-decoration:underline;
}
.datetime{
   width:100%;
   margin-top:15px;
   text-align:center;
   font-size:20px;
}
</style>
</head>

<body onload="startTime()">
$(if chap-id)
	<form name="sendin" action="$(link-login-only)" method="post">
		<input type="hidden" name="username" />
		<input type="hidden" name="password" />
		<input type="hidden" name="dst" value="$(link-orig)" />
		<input type="hidden" name="popup" value="true" />
	</form>
	
	<script type="text/javascript" src="/md5.js"></script>
	<script type="text/javascript">
	<!--
	    function doLogin() {
		document.sendin.username.value = document.login.username.value;
		document.sendin.password.value = hexMD5('$(chap-id)' + document.login.password.value + '$(chap-challenge)');
		document.sendin.submit();
		return false;
	    }
	//-->
	</script>
$(endif)
            
			<div class="container">
			        <div class="banner">
					  <img src="/img/logo.png" />
					  <label>Hotspot Login</label>
					</div>
					<form name="login" action="$(link-login-only)" method="post"
					    $(if chap-id) onSubmit="return doLogin()" $(endif)>
						<input type="hidden" name="dst" value="$(link-orig)" />
						<input type="hidden" name="popup" value="true" />	
                            $(if error)
							 <div class="error-panel">
							   $(error)
							 </div>
							$(endif)						
							<div class="login-panel">							
							 <div class="login-input">
							  <input  name="username" type="text" value="$(username)" placeholder="Login username"/>
							 </div>								
							 <div class="login-input">
							  <input name="password" type="password" placeholder="Login password"/>
							 </div>											
							  <div id="login-button"><input type="submit" value="Login" /></div>
                              <div class="free-trial">
                                $(if trial == 'yes')
								    Free trial available, <a href="$(link-login-only)?dst=$(link-orig-esc)&amp;username=T-$(mac-esc)">click here</a>.
								  $(endif)
                              </div>
                              <div class="datetime">
							    <span id="date"></span> - <span id="time"></span>
							  </div>							  
							</div>
					</form>
		    </div>	
<script type="text/javascript">
<!--
  document.login.username.focus();
//-->
 var dt = new Date();
 document.getElementById("date").innerHTML = dt.toLocaleDateString();
 function startTime() {
  var today = new Date();
  document.getElementById("time").innerHTML = today.toLocaleTimeString()
  var t = setTimeout(startTime, 500);
}
</script>
</body>
</html>