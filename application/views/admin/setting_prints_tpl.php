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
          <div class="span24">
            <h2></h2>
            <hr>
            <form id="J_Form" class="form-horizontal" method="post" action="<?=base_url()?>setting/prints">
              <h3>打印机设置：</h3>
     
                <div class="control-group">
                  <label class="control-label">凭据打印机：</label>
                  <div class="controls">
                    <input type="text" name="pingju" value="<?php echo isset($info['pingju']['tag_v'] ) ?$info['pingju']['tag_v'] : ''; ?>" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">餐票打印机：</label>
                  <div class="controls">
                    <input type="text" name="canpiao" value="<?php echo  isset($info['canpiao']['tag_v'] ) ?$info['canpiao']['tag_v'] : ''; ?>">                   
                  </div>
                </div>
     
                <div class="control-group">
                  <label class="control-label">求职打印机：</label>
                  <div class="controls">
                    <input type="text" name="works" value="<?php echo  isset($info['works']['tag_v'] ) ?$info['works']['tag_v'] : ''; ?>">                   
                  </div>
                </div>
                <hr>
                <div class="form-actions span5 offset3">
                  <button id="btnSearch" type="submit" class="button button-primary">提交</button>
                </div>
            </form> 
          </div>
        </div>      <!-- script end -->
      </div>
    </body>
    </html>    