<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=640,target-densitydpi=device-dpi,user-scalable=no">
<meta content="telephone=no" name="format-detection" />
<title>路上诚品</title>
<link href="<?=base_url()?>static/lushang/css/main.css" rel="stylesheet">
<link href="<?=base_url()?>static/lushang/css/animate.css" rel="stylesheet">
<style>
  
    #card {
        height: 100%;
        font-weight: bold;
        font-size: 40px;
        line-height: 75px;
        text-align: center;
        background: #FAFAFA;
    }
    
    #scratch {
        width: 100%;
        height: 75px;
        /*margin: 50px auto 0;*/
        border: 1px solid #ccc;
    }
    </style>
    <link rel="stylesheet" href="<?=base_url()?>static/dist/lucky-card.css">
    <script src="<?=base_url()?>static/dist/lucky-card.min.js"></script>
</head>
<body>
<section>
       <div class="ind_top">刮  奖<a href="javascript:void(0);" onclick="history.back();" class="left"><img src="<?=base_url()?>static/lushang/images/back.png"></a></div>
       <div class="ind_login"><p><?=$info['phone']?> 您好</p></div>
       <div class="ind_gua">
            <!--<h2><?=$info['pro_name']?></h2>-->
             <h2><?=sub_str($info['pro_name'],24)?><img src="<?=base_url()?>static/lushang/images/gua_tit.png"></h2>
            <div class="tu_db"><?=winning_status($info['winning'])?></div>
            <?php
                if($info['display']=='0'){
            ?>
            <div class="tu_sm">
              
                <div id="scratch">
                    <div id="card"><?=winning_status($info['winning'])?></div>
                </div>
                
            </div>
            <?php
              }
            ?>
       </div>
       <div class="gua_cont">
            <div class="hdgz">
                 <p class="tit">兑奖规则</p>
                 <ul>
                 <li><span>1、</span>用户必须参与本店指定商品的营销活动,才可以参加抽奖活动,具体参见商 品详情页。参与营销活动的具体商品达成销售目标后,所有参与购买的用户即可 参加抽奖。抽奖资格及中奖记录以本平台的记录为准。</li>
                 <li><span>2、</span>某一商品自达成销售目标的当日起计算三日内为数据处理时间,第四日至第 十日为用户刮奖时间。超出第十日用户未刮奖,则由系统自动开奖。</li>
                 <li><span>3、</span>用户可以在指定的查询页面查询中奖信息,获得旅游线路的用户需要提前 1 个月联系本店家沟通确认旅游套餐或客栈入住消费人和消费时间等信息,1 人 1 年内有效。获得客栈入住的用户需要提前 7 天联系本店家沟通确认客栈入住人和 入住时间等信息,1 人 1 年内有效。非中奖者本人入住,须中奖者本人书面确认</li>
                 <li><span>4、</span>本店客服信息<br>电邮:lushangchengpin@roadsun.cc<br>QQ:2597168959</li>

                 </ul>
            </div>
       </div>
</section>
<script src="<?=base_url()?>static/lushang/js/jquery-1.10.2.min.js"></script>
<script src="<?=base_url()?>static/lushang/js/main.js"></script>
    <script>
    LuckyCard.case({
        ratio: .7
    }, function() {
        //标记开奖
        
          var aj = $.ajax( {
              url:'<?=base_url()?>lucky/lotto_self',
              data:{
                  
                  id : '<?=$id?>',
                  
              },
              contentType:"application/x-www-form-urlencoded; charset=utf-8",
              type:'post',
              cache:false,
              dataType:'json',
              success:function(data){
                
               if(data.code == 0){
                 // window.location = '<?=base_url()?>products';
               }else{
                  alert(data.msg);
               }

              },
              error : function() {
                  alert("请求失败，请重试");
              }
          });
          
        this.clearCover();
    });
    </script>
</body>
</html>
