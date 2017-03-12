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
            <a class="active">活动管理</a>
          </li>
        </ul>

        <table cellspacing="0" class="table table-bordered">
          <thead>
            <tr>
            <th colspan="15">
                <ul class="bui-bar bui-grid-button-bar" role="toolbar" id="bar7" aria-disabled="false" aria-pressed="false">
                <a href="<?=base_url()?>admin/activity/add">
                <li class="bui-bar-item-button bui-bar-item bui-inline-block" aria-disabled="false" id="bar-item-button1" aria-pressed="false">
                <button type="button" class="button button-small">
                <i class="icon-plus"></i>添加活动</button>
                </li></a>
                </ul>
            </th>
            </tr>

            <tr>
              <th width="15"></th>
              <th>ID</th>
              <th>ICON</th>
              <th>活动名称</th>
              <th>价格</th>
              <th>拍卖份数</th>
              <th>已拍份数</th>
              <th>是否流拍</th>
              <th>轮次</th>
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
               <td><img src="<?=base_url()?>uploads/activity/<?=$v['pic']?>"  width="60px" height="60px"/></td>
              <td ><?=$v['name']?></td>
              <td><?=$v['price']?></td>
              <td><?=$v['num']?></td>
              <td><?=$v['num_s']?></td>
              <td><?=passin_status($v['passin'])?></td>
              <td><?=$v['rounds']?></td>

              <td>
              <a href="<?=base_url()?>admin/activity/edit?id=<?=$v['id']?>"><button class="button button-small button-warning">编辑</button></a> 
              <a href="javascript:void(0);" onclick="flush('删除后不能恢复，确定删除吗?','<?=base_url()?>admin/activity/del?id=<?=$v['id']?>')"><button class="button button-small button-danger">删除</button></a> 
              <?php
                  if($v['do_ticket'] == '0'){
              ?>
              <a href="<?=base_url()?>admin/activity/lottery?id=<?=$v['id']?>"><button class="button button-small button-success">生成奖券</button></a> 
              <?php
                  }else{
              ?>
              <a href="<?=base_url()?>admin/lottery/index?id=<?=$v['id']?>"><button class="button button-small button-info">奖券列表</button></a> 

              <?php
                }
              ?>
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