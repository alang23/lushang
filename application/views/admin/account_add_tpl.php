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
            <a href="#">账号管理</a> <span class="divider">/</span>
          </li>
          <li class="active">
            添加账户
          </li>
        </ul>
    </div>
      <div class="span24">
        <h3>添加账号</h3>
        <hr>
        <form id="J_Form" name="form1" class="form-horizontal" method="post" action="<?=base_url()?>account/add">
   
 
            <div class="control-group">
              <label class="control-label"><s>*</s>登陆账号：</label>
              <div class="controls">
              <input class="input-normal control-text" type="text" name="username" id="username" onblur="check_username();">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label"><s>*</s>密码：</label>
              <div class="controls"><input class="input-normal control-text" type="text" name="pawd" id="pawd" onblur="check_pawd();"></div>

            </div>
            <?php
              if(in_array('access_add', $roles) && $userinfo['company_id']=='0'){
            ?>
             <div class="control-group">
              <label class="control-label">公司：</label>
              <div class="controls">
                <select name="company_id" class="input-normal"> 
                  <?php
                    foreach($company as $ck => $cv){
                  ?>
                  <option value="<?=$cv['id']?>"><?=$cv['name']?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>
            </div>
            <?php
              }
            ?>

            <?php
              if(in_array('root', $roles) && $userinfo['company_id'] != '0'){
            ?>
           <div class="control-group">
              <label class="control-label">公司：</label>
              <div class="controls"><?=$company_info['name']?></div>
            </div>            
            <?php
              }
            ?>
            <div class="control-group">
              <label class="control-label"><s>*</s>姓名：</label>
              <div class="controls">
              <input class="input-normal control-text" type="text" id="realname" name="realname" onblur="check_realname();">
              
              </div>
            </div>
 
            <div class="control-group">
            <label class="control-label"><s>*</s>性别：</label>
              <label class="control-label radio">
                <input type="radio" name="gender" value="1" checked> 男
                <input type="radio" name="gender" value="2"> 女
              </label>
             
            </div>

            <div class="control-group">
              <label class="control-label"><s>*</s>职位：</label>
              <div class="controls"><input class="input-normal control-text" type="text" name="works"></div>
            </div>
 
             <div class="control-group">
              <label class="control-label"><s>*</s>电话：</label>
              <div class="controls"><input class="input-normal control-text" type="text" name="phone"></div>
            </div>

            <div class="control-group">
              <label class="control-label"><s>*</s>Email：</label>
              <div class="controls"><input class="input-normal control-text" type="text" name="email"></div>
            </div>

          <div class="control-group">
            <label class="control-label"><s>*</s>权限：</label>
              <div class="controls">
              <?php
                foreach($_role as $_k => $_v){
              ?>
                <input type="radio" name="role" value="<?=$_v['id']?>"> <?=$_v['role_name']?>
              <?php
                }
              ?>
                <div id="role"></div>
              </div>
             
          </div>
 
            <div class="control-group">
              <label class="control-label">备注：</label>
              <div class="controls control-row4">
                <textarea type="text" class="input-large" data-valid="{}" name="remark"></textarea>
              </div>
            </div>
            <hr>
            <div class="form-actions span5 offset3">
              <button id="btnSearch" type="button" onclick="add_post();" class="button button-primary">提交</button>
            </div>
        </form> 
      </div>
    </div>  
    <script src="<?=base_url()?>static/assets/js/jquery-1.8.1.min.js"></script>
<script src="http://g.tbcdn.cn/fi/bui/seed-min.js?t=201212261326"></script>    

<script>
//验证用户名
function check_username()
{
  var username = $("#username").val();
  if(username == ''){
    $("#user-err").remove();
    $("#username").after('<span class="x-field-error" id="user-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">用户名不能为空</label></span>');
    return false;
  }
    var aj = $.ajax( {
              url:'<?=base_url()?>account/check_username',
              data:{
                  
                  username : username,
                  
              },
              contentType:"application/x-www-form-urlencoded; charset=utf-8",
              type:'post',
              cache:false,
              dataType:'json',
              success:function(data){
                
                if(data.code != 0){
                  $("#user-err").remove();
                  $("#username").after('<span class="x-field-error" id="user-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">用户名不可用,已经存在</label></span>');
                  return false;
                }else{
                  $("#user-err").remove();
                  return true;
                }              
              },
              error : function() {
                  alert("请求失败，请重试");
              }
          });
}

//检查密码
function check_pawd()
{

  var pawd = '';
  pawd = $("#pawd").val();
  if(pawd == ''){
    $("#pawd-err").remove();
      $("#pawd").after('<span class="x-field-error" id="pawd-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">密码不能为空</label></span>');
      return false;
  }else{
      $("#pawd-err").remove();
      return true;
  }
}

function check_realname()
{
   var pawd = '';
  pawd = $("#realname").val();
  if(pawd == ''){
    $("#realname-err").remove();
      $("#realname").after('<span class="x-field-error" id="realname-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">请填写真实姓名</label></span>');
      return false;
  }else{
      $("#realname-err").remove();
      return true;
  } 
}

function check_role()
{
    var val=$('input:radio[name="role"]:checked').val();

      if(val==null){
          $("#role-err").remove();
          $("#role").html('<span class="x-field-error" id="role-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">请分配权限</label></span>');
          return false;
      }
      else{

          $("#role-err").remove();
          return true;
      }
}


function add_post()
{
  var username = $("#username").val();
  if(username == ''){
    $("#user-err").remove();
    $("#username").after('<span class="x-field-error" id="user-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">用户名不能为空</label></span>');
    return false;
  }
    var aj = $.ajax( {
              url:'<?=base_url()?>account/check_username',
              data:{
                  
                  username : username,
                  
              },
              contentType:"application/x-www-form-urlencoded; charset=utf-8",
              type:'post',
              cache:false,
              dataType:'json',
              success:function(data){
                
                if(data.code != 0){
                  $("#user-err").remove();
                  $("#username").after('<span class="x-field-error" id="user-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">用户名不可用,已经存在</label></span>');
                  return false;
                }else{
                  $("#user-err").remove();
                  if(check_pawd() && check_realname() && check_role()){
                      document.form1.submit();
                  }
                  return true;
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