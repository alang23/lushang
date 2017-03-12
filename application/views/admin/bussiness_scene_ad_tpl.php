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
            <a href="#">首页</a> <span class="divider">/</span>
          </li>
          <li>
            <a href="#">商家管理</a> <span class="divider">/</span>
          </li>
          <li class="active">价格规则列表</li>
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
          <ul class="panel-content">
            <li>
              <select name="">
                <option>省份</option>
              </select>
              <select name="">
                <option>城市</option>
              </select>
              <select name="">
                <option>商品类型</option>
              </select>
              <select name="">
                <option>平台类型</option>
              </select>
              <select name="">
                <option>是否在商品池</option>
              </select>
              <select name="">
                <option>是否看样子</option>
              </select>
              <select name="">
                <option>是否已审核</option>
              </select>
            </li>
            
            <li>
            
              <button type="submit" class="button button-primary">查询>></button>
            </li>
          </ul>
        </form>
        <table cellspacing="0" class="table table-bordered">
          <thead>
            <tr><th colspan="20">
            <ul class="toolbar">
              <li><label class="checkbox"><input type="checkbox"><a href="#">全选</a></label></li>
              <li><label class="checkbox"><a href="<?=base_url()?>customer/add">添加企业</a></label></li>
            </ul>
            </th>
            </tr>

            <tr>
              <th>ID</th>
              <th>企业名称</th>
              <th>客户代表</th>
              <th>参展日期</th>
              <th>广告类型</th>
              <th>应收</th>
              <th>实收</th>
              <th>出票</th>
              <th>缴费</th>
              <th>是否作废</th>
              <th>扣税</th>
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
              <td><?=$v['realname']?></td>
              <td><?=date("Y-m-d",$v['show_time'])?></td>
              <td><?=$v['ad_type_name']?></td>
              <td><?=$v['y_amount']?></td>
              <td><?=$v['s_amount']?></td>
              <td>出票</td>
              <td><?=payment_status($v['payment'])?></td>
              <td><?=bussiness_status($v['status'])?></td>
              <td><?=get_invoice($v['invoice'])?></td>

              <td>
              <a href="<?=base_url()?>company/edit?id=<?=$v['id']?>">编辑</a> |
              <a href="javascript:void(0);" onclick="flush('删除后不能恢复，确定删除吗?','<?=base_url()?>company/del?id=<?=$v['id']?>')">删除</a> |
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