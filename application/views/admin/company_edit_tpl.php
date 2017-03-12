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
            <a href="#">企业列表</a> <span class="divider">/</span>
          </li>
          <li class="active">修改</li>
        </ul>
    </div>
      <div class="span24">
        <h2>修改企业信息</h2>
        <hr>
        <form id="J_Form" class="form-horizontal" method="post" action="<?=base_url()?>company/edit">
         
 
            <div class="control-group">
              <label class="control-label"><s>*</s>企业名称：</label>
              <div class="controls"><input class="input-large control-text" type="text" name="name" value="<?=$info['name']?>"></div>
            </div>
            <div class="control-group">
              <label class="control-label"><s>*</s>地址：</label>
              <div class="controls"><input class="input-large control-text" type="text" name="address" value="<?=$info['address']?>"></div>

            </div>
 
            <div class="control-group">
              <label class="control-label"><s>*</s>联系人：</label>
              <div class="controls"><input class="input-normal control-text" type="text" name="contacts" value="<?=$info['contacts']?>"></div>
            </div>
 
            <div class="control-group">
              <label class="control-label"><s>*</s>联系电话：</label>
              <div class="controls"><input class="input-normal control-text" type="text" name="phone" value="<?=$info['phone']?>"></div>
            </div>

            <div class="control-group">
              <label class="control-label"><s>*</s>Email：</label>
              <div class="controls"><input class="input-normal control-text" type="text" name="email" value="<?=$info['email']?>"></div>
            </div>
 
 
 
            <div class="control-group">
              <label class="control-label">仓原备注：</label>
              <div class="controls control-row4">
                <textarea type="text" class="input-large" data-valid="{}" name="remark"><?=$info['remark']?></textarea>
              </div>
            </div>
            <hr>
            <div class="form-actions span5 offset3">
            <input type="hidden" name="id" value="<?=$info['id']?>" />
              <button id="btnSearch" type="submit" class="button button-primary">提交</button>
              <button type="reset" class="button" onclick="history.back();">返回</button>
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
<!-- script end -->
  </div>
</body>
</html>