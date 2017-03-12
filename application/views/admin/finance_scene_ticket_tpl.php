

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>

</title>
    <script type="text/javascript" src="<?=base_url()?>static/js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            //printPage();
            doPrint2();
        });

        var doPrint2 = function () {
            jsPrintSetup.setPrinter("58 Printer");
            //jsPrintSetup.setPrinter("Foxit Reader PDF Printer");

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

        var printPage = function () {
            $("#receipts-area").jqprint();
            //  window.print();
        }
        var doPrint = function () {
            bdhtml = window.document.body.innerHTML;
            sprnstr = "<!--startprint-->";
            eprnstr = "<!--endprint-->";
            prnhtml = bdhtml.substr(bdhtml.indexOf(sprnstr) + 17);
            prnhtml = prnhtml.substring(0, prnhtml.indexOf(eprnstr));
            window.document.body.innerHTML = prnhtml;
            window.print();
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
    <form name="form1" method="post" action="PrintReceipts.aspx?RID=1039214" id="form1">
<div>
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwULLTE5MjE2NjQwMTkPZBYCAgMPZBYWAgMPDxYCHgRUZXh0BQcxMDM5MjE0ZGQCBQ8PFgIfAAUn5Yev5oCh77yI5paw57u05oCd77yJ5a625YW35pyJ6ZmQ5YWs5Y+4ZGQCBw8PFgIfAAUH44CQMOOAkWRkAgkPDxYCHwAFEjIwMTctMi0xNSAxNToyNzoxN2RkAgsPDxYCHwAFAzAwMmRkAg0PDxYCHwAFD+eOsOWcuuaLm+iBmOS8mmRkAg8PDxYCHwAFATFkZAITDw8WAh8ABQEwZGQCFw8PFgIfAAUBMmRkAhkPDxYCHwAFD3pyam9iMDk0NTIxMzUxNmRkAhsPDxYCHwAFATBkZGSEVZPEeD3MQEgnzufjE+hzVd6uRtzMVlkWWpTclAf6Gg==" />
</div>

<div>

</div>
    <input type="hidden" name="hfComID" id="hfComID" value="1039214" />
    <!--startprint-->
    <div id="receipts-area" style="width: 58mm;">
        <span class="big" style="cursor: pointer;" onclick="printPage();">【餐票】</span>
        <br />
        &nbsp;&nbsp;&nbsp;<span>中国家具人才专业市场</span>
        <br />
        &nbsp; <span>众人人力资源市场欢迎您!</span>
        <br />
        编号:<span id="RID">1039214</span>
        <br />
        单位:<span id="ComCompanyName" class="big"><?=$info['c_name']?></span>
        <br />
        展位号:
        <span id="RBoothNumber" class="big">【0】</span>
        <br />
        打印时间:<span id="RPrintTime">2017-2-15 15:27:17</span>
        <br />
        有效期:<span style="font-weight:bolder;">【当天有效】</span>
        <br />
        出票
        <span id="RPayee">002</span>
        <table style="border: 1px dotted #000000; width: 58mm;">
            <tr style="border: 1px dotted #000000; width: auto;">
                <th>
                    服务项目
                </th>
                <th>
                    数量
                </th>
                
            </tr>
            <tr>
                <td>
                    <span id="RType">现场招聘</span>
                </td>
                <td>
                    -
                    <span id="RCount" class="none">1</span>
                </td>
                
            </tr>
            <tr>
                <td>
                    <span id="Label1" class="big">中餐</span>
                </td>
                <td>
                    <span id="RChineseFood" class="big">0</span>
                </td>
                
            </tr>
            <tr>
                <td>
                    <span id="Label2" class="big">西餐</span>
                </td>
                <td>
                    <span id="RWesternFood" class="big">2</span>
                </td>
                
            </tr>
        </table>
        <br />
        
        尊敬的企业代表，您好！
        <br />
        祝您招聘顺利！<br />
        
        服务电话：400-877-6998<br />
        <span class="white">--------：</span>0769-82761699<br />
        网址：www.jjrzzr.com<br />
        尊敬的企业代表，您可以使用账号:<span id="ComUserName">zrjob0945213516</span><br />
        登录网站下载简历，现场求职者已经进入网站！<br />
        贵司可下载简历：
        <span id="ComResumeCount">0</span>
        份,<br />
        具体事宜，您可联系客服代表，因为有您，众人明天会更好！家具人，找众人！
    </div>
    <!--endprint-->
    </form>
</body>
</html>
