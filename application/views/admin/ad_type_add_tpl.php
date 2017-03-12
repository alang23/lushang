<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>添加广告位</title>
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
            <a href="#">商家管理</a> <span class="divider">/</span>
          </li>
          <li class="active">价格规则列表</li>
        </ul>
    </div>
      <div class="span24">
        <h3>添加广告位</h3>
        <hr>
        <form id="J_Form" name="form1" class="form-horizontal" method="post" action="<?=base_url()?>ad_type/add">
             <?php
            if($userinfo['company_id'] == '0'){
          ?> 
            <div class="control-group">
              <label class="control-label"><s>*</s>公司：</label>
              <div class="controls">
                <select name="company_id">
                    <option value="0-未知">公司</option>
            <?php
                foreach($company as $ck => $cv){
            ?>
                <option value="<?=$cv['id']?>-<?=$cv['name']?>"><?=$cv['name']?></option>
            <?php
                }
            ?>
                </select>
              </div>
            </div>
    <?php
        }
    ?>
 
            <div class="control-group">
              <label class="control-label"><s>*</s>广告位名称：</label>
              <div class="controls">
              <input class="input-normal control-text" type="text" name="ad_name" id="ad_name" onblur="check_adname();">
              </div>
            </div>
 
            <div class="control-group">
              <label class="control-label">备注：</label>
              <div class="controls control-row4">
                <textarea type="text" class="input-large" data-valid="{}" name="remarks"></textarea>
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

<script>


function check_adname()
{
   var ad_name = '';
  ad_name = $("#ad_name").val();
  if(pawd == ''){
    $("#ad_name-err").remove();
      $("#ad_name").after('<span class="x-field-error" id="ad_name-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">广告位名称</label></span>');
      return false;
  }else{
      $("#ad_name-err").remove();
      return true;
  } 
}

function do_post()
{
  document.form1.submit();
}

</script>
<!-- script end -->
  </div>
</body>
</html>