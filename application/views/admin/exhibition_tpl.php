    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>简单表单页</title>
    <!-- 此文件为了显示Demo样式，项目中不需要引入 -->
   
    <link href="<?=base_url()?>static/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>static/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?=base_url()?>static/js/jquery.js"></script>
    <script type="text/javascript" src="<?=base_url()?>static/layer/layer.js"></script>
  <script>
function flush(msg,url){
  layer.confirm(msg, {
    btn: ['确定','取消'] //按钮
  }, function(){
      //window.location=url;
      window.location=url;
      //alert(url);
  }, function(){
          //window.location=url;

  });
}
  </script>
    </head>
    <body>
  <div class="container">
    
<!-- 简单搜索页 ================================================== -->
    <div class="row">
      <div class="doc-content">
        <ul class="breadcrumb">
          <li>
            <a href="#">系统设置</a> <span class="divider">/</span>
          </li>
          <li>
            <a class="active">展位管理</a>
          </li>
        </ul>
        <form class="form-panel" method="get" action="<?=base_url()?>ad_type/index">
          <div class="panel-title">
            <span>
              <label>公司名称：</label><input type="text" name="c_name"  class="input-large control-text bui-form-field" /> 
              
              <label>联系人：</label><input type="text" name="contacts"  class="input-large control-text bui-form-field" /> 
              <label>电话：</label><input type="text" name="phone"  class="input-large control-text bui-form-field" /> 
              <button id="btnSearch" type="submit" class="button button-primary">搜索</button>
              <label><a href="<?=base_url()?>customer/index">全部</a></label>

           </span>
          </div>
          <ul class="panel-content">


          </ul>
        </form>
        <table cellspacing="0" class="table table-bordered">
          <thead>
            <tr>
            <th colspan="15">
                <ul class="bui-bar bui-grid-button-bar" role="toolbar" id="bar7" aria-disabled="false" aria-pressed="false">
                <a href="<?=base_url()?>exhibition/add"><li class="bui-bar-item-button bui-bar-item bui-inline-block" aria-disabled="false" id="bar-item-button1" aria-pressed="false">
                <button type="button" class="button button-small" id="btnShow">
                <i class="icon-plus"></i>添加展位</button>
                </li></a>
                </ul>
            </th>
            </tr>

            <tr>
              <th>ID</th>
              <th>展位名称</th>
              <th>公司</th>
              <th>备注</th>
              <th>排序</th>

              <th>#</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($list as $k => $v){
            ?>
            <tr>
              <td ><?=$v['id']?></td>
              <td><?=$v['ex_name']?></td>
              <td><?=$v['company_name']?></td>
              <td><?=$v['remarks']?></td>
              <td><?=$v['rank']?></td>
              <td>
              <a href="<?=base_url()?>exhibition/edit?id=<?=$v['id']?>"><button class="button button-small button-warning">编辑</button></a>
              <a href="javascript:void(0);" onclick="flush('删除后不能恢复，确定删除吗?','<?=base_url()?>exhibition/del?id=<?=$v['id']?>')"><button class="button button-small button-danger">删除</button></a>

              </td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
        <div>

          <div class="pagination pull-right">
            <ul>

              <?=$page?>
            </ul>
          </div>
        </div>
      </div>
    </div> 



  <script src="<?=base_url()?>static/assets/js/jquery-1.8.1.min.js"></script>

<!-- script end -->
  </div>
    </body>
    </html>       