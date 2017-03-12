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
            <a href="#">业务管理</a> <span class="divider">/</span>
          </li>
          <li>
            <a class="active">订单管理</a>
          </li>
        </ul>
        <form class="form-panel" method="get" action="<?=base_url()?>admin/trade/index">
          <div class="panel-title">
            <span>
              <label>订单号：</label><input type="text" name="order_no" value="<?=$order_no?>" class="input-large control-text bui-form-field" />                
              
              <label>购买者：</label><input type="text" name="realname" value="<?=$realname?>" class="input-large control-text bui-form-field" /> 
              <label>电话：</label><input type="text" name="phone" value="<?=$phone?>" class="input-large control-text bui-form-field" /> 
              <button id="btnSearch" type="submit" class="button button-primary">搜索</button>
              <label><a href="<?=base_url()?>admin/trade/index">全部</a></label>

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
                <a href="<?=base_url()?>admin/trade/add">
                <li class="bui-bar-item-button bui-bar-item bui-inline-block" aria-disabled="false" id="bar-item-button1" aria-pressed="false">
                <button type="button" class="button button-small">
                <i class="icon-plus"></i>添加订单</button>
                </li></a>
                </ul>
            </th>
            </tr>

            <tr>
              <th width="15"></th>
              <th>ID</th>
              <th>订单号</th>
              <th>产品</th>
              <th>买家</th>
              <th>金额</th>
              <th>联系电话</th>

              <th>#</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($list as $k => $v){
            ?>
            <tr>
              <td><input type="checkbox"></td>
              <td ><?=$v['id']?></td>
              <td><?=$v['order_no']?></td>
              <td><?=$v['pro_name']?></td>
              <td><?=$v['realname']?></td>
               <td><?=$v['price']?></td>
              <td><?=$v['phone']?></td>

              <td>
              <a href="<?=base_url()?>admin/trade/edit?id=<?=$v['id']?>"><button class="button button-small button-warning">编辑</button></a> 
              <a href="javascript:void(0);" onclick="flush('删除后不能恢复，确定删除吗?','<?=base_url()?>admin/trade/del?id=<?=$v['id']?>')"><button class="button button-small button-danger">删除</button></a> 
            
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
<!-- script end -->
  </div>
    </body>
    </html>       