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
            <a href="#">订单管理</a> <span class="divider">/</span>
          </li>
          <li class="active">修改订单</li>
        </ul>
    </div>
      <div class="span24">
        <h4>修改订单</h4>
        <hr>
       <form id="J_Form" name="form1" method="post" action="<?=base_url()?>admin/trade/edit" class="form-horizontal" enctype="multipart/form-data">

      <div class="control-group">
        <label class="control-label"><s>*</s>活动：</label>
        <div class="controls">
            <select name="act_id" class="input-lager">
              <?php
                foreach($activity as $k => $v){
              ?>
                <option value="<?=$v['id']?>:<?=$v['name']?>" <?php if($info['act_id'] == $v['id']){ ?> selected <?php } ?>><?=$v['name']?></option>
              <?php
                }
              ?>
            </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">订单号：</label>
        <div class="controls">
          <input name="order_no" type="text"  id="order_no" class="input-large" value="<?=$info['order_no']?>">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">买家：</label>
        <div class="controls">
          <input name="realname" type="text"  id="realname" class="input-small" value="<?=$info['realname']?>">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">手机号：</label>
        <div class="controls">
          <input name="phone" type="text"  id="phone" class="input-normal" value="<?=$info['phone']?>">
        </div>
      </div>
 
      <div class="control-group">
        <label class="control-label">总价：</label>
        <div class="controls">
          <input name="price" type="text"  id="price" class="input-small" value="<?=$info['price']?>">
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