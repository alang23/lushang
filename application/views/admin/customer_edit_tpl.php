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
            <a href="#">客户管理</a> <span class="divider">/</span>
          </li>
          <li class="active">添加客户</li>
        </ul>
    </div>
      <div class="span24">
        <h4>添加客户</h4>
        <hr>
       <form id="J_Form" name="form1" method="post" action="<?=base_url()?>customer/edit" class="form-horizontal" enctype="multipart/form-data">
      <div class="control-group">
        <label class="control-label"><s>*</s>客户代表：</label>
        <div class="controls bui-form-group-select">
          <select class="input-small" name="uid">
          <?php
            foreach($account as $ak => $av){
          ?>
            <option value="<?=$av['id']?>:<?=$av['realname']?>" <?php if($av['id'] == $info['uid']){ ?> selected <?php } ?> ><?=$av['realname']?></option>
          <?php
            }
          ?>
          </select>&nbsp;&nbsp;
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><s>*</s>单位名称：</label>
        <div class="controls">
          <input name="c_name" type="text"  id="c_name" class="input-large"  value="<?=$info['c_name']?>">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><s>*</s>联系人：</label>
        <div class="controls">
          <input type="text" class="input-large" name="contacts" id="contacts" onblur="check_contacts();" value="<?=$info['contacts']?>" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><s>*</s>联系电话：</label>
        <div class="controls">
          <input type="text" class="input-large" id="tel" name="tel" value="<?=$info['tel']?>" onblur="check_tel();">
        </div>
      </div>
      <div class="control-group">
          <label class="control-label">所在地：</label>
          <div class="controls">
            <select class="input-small" name="province" id="province" onchange="get_city(this.value);">
              <option value="0:无">=省=</option>
              <?php
                foreach($province as $pk => $pv){
              ?>
              <option value="<?=$pv['id']?>:<?=$pv['categoryname']?>" <?php if($pv['id'] == $info['province']){?> selected <?php } ?>><?=$pv['categoryname']?></option>
              <?php
                }
              ?>
            </select>
          
            <select class="input-small" name="city" id="city">
              <option value="0:无">=市=</option>
              
            </select>
          </div>
        </div>
      <div class="control-group">
        <label class="control-label">单位地址：</label>
        <div class="controls">
          <input type="text" class="input-large" name="address" id="address" value="<?=$info['address']?>">
        </div>
      </div>
                  <div class="control-group">
        <label class="control-label">乘车路线：</label>
        <div class="controls">
          <input name="bus_line" type="text"  id="bus_line" class="input-large" value="<?=$info['bus_line']?>" >
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">官网：</label>
        <div class="controls">
          <input name="url" type="text"  id="url" class="input-large" value="<?=$info['url']?>">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">企业性质：</label>
        <div class="controls">
            <select class="input-large" name="nature" id="nature" >
              <option value="0:无">=企业性质=</option>
              <?php
                foreach($nature as $k => $v){
              ?>
              <option value="<?=$v['c_id']?>:<?=$v['c_name']?>" <?php if($v['c_id'] == $info['nature']){?> selected <?php } ?>><?=$v['c_name']?></option>
              <?php
                }
              ?>
            </select>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">公司规模：</label>
        <div class="controls">
            <select class="input-large" name="scale" id="scale" >
              <option value="0:无">=公司规模=</option>
              <?php
                foreach($scale as $sk => $sv){
              ?>
              <option value="<?=$sv['c_id']?>:<?=$sv['c_name']?>" <?php if($sv['c_id'] == $info['scale']){?> selected <?php } ?>><?=$sv['c_name']?></option>
              <?php
                }
              ?>
            </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">行业类型：</label>
        <div class="controls">
            <select class="input-large" name="industry" id="industry" >
              <option value="0:无">=行业类型=</option>
              <?php
                foreach($industry as $ik => $iv){
              ?>
              <option value="<?=$iv['c_id']?>:<?=$iv['c_name']?>" <?php if($iv['c_id'] == $info['industry']){?> selected <?php } ?>><?=$iv['c_name']?></option>
              <?php
                }
              ?>
            </select>
        </div>
      </div>

    <div class="control-group">
        <label class="control-label">签约协议：</label>
        <div class="controls  control-row-auto">
          <input name="xieyi" type="file"  id="xieyi" class="input-large">

        </div>
      </div>
     <div class="control-group">
        <label class="control-label">营业执照：</label>
        <div class="controls  control-row-auto">
          <input name="zhizhao" type="file"  id="zhizhao" class="input-large">

        </div>
      </div>


      <div class="control-group">
        <label class="control-label">公司简介：</label>
        <div class="controls  control-row-auto">
          <textarea name="remarks" id="remarks" class="control-row4 input-large"><?=$info['remarks']?></textarea>
        </div>
      </div>
      <div class="row actions-bar">       
          <div class="form-actions span13 offset3">
            <input type="hidden" name="id" value="<?=$info['id']?>" />
            <button type="button" onclick="add_post();" class="button button-primary">保存</button>
            <button type="reset" class="button">重置</button>
          </div>
      </div>       
    </form>
      </div>
    </div>  
    <script src="<?=base_url()?>static/assets/js/jquery-1.8.1.min.js"></script>
<script src="http://g.tbcdn.cn/fi/bui/seed-min.js?t=201212261326"></script>    

<script>
//检查密码
function check_name()
{

  var c_name = '';
  c_name = $("#c_name").val();

  if(c_name == ''){
    $("#c_name-err").remove();
      $("#c_name").after('<span class="x-field-error" id="c_name-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">单位名称不能为空</label></span>');
      return false;
  }else{

        var aj = $.ajax( {
              url:'<?=base_url()?>customer/check_company_ajax',
              data:{                 
                  c_name : c_name                 
              },
              contentType:"application/x-www-form-urlencoded; charset=utf-8",
              type:'post',
              cache:false,
              dataType:'json',
              success:function(data){
                //alert(data.code);
                if(data.code != 0){
                  $("#c_name-err").remove();
                  $("#c_name").after('<span class="x-field-error" id="c_name-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">'+data.msg+'</label></span>');
                  return false;
                }else{
                  $("#c_name-err").remove();
                  return true;
                }              
              },
              error : function() {
                  alert("请求失败，请重试");
              }
          });
      $("#c_name-err").remove();
      return true;
  }
}

function check_contacts()
{

  var contacts = '';
  contacts = $("#contacts").val();
  if(contacts == ''){
    $("#contacts-err").remove();
      $("#contacts").after('<span class="x-field-error" id="contacts-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">请填写联系人</label></span>');
      return false;
  }else{
      $("#contacts-err").remove();
      return true;
  }
}

function check_tel()
{

  var tel = '';
  tel = $("#tel").val();
  if(tel == ''){
    $("#tel-err").remove();
      $("#tel").after('<span class="x-field-error" id="tel-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">请填写联系电话</label></span>');
      return false;
  }else{
      $("#tel-err").remove();
      return true;
  }
}

function add_post()
{
  if(check_name() && check_contacts() && check_tel()){
      document.form1.submit();
  }
}


</script>
<!-- script end -->
<!-- script start --> 
<script type="text/javascript">
function get_city(id,now=0)
{

    
    var aj = $.ajax( {
              url:'<?=base_url()?>member/get_city_select',
              data:{
                  
                  id : id,
                  now : now
                  
              },
              contentType:"application/x-www-form-urlencoded; charset=utf-8",
              type:'post',
              cache:false,
              dataType:'json',
              success:function(data){
               
               if(data.code == 0){

                    $("#city").html(data.data);

               }else{
                
                  alert('error');

               }

              },
              error : function() {
                  alert("请求失败，请重试");
              }
          });
} 
$(function(){
  get_city('<?=$info['province']?>','<?=$info['city']?>');
})
      
</script>
  </div>
</body>
</html>