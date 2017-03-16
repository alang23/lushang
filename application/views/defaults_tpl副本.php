<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=640,target-densitydpi=device-dpi,user-scalable=no">
<meta content="telephone=no" name="format-detection" />
<title>路上诚品</title>
<link href="<?=base_url()?>static/lushang/css/main.css" rel="stylesheet">
<link href="<?=base_url()?>static/lushang/css/animate.css" rel="stylesheet">
</head>
<body>
<section class="phone_bg">
       <a href="https://h5.youzan.com/v2/feature/10qwlqr2j" class="phone_nav"><img src="<?=base_url()?>static/lushang/images/nav_1.png"></a>
       <div class="phone_input">
            <h2>输入您的手机号码：</h2>
            <input type="text" id="phone"  placeholder="" maxlength="11" />
            <input type="text" id="phone"  placeholder="" maxlength="11" />
            <a href="javascript:void(0);" onclick="do_post();" class="left">确 认</a>
            <a href="javascript:void(0);" onclick="$('#phone').val('')" class="right">取 消</a>
       </div>
</section>

<script src="<?=base_url()?>static/lushang/js/jquery-1.10.2.min.js"></script>
<script src="<?=base_url()?>static/lushang/js/main.js"></script>
<script src="<?=base_url()?>static/layer/layer.js"></script>

<script>


function checkPhone(){ 
}

function do_post()
{
    var phone = $("#phone").val();
    if(!(/^1(3|4|5|7|8)\d{9}$/.test(phone))){ 
        layer.tips('请填写正确的手机号', '#phone');
        return false; 
    } 


	var aj = $.ajax( {
              url:'<?=base_url()?>defaults/user_login',
              data:{
                  
                  phone : phone,
                  
              },
              contentType:"application/x-www-form-urlencoded; charset=utf-8",
              type:'post',
              cache:false,
              dataType:'json',
              success:function(data){
                //alert(data.data);
               if(data.code == 0){
                //alert(data.data);
               		window.location = '<?=base_url()?>products';
               }else{
               		//询问框
                   // alert(data.data);
                    layer.confirm(data.msg, {
                      title : '提示',
                      btn: ['关闭','参加活动'] //按钮
                    }, function(){
                      
                      layer.closeAll();

                    }, function(){

                        window.location = 'https://h5.youzan.com/v2/feature/1i2j1nf32';

                    });
               }

              },
              error : function() {
                  alert("请求失败，请重试");
              }
          });
	//window.location = '<?=base_url()?>products';
}
</script>
</body>
</html>
