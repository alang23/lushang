    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>广告视图</title>
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
          <label>出票日期：</label><span class="detail-text">12584863145</span>   
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
            <label>付款方名称：</label><span class="detail-text">浙江省金华市</span>
          </div>
          <div class="span6">
            <label>付款方式：</label>
                <label class="radio">
                  <input type="radio" name="pay_type" value="now" checked="1">现金
                </label>
                <label  class="radio">
                  <input id="chk" type="radio" name="pay_type" value="2">转账  
                </label>
                <label class="radio">
                  <input type="radio" name="pay_type" value="3">刷卡
                </label>          </div>
          <div class="span6">
            <label>是否扣税：</label>            
            <input name="payment" type="checkbox" value="1" />

          </div>
        </div>    
        <div class="row detail-row">
        <div class="span6">
            <label >参展时间：</label><span class="detail-text">2017-02-02</span>
          </div>
        <div class="span6">
            <label >展位号：</label><span class="detail-text">D23565556256</span>
          </div>
          <div class="span6">
            <label>收款方名称：</label><span class="detail-text">墨绿色直筒牛仔裤</span>
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
            <input name="payment" type="checkbox" value="1" />
          </div>
          <div class="span4">
            <label>已缴费：</label>
            <input name="payment" type="checkbox" value="1" />
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
            <a class="button button-danger" href="javascript:void(0)" onclick="do_print();" id="auditPass">快速出票</a>
            <a class="button" href="javascript:void(0)" >后出票据</a>
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
  <script>
  function do_post()
  {
    document.form1.submit();
  }

  </script>

<script>
function do_print(){
    // set portrait orientation/ /设置纵向方向

    jsPrintSetup.setOption('orientation', jsPrintSetup.kPortraitOrientation);

    // set top margins in millimeters/ /设置的顶缘毫米

    //jsPrintSetup.setOption('marginTop', 15);

    //jsPrintSetup.setOption('marginBottom', 15);

    //jsPrintSetup.setOption('marginLeft', 20);

    //jsPrintSetup.setOption(' marginRight', 10);

    // set page header/ /设置页面标题

    jsPrintSetup.setOption('headerStrLeft', 'My custom header');

    jsPrintSetup.setOption('headerStrCenter', '');

    jsPrintSetup.setOption('headerStrRight', '&PT');
    // set empty page footer/ /设置空页页脚
    jsPrintSetup.setOption('footerStrLeft', '');
    jsPrintSetup.setOption('footerStrCenter', '');
    jsPrintSetup.setOption('footerStrRight', '');
    // Suppress print dialog/ /抑制打印对话框

    jsPrintSetup.setSilentPrint(false);

    // Do Print/打印

    jsPrintSetup.print();

    // Restore print dialog/ /恢复打印对话框

    jsPrintSetup.setSilentPrint(false);
  }
  </script>
    </body>
    </html>

