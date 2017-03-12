    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>简单表单页</title>
    <!-- 此文件为了显示Demo样式，项目中不需要引入 -->
     
      <link href="<?=base_url()?>static/assets/css/bs3/dpl.css" rel="stylesheet">
      <link href="<?=base_url()?>static/assets/css/bs3/bui.css" rel="stylesheet">
     
    </head>
    <body>
  <div class="container">
     
    <!-- 简单详情页 ================================================== -->
        <div class="doc-content">
          <ul class="breadcrumb">
            <li>
              <a href="#">首页</a> <span class="divider">/</span>
            </li>
            <li>
              <a href="#">账号列表</a> <span class="divider">/</span>
            </li>
            <li class="active">账号详情</li>
          </ul>

          <div class="detail-section">  

          <h3>账户详情</h3>
          <hr>
          <form action="" class="form-horizontal form-horizontal-simple">
            <div class="control-group">
              <label class="control-label">用户名：</label>
              <div class="controls">
              <span class="control-text"><?=$info['username']?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">姓名：</label>
              <div class="controls">
              <span class="control-text"><?=$info['realname']?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">性别：</label>
              <div class="controls">
              <span class="control-text"><?=get_gender($info['gender'])?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">公司：</label>
              <div class="controls">
              <span class="control-text"><?=$info['realname']?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">联系电话：</label>
              <div class="controls">
              <span class="control-text"><?=$info['phone']?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Email：</label>
              <div class="controls">
              <span class="control-text"><?=$info['email']?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">权限：</label>
              <div class="controls">
              <span class="control-text"><?=$info['role_name']?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">备注：</label>
              <div class="controls">
              <span class="control-text"><?=$info['remark']?></span>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">创建时间：</label>
              <div class="controls">
              <span class="control-text"><?=date("Y-m-d H:i:s",$info['addtime'])?></span>
              </div>
            </div>
            <div class="actions-bar">
              <div class="row form-actions ">
                <div class="span13 offset3 ">
                  <a href="<?=base_url()?>account/index" ><button type="button" class="button button-primary" >返回</button></a>
                 
                </div>
              </div>
            </div>
          </form>
        </div>
          
    <!-- script end -->
      </div>
    </body>
    </html>         