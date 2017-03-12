<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=7">
	<link rel="shortcut icon" href="favicon.ico" />
	<meta name="author" content="骑士CMS" />
	<meta name="copyright" content="74cms.com" />
	<title>网站后台管理中心- Powered by 74CMS</title>
	<link href="<?=base_url()?>static/login/css/common.css" rel="stylesheet" type="text/css" />
</head>
<body style="background-color:#FFFFFF">
	<div class="login_top" >
	  <div class="logo"></div>
	</div>
	<form id="form1" name="form1" method="post" action="/index.php?m=Admin&c=index&a=login">
	<div class="login_main">
	
	  <div id="err">
	  	
	  </div>
	  <div class="ce"><div class="imgbg"></div>
	  <input name="username" type="text" maxlength="16" id="username" class="linput" placeholder="请输入用户名"/>
	  </div>
	   <div class="ce"><div class="imgbg pwd"></div>
	   <input name="password" type="password" id="admin_pwd" value="" class="linput pwd" placeholder="请输入密码"/>
	   </div>
	    <div class="ce"><input class="btn" type="button" name="Submit" id="J_dologin" value="登录" onclick="login();"/>
		<input type="button" id="btnCheck" style="display:none;">
		</div>
	
	</div>
	<div id="popup-captcha"></div>
</form>
		
		
	<div class="login_foot link_lan">后台管理 <br />
				
				
</div>
	 
<script type="text/javascript" src="<?=base_url()?>static/js/jquery.js"></script>

<script>
	function login()
	{
		var username = $("#username").val();
		var pawd = $("#admin_pwd").val();
		var aj = $.ajax( {
              url:'<?=base_url()?>admin/login/user_login',
              data:{
                  
                  username : username,
                  pawd : pawd
                  
              },
              contentType:"application/x-www-form-urlencoded; charset=utf-8",
              type:'post',
              cache:false,
              dataType:'json',
              success:function(data){
               
               if(data.code == 0){
               		window.location = '<?=base_url()?>admin/defaults';
               }else{
               	
               		$("#err").html('<div class="ce"><div class="err" id="J_errbox" >'+data.msg+'</div></div>');

               }

              },
              error : function() {
                  alert("请求失败，请重试");
              }
          });
	}
</script>
</body>
</html>