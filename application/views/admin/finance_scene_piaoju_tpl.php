

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>
  票据打印
</title>
  <script type="text/javascript" src="<?=base_url()?>static/js/jquery.js"></script>
  <link href="<?=base_url()?>static/assets/css/bill.css" rel="stylesheet" media="print" type="text/css" />
  <link href="<?=base_url()?>static/assets/css/bill.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript">
    $(document).ready(function () {
      doPrint1();
      //printPage();
      $("#billa").dblclick(function () {
        doPrint1();
      });
    });

    var printPage = function () {
      //$("#billa").jqprint();
      // window.print();
    }

    var doPrint1 = function () {
      jsPrintSetup.setPrinter("EPSON LQ-630K ESC/P2");

      jsPrintSetup.setOption('marginTop', 0);
      jsPrintSetup.setOption('marginBottom', 0);
      jsPrintSetup.setOption('marginLeft', 0);
      jsPrintSetup.setOption('marginRight', 0);
      // set page header
      jsPrintSetup.setOption('headerStrLeft', '');
      jsPrintSetup.setOption('headerStrCenter', '');
      jsPrintSetup.setOption('headerStrRight', '');
      // set empty page footer
      jsPrintSetup.setOption('footerStrLeft', '');
      jsPrintSetup.setOption('footerStrCenter', '');
      jsPrintSetup.setOption('footerStrRight', '');

      jsPrintSetup.setSilentPrint(1);
      jsPrintSetup.print();
    }

    $(document).keydown(function (e) {
      // ESCAPE key pressed
      if (e.keyCode == 27) {
        window.close();
      }
    });
  </script>
</head>
<body>
  <form name="form1" method="post" action="BillPrint.aspx?RID=1039231" id="form1">
<div>
</div>

<div>

</div>
  <input type="hidden" name="hfComID" id="hfComID" value="1039231" />
  
  
  <!--startprint-->
  <div class="billa" id="billa">
    <div class="topArea txttop">
      <p>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="RMakeInvoiceTime">2017-2-15 16:56:43</span></p>
    </div>
    <div class="topArea txttop">
      <p>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;人力资源</p>
    </div>
    <div class="topArea txttop" style="margin-left: 10mm;">
      <p style="text-align: left;">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="RIDCode">100002150456</span><br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="RID">1039231</span>
      </p>
    </div>
    <div style="clear: both;">
    </div>
    <ul class="receipt-info">
      <li>付款方名称：<span id="ComCompanyName">东莞市美郡家居有限公司</span></li>
      <li>&nbsp;&nbsp;付款方式：<span id="RPaymentMethod">现金</span>
      </li>
      <li>&nbsp;&nbsp;参展时间：<span id="RTime">2017-02-15</span>
      </li>
      <li>&nbsp;&nbsp;&nbsp;&nbsp;展位号：<span id="RBoothNumber" class="bold">E01</span></li>
      <li>收款方名称：<span id="Label1">众人人力资源市场</span></li>
    </ul>
    <div class="qrcode">
      
      <img id="qrcode" src="/zrjob/img/qrzrjob.png" alt="" />
    </div>
    <table>
      <tr>
        <td>
          序号
        </td>
        <td>
          开票项目说明
        </td>
        <td>
          金额
        </td>
      </tr>
      <tr>
        <td>
          1
        </td>
        <td>
          <span id="RProjectDescription" style="width: 50mm;">招聘展位费</span>
        </td>
        <td>
          <span id="RReceivable">600</span>
          
        </td>
      </tr>
      <tr>
        <td>
          2
        </td>
        <td>
          - <span style="display: none;">餐费 (中餐：<span id="RChineseFood" class="bold">1</span>
            西餐：<span id="RWesternFood" class="bold">1</span>)</span>
        </td>
        <td>
          0
          
        </td>
      </tr>
    </table>
    <div class="font">
      合计(大写):<span id="TotalA">陆佰零拾零元整</span>
      &nbsp;&nbsp;&nbsp;&nbsp; 合计(小写): &#65509;
      <span id="TotalB">600</span>
    </div>
    <div class="font">
      附注:</div>
    <div class="font RMakeInvoice">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 何冬媛
      
    </div>
  </div>
  <!--endprint-->
  </form>
</body>
</html>
