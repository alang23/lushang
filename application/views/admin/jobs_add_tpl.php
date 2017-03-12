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
            <a href="#">职位管理</a> <span class="divider">/</span>
          </li>
          <li>
            添加职位
          </li>
          
        </ul>
    </div>
      <div class="span24">
        <h4>发布职位</h4>
        <hr>
       <form id="J_Form" name="form1" method="post" action="<?=base_url()?>jobs/add" class="form-horizontal">
      <div class="control-group">
        <label class="control-label">企业名称：</label>
        <div class="controls">
            <select class="input-large" name="company_id" id="company_id" >
            
              <option value="0:无">==公司==</option>
              <?php
                foreach($company as $cok => $cov){
              ?>
              <option value="<?=$cov['id']?>:<?=$cov['c_name']?>" <?php if($cov['id'] == $company_id){ ?> selected <?php } ?>><?=$cov['c_name']?></option>
              <?php
                }
              ?>
            </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><s>*</s>职位名称：</label>
        <div class="controls">
          <input name="jobs_name" type="text"  id="jobs_name" class="input-large" onblur="check_name();">
        </div>
      </div>
      <div class="control-group">
              <label class="control-label">性别：</label>    
              <div class="controls control-row-auto">
                <label class="radio">
                  <input type="radio" name="sex" value="1:男" >男
                </label>
                <label  class="radio">
                  <input id="chk" type="radio" name="sex" value="2:女">女 
                </label>
                <label class="radio">
                  <input type="radio" name="sex" value="3:不限" checked="true">不限
                </label>
                      
              </div>
      </div>


      <div class="control-group">
        <label class="control-label">学历：</label>
        <div class="controls">
            <select class="input-large" name="education" id="education" >
            
              <option value="0:不限">不限</option>
              <?php
                foreach($education as $ek => $ev){
              ?>
              <option value="<?=$ev['c_id']?>:<?=$ev['c_name']?>"><?=$ev['c_name']?></option>
              <?php
                }
              ?>
            </select>
        </div>
      </div>

    <div class="control-group">
        <label class="control-label">年龄：</label>
        <div class="controls">
            <select class="input-large" name="age" id="age" >
            
              <option value="0:不限">不限</option>
              <?php
                foreach($age as $ak => $av){
              ?>
              <option value="<?=$av['c_id']?>:<?=$av['c_name']?>"><?=$av['c_name']?></option>
              <?php
                }
              ?>              
            </select>
        </div>
      </div>

    <div class="control-group">
        <label class="control-label">工作年限：</label>
        <div class="controls">
            <select class="input-large" name="experience" id="experience" >
            
              <option value="0:不限">不限</option>
              <?php
                foreach($experience as $ek => $ev){
              ?>
              <option value="<?=$ev['c_id']?>:<?=$ev['c_name']?>"><?=$ev['c_name']?></option>
              <?php
                }
              ?>              
            </select>
        </div>
      </div>
    <div class="control-group">
        <label class="control-label">薪资范围：</label>
        <div class="controls">
            <select class="input-large" name="wage" id="wage" >
            
              <option value="0:不限">不限</option>
              <?php
                foreach($wage as $wa => $wv){
              ?>
              <option value="<?=$wv['c_id']?>:<?=$wv['c_name']?>"><?=$wv['c_name']?></option>
              <?php
                }
              ?>              
            </select>
        </div>
      </div>
      <div class="control-group">
          <label class="control-label">所在地：</label>
          <div class="controls">
            <select class="input-small" name="province" id="province" onchange="get_city(this.value);">
              <option value="0:无">=省=</option>
              <?php
                foreach($province as $k => $v){
              ?>
              <option value="<?=$v['id']?>:<?=$v['categoryname']?>"><?=$v['categoryname']?></option>
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
        <label class="control-label">联系人：</label>
        <div class="controls">
          <input type="text" class="input-large" name="contacts" id="contacts" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">联系电话：</label>
        <div class="controls">
          <input type="text" class="input-large" name="tel" id="tel" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">邮箱：</label>
        <div class="controls">
          <input type="text" class="input-large" name="email" id="email" >
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">职位描述：</label>
        <div class="controls  control-row-auto">
          <textarea name="content" id="content" class="control-row4 input-large"></textarea>
        </div>
      </div>
      <div class="row actions-bar">       
          <div class="form-actions span13 offset3">
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

  var jobs_name = '';
  jobs_name = $("#jobs_name").val();
  var company_id = '<?=$company_id?>';

  if(jobs_name == ''){
    $("#jobs_name-err").remove();
      $("#jobs_name").after('<span class="x-field-error" id="jobs_name-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">单位名称不能为空</label></span>');
      return false;
  }else{

        var aj = $.ajax( {
              url:'<?=base_url()?>jobs/check_name',
              data:{                 
                  jobs_name : jobs_name,
                  company_id : company_id                 
              },
              contentType:"application/x-www-form-urlencoded; charset=utf-8",
              type:'post',
              cache:false,
              dataType:'json',
              success:function(data){
                //alert(data.code);
                if(data.code != 0){
                  $("#jobs_name-err").remove();
                  $("#jobs_name").after('<span class="x-field-error" id="jobs_name-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">'+data.msg+'</label></span>');
                  return false;
                }else{
                  $("#jobs_name-err").remove();
                  return true;
                }              
              },
              error : function() {
                  alert("请求失败，请重试");
              }
          });
      $("#jobs_name-err").remove();
      return true;
  }
}



function add_post()
{
 // if(check_name()){
      document.form1.submit();
  //}
}


</script>
<!-- script end -->
<!-- script start --> 
<script type="text/javascript">
function get_city(id)
{

    
    var aj = $.ajax( {
              url:'<?=base_url()?>member/get_city_select',
              data:{
                  
                  id : id,
                  
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
 
      
</script>
  </div>
</body>
</html>