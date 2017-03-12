<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>表单页</title>
<!-- 此文件为了显示Demo样式，项目中不需要引入 -->
 
  <link href="<?=base_url()?>static/assets/css/bs3/dpl.css" rel="stylesheet">
  <link href="<?=base_url()?>static/assets/css/bs3/bui.css" rel="stylesheet">
 <link rel="stylesheet" href="<?=base_url()?>static/plus/selected/chosen.css" />
</head>
<body>
  <div class="container">
    
    <!-- 表单页 ================================================== --> 
    <div class="row">
    <div class="doc-content">
      <ul class="breadcrumb">
          <li>
            <a href="#">业务管理</a> <span class="divider">/</span>
          </li>
          <li>
            <a href="#">办理业务</a> <span class="divider">/</span>
          </li>
          <li class="active">现场业务</li>
        </ul>
    </div>
      <div class="span24">
      <button class="button   button-success">现场业务</button>
      <a href="<?=base_url()?>bussiness/index?type=ad&bussiness_id=<?=$bussiness_id?>"><button class="button">广告业务</button></a>       
      <hr>
      <form id="J_Form" name="form1" method="post" action="<?=base_url()?>bussiness/add_ex" class="form-horizontal" enctype="multipart/form-data">
      
      <div class="control-group">
        <label class="control-label">企业：</label>
        <div class="controls  control-row-auto">
                <select name="bussiness_id" id="bussiness_id" class="input-large" onchange="get_customer_info()"> 
                <?php
                  foreach($bussiness as $bk => $bv){
                ?>
                  <option value="<?=$bv['id']?>:<?=$bv['c_name']?>" <?php if($bussiness_id == $bv['id']){?> selected <?php } ?> ><?=$bv['c_name']?></option>
                <?php
                  }
                ?>
                </select>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">参展时间:</label>
        <div class="controls">
          <input type="text" class="calendar" name="show_time" id="show_time" value="<?=date("Y-m-d")?>">
        </div>
      </div>
            <div class="control-group">
        <label class="control-label">到场次数:</label>
        <div class="controls">
          <input type="text"  class="input-small" name="num_ex" id="num_ex" value="<?=$customer['num_ex']?>" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><s>*</s>展位号：</label>
        <div class="controls">
        <!--
                <select name="no_id" class="input-normal"> 
                <?php
                  foreach($booth as $bk => $bv){
                ?>
                  <option value="<?=$bv['id']?>:<?=$bv['ex_name']?>"  ><?=$bv['ex_name']?></option>
                <?php
                  }
                ?>
                </select>
                -->
          <input type="text"  class="input-small" name="no_id" id="no_id" value="" >

        </div>
      </div>
      <div class="control-group">
        <label class="control-label">是否会员：</label>
            <div class="controls" >
              <input name="is_member" type="checkbox" value="1" />
            </div>
      </div>
      <div class="control-group">
        <label class="control-label">VIP签到：</label>
            <div class="controls" >
              <input name="is_vip" type="checkbox" value="1" />
            </div>
      </div>
      <div class="control-group">
        <label class="control-label">是否缴费：</label>
        <div class="controls">
              <input name="payment" type="checkbox" value="1" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">是否扣税：</label>
        <div class="controls">
              <input name="invoice" type="checkbox" value="1" />
        </div>
      </div>


            <div class="control-group">
              <label class="control-label">付款方式：</label>    
              <div class="controls control-row-auto">
                <label class="radio">
                  <input type="radio" name="pay_type" value="1" checked="1">现金
                </label>
                <label  class="radio">
                  <input id="chk" type="radio" name="pay_type" value="2">转账  
                </label>
                <label class="radio">
                  <input type="radio" name="pay_type" value="4">微信
                </label>
                <label class="radio">
                  <input type="radio" name="pay_type" value="3">刷卡
                </label>
                      
              </div>
            </div>

            <div class="control-group">
        <label class="control-label">应收金额：</label>
        <div class="controls  control-row-auto">
          <input name="y_amount" type="text"  id="y_amount" class="input-large" value="0.00" >
        </div>
      </div>

            <div class="control-group">
        <label class="control-label">实收金额：</label>
        <div class="controls  control-row-auto">
            <input name="s_amount" type="text"  id="s_amount" class="input-large" value="0.00" >

        </div>
      </div>

      <div class="control-group">
        <label class="control-label">收费项目：</label>
        <div class="controls  control-row-auto">
                <select name="pay_project" class="input-normal"> 
                <?php
                  foreach($charge_type as $ckt => $ckv){
                ?>
                  <option value="<?=$ckv['id']?>"><?=$ckv['name']?></option>
                <?php
                  }
                ?>
                </select>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">中餐：</label>
        <div class="controls  control-row-auto">
          <input name="c_food" type="text"  id="c_food" class="input-normal" value="0" >
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">西餐：</label>
        <div class="controls  control-row-auto">
            <input name="e_food" type="text"  id="e_food" class="input-normal" value="0" >
        </div>
      </div>

            <div class="control-group">
        <label class="control-label">联系人：</label>
        <div class="controls  control-row-auto">
            <input name="contacts" type="text"  id="contacts" class="input-large" value="<?php echo isset($company_info['contacts']) ? $company_info['contacts'] : '';?>" >
        </div>
      </div>

            <div class="control-group">
        <label class="control-label">联系电话：</label>
        <div class="controls  control-row-auto">
          <input name="phone" type="text"  id="phone" class="input-large" value="<?php echo isset($company_info['tel']) ? $company_info['tel'] : '';?>">

        </div>
      </div>

      <div class="control-group">
        <label class="control-label">文件：</label>
        <div class="controls  control-row-auto">
          <input name="userfile" type="file"  id="file" class="input-large">

        </div>
      </div>

      <div class="control-group">
        <label class="control-label">备注：</label>
        <div class="controls  control-row-auto">
          <textarea name="remarks" id="remarks" class="control-row4 input-large"></textarea>
        </div>
      </div>

      <div class="row actions-bar">       
          <div class="form-actions span13 offset3">
            <button type="button" onclick="do_post();" class="button button-primary">保存</button>
            <button type="reset" class="button">重置</button>
          </div>
      </div>       
    </form>
      </div>
    </div>  
<script src="<?=base_url()?>static/assets/js/jquery-1.8.1.min.js"></script>
<script src="http://g.tbcdn.cn/fi/bui/seed-min.js?t=201212261326"></script> 
<script type="text/javascript" src="<?=base_url()?>static/layer/layer.js"></script>
<script src="<?=base_url()?>static/plus/selected/chosen.jquery.js" type="text/javascript"></script>
<!-- script start --> 
    <script type="text/javascript">
      BUI.use('bui/form',function(Form){
      
      
      new Form.Form({
        srcNode : '#J_Form'
      }).render();
      
  });  
      
</script>
<script>

function check_shouwtime()
{

  var show_time = '';
  show_time = $("#show_time").val();
  if(contacts == ''){
      $("#show_time").remove();
      $("#show_time").after('<span class="x-field-error" id="show_time-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">请填写联系人姓名</label></span>');
      return false;
  }else{
      $("#show_time-err").remove();
      return true;
  }
}

//比较该收金额和实收金额-实收金额要大于或等于应收金额
function check_amoutn()
{
    var y_amount = $("#y_amount").val();
    var s_amount = $("#s_amount").val();
    if(s_amount > y_amount ){
      $("#s_amount").after('<span class="x-field-error" id="s_amount-err"><span class="x-icon x-icon-mini x-icon-error">!</span><label class="x-field-error-text">实收金额不能大于应收金额</label></span>');
      return false;    
    }else{
        $("#s_amount-err").remove();
        return true;


    }
}

$(function(){
  get_customer_info();

})

function get_customer_info()
{
          var idstr = $("#bussiness_id").val();

          var strs= new Array(); //定义一数组
          strs=idstr.split("-"); //字符分割 
          var id = strs[0];
         
          var aj = $.ajax( {
              url:'<?=base_url()?>bussiness/get_customer_info',
              data:{                 
                  id : id                 
              },
              contentType:"application/x-www-form-urlencoded; charset=utf-8",
              type:'post',
              cache:false,
              dataType:'json',
              success:function(data){
                //alert(data.data.num_ex);
                if(data.code == 0){
                  $("#num_ex").val(data.data.num_ex);
                }else{
                    alert(data.msg);
                }              
              },
              error : function() {
                  alert("请求失败，请重试");
              }
          });
}


function do_post()
{
  if(check_shouwtime() && check_amoutn()){
    document.form1.submit();
  }
}
</script>
<!-- script end -->
  </div>
</body>
</html>