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
            <a href="#">首页</a> <span class="divider">/</span>
          </li>
          <li>
            <a href="#">账号列表</a> <span class="divider">/</span>
          </li>
          <li class="active">修改信息</li>
        </ul>
    </div>
      <div class="span24">
        <h3>修改信息</h3>
        <hr>
        <form id="J_Form" class="form-horizontal" method="post" action="<?=base_url()?>account/edit">
   
 
            <div class="control-group">
              <label class="control-label"><s>*</s>登陆账号：</label>
              <div class="controls">
              <?=$info['username']?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label"><s>*</s>密码：</label>
              <div class="controls"><input class="input-normal control-text" type="text" name="pawd"></div>
            <span class="x-field-error"><span class="x-icon x-icon-mini x-icon-question">!</span><label class="x-field-error-text">不修改不需要填写</label></span>            </div>
            <?php
              if(in_array('root', $roles) && $userinfo['company_id']=='0'){
            ?>
             <div class="control-group">
              <label class="control-label">公司：</label>
              <div class="controls">
                <select name="company_id" class="input-normal"> 
                  <?php
                    foreach($company as $ck => $cv){
                  ?>
                  <option value="<?=$cv['id']?>" ><?=$cv['name']?></option>
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
              <input class="input-normal control-text" type="text" name="realname" value="<?=$info['realname']?>">
                <span class="x-field-error">
                
              </div>
            </div>
 
            <div class="control-group">
            <label class="control-label"><s>*</s>性别：</label>
              <label class="control-label radio">
                <input type="radio" name="gender" value="1" <?php if($info['gender'] == 1){ ?> checked <?php } ?>> 男
                <input type="radio" name="gender" value="2" <?php if($info['gender'] == 2){ ?> checked <?php } ?>> 女
              </label>
             
            </div>

            <div class="control-group">
              <label class="control-label"><s>*</s>职位：</label>
              <div class="controls"><input class="input-normal control-text" type="text" name="works" value="<?=$info['works']?>"></div>
            </div>
 
             <div class="control-group">
              <label class="control-label"><s>*</s>电话：</label>
              <div class="controls"><input class="input-normal control-text" type="text" name="phone" value="<?=$info['phone']?>"></div>
            </div>

            <div class="control-group">
              <label class="control-label"><s>*</s>Email：</label>
              <div class="controls"><input class="input-normal control-text" type="text" name="email" value="<?=$info['email']?>"></div>
            </div>

            
         <div class="control-group">
            <label class="control-label"><s>*</s>权限：</label>
              <div class="controls">
              <?php
                foreach($_role as $_k => $_v){
              ?>
                <input type="radio" name="role" value="<?=$_v['id']?>" <?php if($_v['id'] == $info['role']){ ?> checked <?php } ?>> <?=$_v['role_name']?>
              <?php
                }
              ?>
              </div>
             
          </div>
 

            <div class="control-group">
              <label class="control-label">备注：</label>
              <div class="controls control-row4">
                <textarea type="text" class="input-large" data-valid="{}" name="remark"><?=$info['remark']?></textarea>
              </div>
            </div>
            <hr>
            <div class="form-actions span5 offset3">
            <input type="hidden" value="<?=$info['id']?>" name="id" />
              <button id="btnSearch" type="submit" class="button button-primary">提交</button>
            </div>
        </form> 
      </div>
    </div>  
    <script src="<?=base_url()?>static/assets/js/jquery-1.8.1.min.js"></script>
<script src="http://g.tbcdn.cn/fi/bui/seed-min.js?t=201212261326"></script>    
<script type="text/javascript">
      BUI.use('bui/form',function  (Form) {
        new Form.Form({
          srcNode : '#J_Form'
        }).render();
      });
    </script>
<script>
//验证用户名
function check_username()
{
  var username = $("#username").val();
  if(username == ''){
    $("#username").after('<span class="x-field-error"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">输入值长度不小于5！</label></span>');
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
                  $("#username").after('<span class="x-field-error"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">用户名不可用,已经存在</label></span>');
                }else{
                  $(".x-field-error").remove();
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