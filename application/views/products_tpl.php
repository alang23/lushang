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
       <a href="###" class="pro_nav"><img src="<?=base_url()?>static/lushang/images/nav_3.png"></a>
       <div class="ind_top">选择具体商品<a href="###" class="left"><img src="<?=base_url()?>static/lushang/images/back.png"></a><a href="###" class="right">参与活动</a></div>
       <div class="ind_login"></div>
       <ul class="pro_list">
       <?php
          foreach($products as $k => $v){
              if($v['passin'] == 1){
       ?>
           <li><div class="pic"><img src="<?=base_url()?>static/lushang/images/pro_pic.png"></div><h2>2元赢自驾获代金代金券</h2>
               <div class="surplus"></div><font><span>第<?=$k+1?>轮</span>  已流拍</font></li>
        <?php
              }else{
        ?>
           <a href="<?=base_url()?>lucky/index"><li><div class="pic"><img src="<?=base_url()?>static/lushang/images/pro_pic.png"></div><h2>2元赢自驾获代金代金券</h2>
               <div class="surplus">
                    <div class="all"><i class="sy"></i></div>
                    <p class="left">已售: <?=$v['num_s']?>份</p>
                    <p class="right">目标: <?=$v['num']?>份</p>
               </div><font><span>第<?=$k+1?>轮</span></font></li></a>
               <?php
                }
              }
               ?>
       </ul>
</section>
<script src="<?=base_url()?>static/lushang/js/jquery-1.10.2.min.js"></script>
<script src="<?=base_url()?>static/lushang/js/main.js"></script>
</body>
</html>
