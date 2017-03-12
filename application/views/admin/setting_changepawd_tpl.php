<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>表单页</title>
<!-- 此文件为了显示Demo样式，项目中不需要引入 -->
 
  <link href="<?=base_url()?>static/assets/css/bs3/dpl.css" rel="stylesheet">
  <link href="<?=base_url()?>static/assets/css/bs3/bui.css" rel="stylesheet">
 
</head>
<body>
  <div class="container">
    
    <!-- 表单页 ================================================== --> 
    <div class="row">
    <div class="doc-content">
      <ul class="breadcrumb">
          <li>
            <a href="#">系统设置</a> <span class="divider">/</span>
          </li>
          <li class="active">
            密码修改
          </li>
        </ul>
    </div>
      <div class="span24">
        <h3>密码修改</h3>
        <hr>
        <form id="J_Form" name="form1" class="form-horizontal" method="post" action="<?=base_url()?>account/add">
   
 
            <div class="control-group">
              <label class="control-label"><s>*</s>原密码：</label>
              <div class="controls">
              <input class="input-normal control-text" type="password" name="pawd" id="pawd" onblur="check_pawd();">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label"><s>*</s>新密码：</label>
              <div class="controls"><input class="input-normal control-text" type="password" name="newpawd" id="newpawd" onblur="check_newpawd();"></div>

            </div>
       

            <div class="control-group">
              <label class="control-label"><s>*</s>重新输入新密码：</label>
              <div class="controls">
              <input class="input-normal control-text" type="password" id="repawd" name="repawd" onblur="check_repawd();">
              
              </div>
            </div>
 
   
            <hr>
            <div class="form-actions span5 offset3">
              <button id="btnSearch" type="button" onclick="do_post();" class="button button-primary">提交</button>
            </div>
        </form> 
      </div>
    </div>  
    <script src="<?=base_url()?>static/assets/js/jquery-1.8.1.min.js"></script>
<script src="http://g.tbcdn.cn/fi/bui/seed-min.js?t=201212261326"></script>    

<script>

//检查密码
function check_pawd()
{

  var pawd = '';
  pawd = $("#pawd").val();
  if(pawd == ''){
    $("#pawd-err").remove();
      $("#pawd").after('<span class="x-field-error" id="pawd-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">原密码不能为空</label></span>');
      return false;
  }else{
      $("#pawd-err").remove();
      return true;
  }
}

function check_newpawd()
{

  var pawd = '';
  pawd = $("#newpawd").val();
  if(pawd == ''){
    $("#newpawd-err").remove();
      $("#newpawd").after('<span class="x-field-error" id="newpawd-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">请输入新密码</label></span>');
      return false;
  }else{
      $("#newpawd-err").remove();
      return true;
  }
}

function check_repawd()
{

  var pawd = '';
  pawd = $("#repawd").val();
  if(pawd == ''){
    $("#repawd-err").remove();
      $("#repawd").after('<span class="x-field-error" id="repawd-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">两次输入的密码不一致</label></span>');
      return false;
  }else{
      $("#repawd-err").remove();
      return true;
  }
}


function do_post()
{

    var pawd = $("#pawd").val();
    var newpawd = $("#newpawd").val();
    var repawd = $("#repawd").val();
    if(!check_pawd() || !check_newpawd() || !check_repawd() ){
      return false;
    }
    var aj = $.ajax( {
              url:'<?=base_url()?>admin/setting/changepwd_ajax',
              data:{
                  
                  pawd : pawd,
                  newpawd : newpawd,
                  repawd : repawd
                  
              },
              contentType:"application/x-www-form-urlencoded; charset=utf-8",
              type:'post',
              cache:false,
              dataType:'json',
              success:function(data){
                
                if(data.code != 0){
                  alert(data.msg);
                }else{
                  $("#pawd").val('');
                  $("#newpawd").val('');
                  $("#repawd").val('');
                  alert(data.msg);
                }              
              },
              error : function() {
                  alert("请求失败，请重试");
              }
          });
}


</script>
<!-- script end -->
  </div>
</body>
</html>