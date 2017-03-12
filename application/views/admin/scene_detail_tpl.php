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
              <a href="#">商家管理</a> <span class="divider">/</span>
            </li>
            <li class="active">价格规则列表</li>
          </ul>

          <div class="detail-section">  

          <h3>现场业务</h3>
          <hr>
          <form action="" class="form-horizontal form-horizontal-simple">
            <div class="control-group">
              <label class="control-label">企业名称：</label>
              <div class="controls">
              <span class="control-text"><?=$info['c_name']?></span>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">会员：</label>
              <div class="controls">
              <span class="control-text"><?=is_member($info['is_member'])?></span>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">客户代表：</label>
              <div class="controls">
              <span class="control-text"><?=$info['realname']?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">联系人：</label>
              <div class="controls">
              <span class="control-text"><?=$info['contacts']?></span>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">联系电话：</label>
              <div class="controls">
              <span class="control-text"><?=$info['phone']?></span>
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">参展日期：</label>
              <div class="controls">
              <span class="control-text"><?=date("Y-m-d",$info['show_time'])?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">展位：</label>
              <div class="controls">
              <span class="control-text"><?=$info['no_name']?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">缴费情况：</label>
              <div class="controls">
              <span class="control-text"><?=payment_status($info['payment'])?></span>
              </div>
            </div>
                        <div class="control-group">
              <label class="control-label">应缴费用：</label>
              <div class="controls">
              <span class="control-text"><?=$info['y_amount']?></span>
              </div>
            </div>
                        <div class="control-group">
              <label class="control-label">实缴费用：</label>
              <div class="controls">
              <span class="control-text"><?=$info['s_amount']?></span>
              </div>
            </div>

          <div class="control-group">
              <label class="control-label">出票：</label>
              <div class="controls">
              <span class="control-text"><?=do_ticket($info['s_ticket'])?></span>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">备注：</label>
              <div class="controls">
              <span class="control-text"><?=$info['remarks']?></span>
              </div>
            </div>



            <?php
              if($info['status'] != 0 ){
            ?>
            <div class="control-group">
              <label class="control-label">审核人：</label>
              <div class="controls">
              <span class="control-text"><?=$info['s_uid']?></span>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">审核时间：</label>
              <div class="controls">
              <span class="control-text"><?=$info['s_time']?></span>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">审核备注：</label>
              <div class="controls">
              <span class="control-text"><?=$info['content']?></span>
              </div>
            </div>
            <?php
              }
            ?>

            <div class="actions-bar">
              <div class="row form-actions ">
                <div class="span13 offset3 ">
                  <button type="button" class="button button-primary" onclick="history.back(-1);">返回</button>
                </div>
              </div>
            </div>
          </form>
        </div>
          
    <!-- script end -->
      </div>
    </body>
    </html>         