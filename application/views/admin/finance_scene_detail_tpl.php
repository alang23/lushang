    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>简单表单页</title>
    <!-- 此文件为了显示Demo样式，项目中不需要引入 -->
     
      <link href="<?=base_url()?>static/assets/css/bs3/dpl.css" rel="stylesheet">
      <link href="<?=base_url()?>static/assets/css/bs3/bui.css" rel="stylesheet">
     
    </head>
    <body>
  <div class="container">
 
<!-- 详情页 ================================================== -->
  <div class="row">
    <div class="span24">
      <!-- 包含grid的详情页 ================================================== -->
      <h2></h2>
      <hr>
      <form name="form1" action="<?=base_url()?>finance/examine_ex" method="post" id="detailForm">
    
        <h3>票据详情</h3>   
        <div class="row detail-row">
          <div class="span6">
          <label>出票日期：</label><span class="detail-text"><?=date("Y-m-d H:i:s")?></span>   
          </div>
          <div class="span6">
          <label>票据代码：</label><span class="detail-text">545645454</span>
          </div>
          <div class="span6">
          <label>票据编号：</label><span class="detail-text">黑牡丹牛仔裤</span>
          </div>
        </div>    
        <div class="row detail-row">
          <div class="span6">
            <label>付款方名称：</label><span class="detail-text"><?=$info['c_name']?></span>
          </div>
          <div class="span6">
            <label>付款方式：</label>
                <label class="radio">
                  <input type="radio" name="pay_type" value="1" checked="1" <?php if($info['pay_type'] == '1'){ ?> checked="true" <?php } ?>>现金
                </label>
                <label  class="radio">
                  <input id="chk" type="radio" name="pay_type" value="2" <?php if($info['pay_type'] == '2'){ ?> checked="true" <?php } ?>>转账  
                </label>
                 <label class="radio">
                  <input type="radio" name="pay_type" value="4" <?php if($info['pay_type'] == '4'){ ?> checked="true" <?php } ?>>刷卡
                </label> 
                <label class="radio">
                  <input type="radio" name="pay_type" value="3" <?php if($info['pay_type'] == '3'){ ?> checked="true" <?php } ?>>刷卡
                </label>          
                </div>
          <div class="span6">
            <label>是否扣税：</label>            
            <input name="invoice" type="checkbox" value="1" <?php if($info['invoice'] == 1){ ?> checked="true" <?php } ?>/>

          </div>
        </div>    
        <div class="row detail-row">
        <div class="span6">
            <label >参展时间：</label><span class="detail-text"><?=date("Y-m-d",$info['show_time'])?></span>
          </div>
        <div class="span6">
            <label >展位号：</label><span class="detail-text"><?=$info['no_name']?></span>
          </div>
          <div class="span6">
            <label>收款方名称：</label><span class="detail-text"><?=$company['name']?></span>
          </div>
        </div>    
  
        <h3>费用信息</h3> 
        <div class="detail-row">
          <div class="search-grid-container">
            <div id="grid">
              <div class="row">
                  <div class="span16 offset3 doc-content">
                      <table cellspacing="0" class="table table-bordered">
                        <thead>
                          <tr>
                            <th>序号</th>
                            <th>开票项说明</th>
                            <th>金额</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td >1</td>
                            <td>招聘展位费</td>
                            <td>应收:<input type="text" name="y_amount" value="<?=$info['y_amount']?>" class="span2"/> 实收:<input type="text" name="s_amount" value="<?=$info['s_amount']?>" class="span2"/></td>
                          </tr>
                        <tr>
                            <td>2</td>
                            <td>餐费(中餐:<input type="text" name="c_food" class="span2" value="<?=$info['c_food']?>"/> 西餐:<input type="text" name="e_food" class="span2" value="<?=$info['e_food']?>"/>)</td>
                            <td><input type="text" class="span2" value="0"/></td>
                          </tr>

                         <tr>
                            
                            <td colspan="4"></td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
                </div>
            </div>
          </div>
        </div> 
        <div class="row detail-row">
          <div class="span6">
            <label>开票人：</label>
              财务
          </div>
      
        </div> 
        <h3>附注</h3> 
        <div class="row detail-row">
          <div class="span6">
            <label>备注：</label>
            <input type="text" name="remarks" />   
          </div>
          <div class="span4">
            <label>是否是会员：</label>
            <input name="is_member" type="checkbox" value="1" <?php if($info['is_member'] == 1){ ?> checked="true" <?php } ?>/>
          </div>
          <div class="span4">
            <label>已缴费：</label>
            <input name="payment" type="checkbox" value="1" <?php if($info['payment'] == 1){ ?> checked="true" <?php } ?>/>
          </div>
        </div> 
        <div class="row detail-row">
          <div class="span6">
            <label>联系人：</label>
            <input type="text" name="remarks" />   
          </div>
          <div class="span6">
            <label>联系电话：</label>
            <input type="text" name="remarks" />   
          </div>
        </div>    
        <!--- button区域 -->
        <?php
            if($info['status'] != '1'){
        ?>
        <div class="detail-row">
          <div class="detail-actions">
          <input type="hidden" name="id" value="<?=$info['id']?>"/>
            <a class="button button-primary" href="javascript:void(0)" id="auditPass">返回列表</a>
            <a class="button button-primary" href="javascript:void(0)" onclick="do_post();"  >确定</a>
          </div>
          <br/>
        </div>
        <?php
          }else{
        ?>
        <div class="detail-row">
          <div class="detail-actions">
          <input type="hidden" name="id" value="<?=$info['id']?>"/>
            <a class="button button-danger" href="javascript:void(0)" onclick="winopen('<?=$info['id']?>','<?=base_url()?>finance/do_ticket?id=<?=$info['id']?>');" id="auditPass">快速出票</a>
            <a class="button" href="javascript:void(0)" onclick="winopen('<?=$info['id']?>','<?=base_url()?>finance/do_piaoju?id=<?=$info['id']?>');" >后出票据</a>
            <a class="button" href="javascript:void(0)" >后出餐票</a>
            <a class="button" href="javascript:void(0)" >后出餐票收据</a>
          </div>
          <br/>
        </div>

        <?php
          }
        ?>
      </form>
    </div>
  </div>

      
<!-- script end -->
  </div>
  <script type="text/javascript" src="<?=base_url()?>static/js/jquery.js"></script>

  <script>
  function do_post()
  {
    document.form1.submit();
  }

  </script>

<script>

var winopen = function (rid, url) {
      var s_x = screen.availWidth - 822;
      var s_y = screen.availHeight - 600;
      var winX = s_x / 2;
      var winY = s_y / 2;
      //var url = url + "?RID=" + rid;
      //signIn(rid);
    
      window.open(url, "Details", "width=830,height=620,resizable=yes,scrollbars=yes,top=" + winY + ",left=" + winX);

}
</script>

    </body>
    </html>

