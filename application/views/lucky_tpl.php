<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=640,target-densitydpi=device-dpi,user-scalable=no">
<meta content="telephone=no" name="format-detection" />
<title>路上诚品</title>
<link href="<?=base_url()?>static/lushang/css/main.css" rel="stylesheet">
<link href="<?=base_url()?>static/lushang/css/animate.css" rel="stylesheet">

</head>
<body>
<section>
       <a href="<?=base_url()?>results" class="lucky_nav"><img src="<?=base_url()?>static/lushang/images/nav_2.png"></a>
       <div class="ind_top">你的幸运卡<a href="javascript:void();" onclick="history.back(-1);" class="left"><img src="<?=base_url()?>static/lushang/images/back.png"></a><a href="<?=base_url()?>lucky/lotto?phone=<?=$userinfo['phone']?>" class="right"><img src="<?=base_url()?>static/lushang/images/open.png">一键开奖</a></div>
       <div class="ind_login"></div>
       <ul class="lucky_list">
       <?php
       	foreach($lottery as $k => $v){
          if($v['display'] == '1'){
       ?>
           <li><h2><?=$v['pro_name']?></h2><p class="number">编号010001</p><p class="lun">第<?=$v['rounds']?>轮</p><p class="zt"><?=lottery_type($v['lottery_type'])?></p><font class="yzj"><?=winning_status($v['winning'])?></font><a href="<?=base_url()?>scratch/index?id=<?=$v['id']?>"></a></li>
       <?php
       	  }else{
       ?>
        <li><h2><?=$v['pro_name']?></h2><p class="number">编号010001</p><p class="lun">第<?=$v['rounds']?>轮</p><p class="zt">未开奖</p><font>未开奖</font><a href="<?=base_url()?>scratch/index?id=<?=$v['id']?>"></a></li>
        <?php
            }
          }
        ?>
       <!--
           <li><h2>噜噜自驾刮刮卡</h2><p class="number">编号010001</p><p class="lun">第X轮</p><p class="zt">系统刮奖</p><font>未中奖</font><a href="###"></a></li>
           <li><h2>噜噜自驾刮刮卡</h2><p class="number">编号010001</p><p class="lun">第X轮</p><p class="zt">2017/2/27 0:00 结束自助刮奖</p><a href="###"></a></li>
         -->  
       </ul>
</section>
<script src="<?=base_url()?>static/lushang/js/jquery-1.10.2.min.js"></script>
<script src="<?=base_url()?>static/lushang/js/main.js"></script>
</body>
</html>
