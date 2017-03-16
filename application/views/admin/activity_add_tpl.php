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
            <a href="#">业务管理</a> <span class="divider">/</span>
          </li>
          <li>
            <a href="#">活动管理</a> <span class="divider">/</span>
          </li>
          <li class="active">添加活动</li>
        </ul>
    </div>
      <div class="span24">
        <h4>添加活动</h4>
        <hr>
       <form id="J_Form" name="form1" method="post" action="<?=base_url()?>admin/activity/add" class="form-horizontal" enctype="multipart/form-data">

      <div class="control-group">
        <label class="control-label"><s>*</s>活动名称：</label>
        <div class="controls">
          <input name="name" type="text"  id="name" class="input-large" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">活动轮次：</label>
        <div class="controls">
          <input name="rounds" type="text"  id="rounds" class="input-small" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">价格：</label>
        <div class="controls">
          <input name="price" type="text"  id="price" class="input-small" value="0">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">拍卖份数：</label>
        <div class="controls">
          <input name="num" type="text"  id="num" class="input-small" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">已拍份数：</label>
        <div class="controls">
          <input name="num_s" type="text"  id="num_s" class="input-small"  value="0">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">是否流拍：</label>
        <div class="controls">
              <input name="passin" type="checkbox" value="1" />
        </div>
      </div>
            <div class="control-group">
        <label class="control-label">是否完成：</label>
        <div class="controls">
              <input name="enabled" type="checkbox" value="1" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">IOCN：</label>
        <div class="controls  control-row-auto">
          <input name="userfile" type="file"  class="input-large">

        </div>
      </div>

      <div class="control-group">
        <label class="control-label">排序：</label>
        <div class="controls">
          <input name="rank" type="text"  id="rank" class="input-small"  value="0">
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




function add_post()
{

    var name = $("#name").val();
    if(name == ''){
        alert('请填写活动名称');
        return false;
    }
    document.form1.submit();
    
}


</script>
  </div>
</body>
</html>