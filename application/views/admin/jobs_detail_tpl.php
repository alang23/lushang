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
            职位详情
          </li>
          
        </ul>
    </div>
      <div class="span24">
        <h4>职位信息</h4>
        <hr>
       <form id="J_Form" name="form1" method="post" action="<?=base_url()?>jobs/add" class="form-horizontal">
      <div class="control-group">
        <label class="control-label">企业名称：</label>
        <div class="controls">
            <?=$info['company_name']?>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><s>*</s>职位名称：</label>
        <div class="controls">
        <?=$info['jobs_name']?>
        </div>
      </div>
      <div class="control-group">
              <label class="control-label">性别：</label>    
              <div class="controls control-row-auto">
                  <?=$info['sex_cn']?>
                      
              </div>
      </div>


      <div class="control-group">
        <label class="control-label">学历：</label>
        <div class="controls">
            <?=$info['education_cn']?>
        </div>
      </div>

    <div class="control-group">
        <label class="control-label">年龄：</label>
        <div class="controls">
          <?=$info['age_cn']?>
        </div>
      </div>

    <div class="control-group">
        <label class="control-label">工作年限：</label>
        <div class="controls">
            <?=$info['experience_cn']?>
        </div>
      </div>
    <div class="control-group">
        <label class="control-label">薪资范围：</label>
        <div class="controls">
<?=$info['wage_cn']?>
        </div>
      </div>
      <div class="control-group">
          <label class="control-label">所在地：</label>
          <div class="controls">
          
          <?=$info['province_cn']?>/<?=$info['city_cn']?>
            
          </div>
        </div>

      <div class="control-group">
        <label class="control-label">联系人：</label>
        <div class="controls">
<?=$info['contacts']?>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">联系电话：</label>
        <div class="controls">
<?=$info['tel']?>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">邮箱：</label>
        <div class="controls">
<?=$info['email']?>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">职位描述：</label>
        <div class="controls  control-row-auto">
<?=$info['content']?>
        </div>
      </div>
      <div class="row actions-bar">       
          <div class="form-actions span13 offset3">
            <a href="javascript:history.back(-1);"><button type="button"  class="button button-primary">返回列表</button></a>
           
          </div>
      </div>       
    </form>
      </div>
    </div>  
    <script src="<?=base_url()?>static/assets/js/jquery-1.8.1.min.js"></script>
<script src="http://g.tbcdn.cn/fi/bui/seed-min.js?t=201212261326"></script>    

<script>







</script>
<!-- script end -->
<!-- script start --> 

  </div>
</body>
</html>