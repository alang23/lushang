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
       <div class="ind_top">中奖结果<a href="javascript:void(0);" onclick="history.back(-1);" class="left"><img src="<?=base_url()?>static/lushang/images/back.png"></a><a href="###" class="right">参与结果</a></div>
       <div class="ind_login"></div>
       <div class="result_bg">
            <div class="result_cont">
                 <ul class="list">
                 <?php
                    foreach($list as $k => $v){
                 ?>
                     <li><p class="lun">第<?=$v['rounds']?>轮刮奖</p><p class="name"><?=$v['realname']?></p><p class="phone"><?=view_phone($v['phone'])?></p></li>
                <?php
                    }
                ?>
                    
                 </ul>
            </div>
       </div>
</section>
<script src="<?=base_url()?>static/lushang/js/jquery-1.10.2.min.js"></script>
<script src="<?=base_url()?>static/lushang/js/main.js"></script>
</body>
</html>
