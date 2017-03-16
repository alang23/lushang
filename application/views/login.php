<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>众人办公系统</title>

<link href="<?=base_url()?>static/login/css/bootstrap.min.css" rel="stylesheet">
<link href="<?=base_url()?>static/login/css/signin.css" rel="stylesheet">

</head>

<body>

<div class="signin">
	<div class="signin-head"><img src="<?=base_url()?>static/login/images/test/head_120.png" alt="" class="img-circle"></div>
	<form class="form-signin" role="form">
		<input type="text" class="form-control" name="username" id="username" placeholder="用户名" required autofocus />
		<input type="password" class="form-control" name="pawd" id="pawd" placeholder="密码" required />
		<button class="btn btn-lg btn-warning btn-block" type="button" onclick="login();">登录</button>
		<label class="checkbox">
			<input type="checkbox" value="remember-me"> 记住我
		</label>
	</form>
</div>

<div style="text-align:center;">
</div>
<script type="text/javascript" src="<?=base_url()?>static/js/jquery.js"></script>

<script>
	function login()
	{
		var username = $("#username").val();
		var pawd = $("#pawd").val();
		var aj = $.ajax( {
              url:'<?=base_url()?>login/user_login',
              data:{
                  
                  username : username,
                  pawd : pawd,
                  
              },
              contentType:"application/x-www-form-urlencoded; charset=utf-8",
              type:'post',
              cache:false,
              dataType:'json',
              success:function(data){
                
               if(data.code == 0){
               		window.location = '<?=base_url()?>defaults';
               }else{
               		alert(data.msg);
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
