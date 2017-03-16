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
       <a href="<?=base_url()?>results"  class="lucky_nav"><img src="<?=base_url()?>static/lushang/images/nav_2.png"></a>
       <div class="ind_top">你的幸运卡<a href="<?=base_url()?>products"  class="left"><img src="<?=base_url()?>static/lushang/images/back.png"></a><a href="javascript:void(0);" class="ind_tc" onclick="display();"><img src="<?=base_url()?>static/lushang/images/open.png"></a></div>
       <div class="ind_login"><a href="javascript:void(0);" onclick="check_post('<?=$id?>');">一键开奖</a></div>
       
       <ul class="lucky_list">
       <?php
        foreach($lottery as $k => $v){
          if($v['display'] == '1'){
       ?>
           <li><h2><?=$v['pro_name']?></h2><p class="number">编号0<?=$v['rounds']?><?=$v['id']?></p><p class="lun">第<?=$v['rounds']?>轮</p><p class="zt"><?=date("Y-m-d H:i:s",$v['display_time'])?>结束 <?=lottery_type($v['lottery_type'])?></p><font class="yzj"><?=winning_status($v['winning'])?></font><a href="<?=base_url()?>scratch/index?id=<?=$v['id']?>"></a></li>
       <?php
          }else{
       ?>
        <li><h2><?=$v['pro_name']?></h2><p class="number">编号0<?=$v['rounds']?><?=$v['id']?></p><p class="lun">第<?=$v['rounds']?>轮</p><p class="zt">未开奖</p><font>未开奖</font><a href="<?=base_url()?>scratch/index?id=<?=$v['id']?>"></a></li>
        <?php
            }
          }
        ?>
           
       </ul>
       <div class="tc_box" id="tc_box" style="display:none">
            <img src="<?=base_url()?>static/lushang/images/tc_top.png" class="tc_jt">
            <ul class="tc_list">
                <li><a href="<?=base_url()?>lucky/index?display=0&id=<?=$id?>">未开奖</a></li>
                <li><a href="<?=base_url()?>lucky/index?winning=1&id=<?=$id?>">已中奖</a></li>
                <li><a href="<?=base_url()?>lucky/index?id=<?=$id?>">全部</a></li>
            </ul>
       </div>

</section>
<script src="<?=base_url()?>static/lushang/js/jquery-1.10.2.min.js"></script>
<script src="<?=base_url()?>static/lushang/js/main.js"></script>
<script src="<?=base_url()?>static/layer/layer.js"></script>

<script>
function display()
{
    var css = $("#tc_box").css('display');
    if(css == 'none'){
        $("#tc_box").css('display','block');
    }else{
        $("#tc_box").css('display','none');
    }
}

function check_post(id)
{
//询问框
layer.confirm('确定一键刮奖吗?', {
  title : '提示',
  btn: ['确定','取消'] //按钮
}, function(){
  //layer.msg('的确很重要', {icon: 1});
  window.location = '<?=base_url()?>lucky/lotto?act_id'+id;
}, function(){

});}
</script>
</body>
</html>
