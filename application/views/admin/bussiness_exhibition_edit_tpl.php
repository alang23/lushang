<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>表单页</title>
<!-- 此文件为了显示Demo样式，项目中不需要引入 -->
 
  <link href="<?=base_url()?>static/assets/css/bs3/dpl.css" rel="stylesheet">
  <link href="<?=base_url()?>static/assets/css/bs3/bui.css" rel="stylesheet">
 
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
      <form id="J_Form" name="form1" method="post" action="<?=base_url()?>bussiness/edit_ex" class="form-horizontal">
      
      <div class="control-group">
        <label class="control-label">企业：</label>
        <div class="controls  control-row-auto">
              <?=$info['c_name']?>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">参展时间</label>
        <div class="controls">
          <input type="text" class="calendar" name="show_time" id="show_time" value="<?=date("Y-m-d",$info['show_time'])?>">
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
                  <option value="<?=$bv['id']?>:<?=$bv['booth_name']?>"  <?php if($bv['id']==$info['no_id']){ ?> selected <?php } ?> ><?=$bv['booth_name']?></option>
                <?php
                  }
                ?>
                </select>
                -->
                  <input type="text"  class="input-small" name="no_id" id="no_id" value="<?=$info['no_name']?>" >

        </div>
      </div>
      <div class="control-group">
        <label class="control-label">是否会员：</label>
            <div class="controls" >
              <input name="is_member" type="checkbox" value="1" <?php if($info['is_member']=='1'){ ?> checked="checked" <?php } ?> />
            </div>
      </div>
            <div class="control-group">
        <label class="control-label">VIP签到：</label>
            <div class="controls" >
              <input name="is_vip" type="checkbox" value="1" <?php if($info['is_vip']=='1'){ ?> checked="checked" <?php } ?>/>
            </div>
      </div>
      <div class="control-group">
        <label class="control-label">是否缴费：</label>
        <div class="controls">
              <input name="payment" type="checkbox" value="1" <?php if($info['payment']=='1'){ ?> checked="checked" <?php } ?>/>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">是否扣税：</label>
        <div class="controls">
              <input name="invoice" type="checkbox" value="1" <?php if($info['invoice']=='1'){ ?> checked="checked" <?php } ?>/>
        </div>
      </div>


            <div class="control-group">
              <label class="control-label">付款方式：</label>    
              <div class="controls control-row-auto">
                <label class="radio">
                  <input type="radio" name="pay_type" value="1" checked="1" <?php if($info['pay_type'] == '1'){ ?> checked <?php } ?>>现金
                </label>
                <label  class="radio">
                  <input id="chk" type="radio" name="pay_type" value="2" <?php if($info['pay_type'] == '2'){ ?> checked <?php } ?>>转账  
                </label>
                <label class="radio">
                  <input type="radio" name="pay_type" value="4" <?php if($info['pay_type'] == '4'){ ?> checked <?php } ?>>微信
                </label>
                <label class="radio">
                  <input type="radio" name="pay_type" value="3" <?php if($info['pay_type'] == '3'){ ?> checked <?php } ?>>刷卡
                </label>
                      
              </div>
            </div>

            <div class="control-group">
        <label class="control-label">应收金额：</label>
        <div class="controls  control-row-auto">
          <input name="y_amount" type="text"  id="y_amount" class="input-large" value="<?=$info['y_amount']?>" >
        </div>
      </div>

            <div class="control-group">
        <label class="control-label">实收金额：</label>
        <div class="controls  control-row-auto">
            <input name="s_amount" type="text"  id="s_amount" class="input-large" value="<?=$info['s_amount']?>" >

        </div>
      </div>

      <div class="control-group">
        <label class="control-label">收费项目：</label>
        <div class="controls  control-row-auto">
            招聘现场
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">中餐：</label>
        <div class="controls  control-row-auto">
          <input name="c_food" type="text"  id="c_food" class="input-normal" value="<?=$info['c_food']?>" >
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">西餐：</label>
        <div class="controls  control-row-auto">
            <input name="e_food" type="text"  id="e_food" class="input-normal" value="<?=$info['e_food']?>" >
        </div>
      </div>

            <div class="control-group">
        <label class="control-label">联系人：</label>
        <div class="controls  control-row-auto">
            <input name="contacts" type="text"  id="contacts" class="input-large" value="<?=$info['contacts']?>" >
        </div>
      </div>

            <div class="control-group">
        <label class="control-label">联系电话：</label>
        <div class="controls  control-row-auto">
          <input name="phone" type="text"  id="phone" class="input-large" value="<?=$info['phone']?>">

        </div>
      </div>

            <div class="control-group">
        <label class="control-label">备注：</label>
        <div class="controls  control-row-auto">
          <textarea name="remarks" id="remarks" class="control-row4 input-large"><?=$info['remarks']?></textarea>
        </div>
      </div>

      <div class="row actions-bar">       
          <div class="form-actions span13 offset3">
          <input type="hidden" name="id" value="<?=$info['id']?>" />
            <button type="button" onclick="do_post();" class="button button-primary">保存</button>
            <button type="reset" class="button">重置</button>
          </div>
      </div>       
    </form>
      </div>
    </div>  
    <script src="<?=base_url()?>static/assets/js/jquery-1.8.1.min.js"></script>
<script src="http://g.tbcdn.cn/fi/bui/seed-min.js?t=201212261326"></script>    
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