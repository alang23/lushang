<!DOCTYPE HTML>
<html>
 <head>
  <title> 路上诚品-后台</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="<?=base_url()?>static/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
  <link href="<?=base_url()?>static/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
   <link href="<?=base_url()?>static/assets/css/main-min.css" rel="stylesheet" type="text/css" />
 </head>
 <body>

  <div class="header">
    
      <div class="dl-title">
        <a href="http://www.builive.com" title="文档库地址" target="_blank"><!-- 仅仅为了提供文档的快速入口，项目中请删除链接 -->
          <span class="lp-title-port">路上诚品</span><span class="dl-title-text"></span>
        </a>
      </div>

    <div class="dl-log">欢迎您，<span class="dl-log-user"><?=$userinfo['realname']?>(<?=$userinfo['works']?>)</span><a href="<?=base_url()?>admin/login/logout" title="退出系统" class="dl-log-quit">[退出]</a>
    </div>
  </div>
   <div class="content">
    <div class="dl-main-nav">
      <div class="dl-inform"><div class="dl-inform-title">贴心小秘书<s class="dl-inform-icon dl-up"></s></div></div>
      <ul id="J_Nav"  class="nav-list ks-clear">
        <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">功能管理</div></li>

      </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">

    </ul>
   </div>
  <script type="text/javascript" src="<?=base_url()?>static/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>static/assets/js/bui.js"></script>
  <script type="text/javascript" src="<?=base_url()?>static/assets/js/config.js"></script>

  <script>
    BUI.use('common/main',function(){
      var config = [{
          id:'menu', 
          homePage : 'main',
          //collapsed:true, //默认左侧菜单收缩
          menu:[{
              text:'业务管理',
              items:[
               {id:'main',text:'订单管理',href:'<?=base_url()?>admin/trade',closeable : false},
                {id:'customer',text:'活动管理',href:'<?=base_url()?>admin/activity'},
              ]
            },
        {
                text : '系统设置',
                items : [
                  {id : 'setting_ad',text : '修改密码',href : '<?=base_url()?>admin/setting/changepawd'}
                ]
              }]
          },{
            id : 'chart',
            menu : [{
              text : '图表',
              items:[
                  {id:'code',text:'引入代码',href:'chart/code.html'},
                  {id:'line',text:'折线图',href:'chart/line.html'},
                  {id:'area',text:'区域图',href:'chart/area.html'},
                  {id:'column',text:'柱状图',href:'chart/column.html'},
                  {id:'pie',text:'饼图',href:'chart/pie.html'}, 
                  {id:'radar',text:'雷达图',href:'chart/radar.html'}
              ]
            }]
          }];
      new PageUtil.MainPage({
        modulesConfig : config
      });
    });
  </script>
 </body>
</html>
