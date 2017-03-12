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
            <a href="#">广告管理</a> <span class="divider">/</span>
          </li>
          <li class="active">
            广告视图</a> 
          </li>
        </ul>
        <form class="form-panel" action="post">
          <div class="panel-title">
            <span>
              <label>报名日期：</label><input type="text" class="calendar" /> <label>至</label> <input type="text" class="calendar" />
            </span>
            <span>
              <label>上阶段审核日期：</label><input type="text" class="calendar" /> <label>至</label> <input type="text" class="calendar" />
            </span>
          </div>

        </form>
        <table cellspacing="0" class="table table-bordered">
          <thead>
            <tr><th colspan="20">
                       </th>
            </tr>

            <tr>
              <th>ID</th>
              <th>企业名称</th>
              <th>张贴时间</th>
              <th>到期时间</th>
              <th>展位</th>
              <th>是否制作</th>
              <th>制作时间</th>
              <th>是否作废</th>
              <th>是否上传资料</th>
              <th>备注</th>
              <th>#</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($list as $k => $v){
            ?>
            <tr>
              <td ><?=$v['id']?></td>
              <td><?=$v['c_name']?> <a href="<?=base_url()?>customer/detail?id=<?=$v['id']?>">查看</a></td>
              <td><?=date("Y-m-d",$v['show_time'])?></td>
              <td><?=date("Y-m-d",$v['show_time'])?></td>
              <td><?=$v['ad_type_name']?></td>
              <td><?=$v['y_amount']?></td>
              <td><?=$v['s_amount']?></td>
              <td><?=payment_status($v['payment'])?></td>
              <td><?=is_upload($v['is_upload'])?></td>
              <td><?=get_invoice($v['invoice'])?></td>

              <td>
              <a href="<?=base_url()?>bussiness/scene_detail?id=<?=$v['id']?>">查看详情</a>

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