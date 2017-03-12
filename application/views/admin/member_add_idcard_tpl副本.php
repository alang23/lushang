

<!DOCTYPE html>
<html>
<head>
  <title>身份证读卡测试</title>
  <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <script type="text/javascript" src="<?=base_url()?>static/js/jquery.js"></script>
  <script type="text/javascript" language="JavaScript">
    $(document).ready(function () {

      $('#Button3').click(function () {
        var Num = "";
        for (var i = 0; i < 6; i++) {
          Num += Math.floor(Math.random() * 10);
        }
        var value = new Date();
        $('#txtw_card_number').val(Num + value.getMilliseconds() + value.getMinutes() + value.getHours() + value.getDate());
      });

      StartRead();

      //$('#txtw_professional_like').focus();
      //initdate();
      $('#txtw_card_number').blur(function () {
        //alert('ddd');
        checkCardNo();
      });

    });

    var cardData = {
      Name: "",
      NameL: "",
      Sex: "",
      SexL: "",
      Nation: "",
      NationL: "",
      Born: "",
      BornL: "",
      Address: "",
      CardNo: "",
      Police: "",
      Activity: "",
      ActivityLFrom: "",
      ActivityLTo: "",
      Photo: ""
    }

    function MyGetData() {
      cardData.Name = GT2ICROCX.Name;
      cardData.NameL = GT2ICROCX.NameL;
      cardData.Sex = GT2ICROCX.Sex;
      cardData.SexL = GT2ICROCX.SexL;
      cardData.Nation = GT2ICROCX.Nation;
      cardData.NationL = GT2ICROCX.NationL;
      cardData.Born = GT2ICROCX.Born;
      cardData.BornL = GT2ICROCX.BornL;
      cardData.Address = GT2ICROCX.Address;
      cardData.CardNo = GT2ICROCX.CardNo;
      cardData.Police = GT2ICROCX.Police;
      cardData.Activity = GT2ICROCX.Activity;
      cardData.ActivityLFrom = GT2ICROCX.ActivityLFrom;
      cardData.ActivityLTo = GT2ICROCX.ActivityLTo;
      cardData.Photo = GT2ICROCX.GetPhotoBuffer();
    }

    function MyClearData() {
      //ClearData
      //clearData();
    }

    function clearData() {
      $('#txtw_name').val('');
      $('#txtw_birthday').val('');
      $('#txtw_card_number').val('');
      $('#txtw_native_place').val('');
      $('#txtw_professional_like').val('');
      $('#txtw_professional_title').val('');
      $('#txtw_nationl').val('');
      $('#txtw_like').val('');
      $('#txtw_home_page').val('');
      $('#txtw_remark').val('');
    }

    function MyGetErrMsg() {
      Status.value = GT2ICROCX.ErrMsg;
    }

    function StartRead() {
      //GT2ICROCX.PhotoPath = "c:";
      GT2ICROCX.Start();
    }

    function print() {
      //0 双面，1 正面，2 反面
      GT2ICROCX.PrintFaceImage(0, 30, 10);
    }

    function getCardData() {
      $('#txtw_name').val(cardData.NameL);
      if (cardData.Sex == 1) {
        $("input:radio[value='0']").attr('checked', 'true');
      } else {
        $("input:radio[value='1']").attr('checked', 'true');
      }
      $('#txtw_nationl').val(cardData.NationL);
      $('#txtw_birthday').val(cardData.BornL.replace(/年/i, '-').replace(/月/i, '-').replace(/日/i, ''));
      $('#txtw_native_place').val(cardData.Address);
      $('#txtw_card_number').val(cardData.CardNo);
    }

    function initdate() {
      cardData.NameL = 'TestName';
      cardData.BornL = '2017年6月6日';
      cardData.Sex = 1;
      cardData.NationL = '汉';
      cardData.Address = '湖南描述';
      cardData.CardNo = '431228198911151446';
    }

    function test() {
      getCardData();
      checkCardNo();
    }

    function changData1() {
      cardData.NameL = '习大大';
      cardData.Sex = 0;
    }
    function changData2() {
      cardData.NameL = '道法自然';
      cardData.Sex = 1;
    }

    function checkCardNo() {
      worker_search();
    }

    function worker_search() {
      if (cardData.CardNo != null && cardData.CardNo.length > 0) {
        $.ajax({
          url: "/zrjob/RegPerson/CheckCardNo.aspx",
          type: "post",
          dataType: "text",
          data: {
            'cardNo': cardData.CardNo
          },
          success: function (data) {
            if (data == "0") {
              //alert('无此求职者!');
              $('#msg').html('<h1 style="color:Blue">【' + cardData.NameL + '】 无此求职者，请登记！</h1>');
              $('#txtw_professional_like').focus();
            } else {
              var url = "/zrjob/RegPerson/EditResumeCRM.aspx?cardNo=" + data;
              $('#msg').html('<h1 style="color:Red">【' + cardData.NameL + '】 已经有此求职者，<a href="' + url + '">查看修改</a></h1>');
              //window.location.href = "/zrjob/RegPerson/EditResumeCRM.aspx?cardNo=" + data;
            }
          }
        });
      }
    }

    $(document).keydown(function (e) {
      //alert(e.keyCode);

      // F2 key pressed
      if (e.keyCode == 113) {
      }

      // Enter key pressed
      if (e.keyCode == 13) {
        $('#btnAddResume').focus();
        $('#btnAddResume').click();
      }

      // ESCAPE key pressed
      if (e.keyCode == 27) {
        clearData();
      }
    });

  </script>
  <script type="text/javascript" language="javascript" for="GT2ICROCX" event="GetData">
    MyGetData(); 
    getCardData();
    checkCardNo();
  </script>
  <script type="text/javascript" language="javascript" for="GT2ICROCX" event="GetErrMsg">
    MyGetErrMsg();  
  </script>
  <script type="text/javascript" language="javascript" for="GT2ICROCX" event="ClearData">
    MyClearData();
  </script>
</head>
<body>
  <div style="position: absolute; right: 50px; margin-bottom: 10px; top: 50px;">
    <!--<object name="GT2ICROCX" width="102" height="126" classid="CLSID:220C3AD1-5E9D-4B06-870F-E34662E2DFEA"
      codebase="IdrOcx.cab#version=1,0,1,2">
    </object>-->

       <OBJECT Name="GT2ICROCX" id="GT2ICROCX" width="102" height="126" CLASSID="CLSID:220C3AD1-5E9D-4B06-870F-E34662E2DFEA" CODEBASE="CAB/IdrOcx.cab#version=1,0,1,3"></OBJECT>  
    <br />
    <input type="button" value="读卡" onclick="StartRead();">
    <input type="button" value="打印" onclick="print();">
    状态：<input type="text" name="Status" size="10" maxlength="10">
  </div>
  <div style="position: absolute; right: 50px; margin-top: 10px; top: 5px;">
    <input id="Button1" type="button" value="测试" onclick="test()" />
    <input id="Button11" type="button" value="修改数据1" onclick="changData1()" />
    <input id="Button12" type="button" value="修改数据2" onclick="changData2()" />
    <input id="Button23" type="button" value="测试重复" onclick="checkCardNo()" />
    <input id="Button33" type="button" value="清除数据" onclick="MyClearData()" />
  </div>
  <form name="form1" method="post" action="AddResumeCRM.aspx" id="form1">
<div>
</div>

<div>

</div>
  <div style="text-align: left;">
    <table>
      <tr>
        <td height="25" align="right">
          *姓名：
        </td>
        <td height="25" align="left">
          <input name="txtw_name" type="text" id="txtw_name" style="width:200px;" />
        </td>
        <td height="25" align="right">
          照片：
        </td>
        <td height="25" align="left">
          <input name="txtw_photo" type="text" id="txtw_photo" style="width:200px;" />
        </td>
      </tr>
      <tr>
        <td height="25" align="right">
          *性别：
        </td>
        <td height="25" align="left">
          <table id="txtw_sex" border="0">
	<tr>
		<td>
    <input id="txtw_sex_0" type="radio" name="txtw_sex" value="0" checked="checked" /><label for="txtw_sex_0">男</label></td><td><input id="txtw_sex_1" type="radio" name="txtw_sex" value="1" /><label for="txtw_sex_1">女</label></td>
	</tr>
</table>
        </td>
        <td height="25" align="right">
          体重：
        </td>
        <td height="25" align="left">
          <input name="txtw_weight" type="text" id="txtw_weight" style="width:200px;" />
        </td>
      </tr>
      <tr>
        <td height="25" align="right">
          *出生日期：
        </td>
        <td height="25" align="left">
          <input name="txtw_birthday" type="text" id="txtw_birthday" onclick="WdatePicker()" style="width:80px;" />
        </td>
        <td height="25" align="right">
          视力：
        </td>
        <td height="25" align="left">
          <input name="txtw_eyes" type="text" id="txtw_eyes" style="width:200px;" />
        </td>
      </tr>
      <tr>
        <td height="25" align="right">
          *身份证号码：
        </td>
        <td height="25" align="left">
          <input name="txtw_card_number" type="text" id="txtw_card_number" style="width:200px;" />
          <br />
          <input id="Button3" type="button" value="生成编码" />
        </td>
        <td height="25" align="right">
          户口所在地：
        </td>
        <td height="25" align="left">
          <select name="txtw_home_place" id="txtw_home_place" style="width:200px;">

</select>
        </td>
      </tr>
      <tr>
        <td height="25" align="right">
          *籍贯：
        </td>
        <td height="25" align="left">
          <input name="txtw_native_place" type="text" id="txtw_native_place" style="width:200px;" />
        </td>
        <td height="25" align="right">
          目前所在地：
        </td>
        <td height="25" align="left">
          <select name="txtw_now_place" id="txtw_now_place" style="width:200px;">

</select>
        </td>
      </tr>
      <tr>
        <td height="25" align="right">
          *求职者类型：
        </td>
        <td height="25" align="left">
          <select name="txtw_work_type" id="txtw_work_type">
	<option value="1000">细作</option>
	<option value="1001">备料</option>
	<option value="1002">木工</option>
	<option value="1003">喷手</option>
	<option value="1004">修色</option>
	<option value="1005">样板</option>
	<option value="1006">组装</option>
	<option value="1007">开料</option>
	<option value="1008">白身</option>
	<option value="1009">排钻</option>
	<option value="1010">调油</option>
	<option value="1011">油漆</option>
	<option value="1012">涂装</option>
	<option value="1013">样品</option>
	<option value="1014">压胶</option>
	<option value="1015">扪皮工</option>
	<option value="1016">钉架</option>
	<option value="1017">扪工</option>
	<option value="1018">调漆员</option>
	<option value="1019">车工</option>
	<option value="1020">车位</option>
	<option value="1021">沙发打样</option>
	<option value="1022">磨工</option>
	<option value="1023">编藤</option>
	<option value="1024">砂光</option>
	<option value="1025">雕刻</option>
	<option value="1026">钻工</option>
	<option value="1027">平刨</option>
	<option value="1028">放样</option>
	<option value="1029">出榫</option>
	<option value="1030">生产线跟单</option>
	<option value="1031">文员</option>
	<option value="1032">品质保障</option>
	<option value="1033">企划主管</option>
	<option value="1034">开发主管（总监）</option>
	<option value="1035">开发工程师</option>
	<option value="1036">家具设计师</option>
	<option value="1037">结构设计师</option>
	<option value="1038">外观设计兼放样</option>
	<option value="1039">绘图员</option>
	<option value="1040">报价</option>
	<option value="1041">企划文员</option>
	<option value="1042">人事经理（主管）</option>
	<option value="1043">行政主管</option>
	<option value="1044">总务主管</option>
	<option value="1045">人力资源总监</option>
	<option value="1046">副总</option>
	<option value="1047">人事文员</option>
	<option value="1048">助理</option>
	<option value="1049">前台文员</option>
	<option value="1050">文秘</option>
	<option value="1051">人事专员</option>
	<option value="1052">总经理助理</option>
	<option value="1053">储备干部</option>
	<option value="1054">营销经理</option>
	<option value="1055">大区经理</option>
	<option value="1056">业务员</option>
	<option value="1057">营销人员</option>
	<option value="1058">业务助理</option>
	<option value="1059">业务跟单</option>
	<option value="1060">后勤主管</option>
	<option value="1061">采购主管</option>
	<option value="1062">采购</option>
	<option value="1063">物控</option>
	<option value="1064">仓管</option>
	<option value="1065">厨师</option>
	<option value="1066">电工</option>
	<option value="1067">司机</option>
	<option value="1068">护士</option>
	<option value="1069">机修</option>
	<option value="1070">财务</option>
	<option value="1071">会计</option>
	<option value="1072">出纳</option>
	<option value="1073">工务</option>
	<option value="1074">应届毕业生</option>
	<option value="1075">电子行业</option>
	<option value="1076">力工</option>
	<option value="1077">商品管理员</option>
	<option value="1078">网管员</option>
	<option value="1079">吧员</option>
	<option value="1080">门卫</option>
	<option value="1081">水电工</option>
	<option value="1082">企业高级管理人员</option>
	<option value="1083">部门经理及管理人员</option>
	<option value="1084">采购经理</option>
	<option value="1085">餐厅经理</option>
	<option value="1086">客房经理</option>
	<option value="1087">宣传员</option>
	<option value="1088">传菜员</option>
	<option value="1089">送货员</option>
	<option value="1090">广告人员</option>
	<option value="1091">迎宾员</option>
	<option value="1092">预算员</option>
	<option value="1093">安装工</option>
	<option value="1094">操作工</option>
	<option value="1095">接待员</option>
	<option value="1096">保安</option>
	<option value="1097">制冷工</option>
	<option value="1098">教练员</option>
	<option value="1099">工程技术人员</option>
	<option value="1100">化工工程师</option>
	<option value="1101">机械工程师</option>
	<option value="1102">仪器仪表工程师</option>
	<option value="1103">电子工程师</option>
	<option value="1104">计算机工程师</option>
	<option value="1105">计算机硬件工程师</option>
	<option value="1106">计算机软件工程师</option>
	<option value="1107">计算机网络工程师</option>
	<option value="1108">电气工程师</option>
	<option value="1109">建筑工程师</option>
	<option value="1110">纺织工程师</option>
	<option value="1111">西医</option>
	<option value="1112">中医</option>
	<option value="1113">药剂师</option>
	<option value="1114">医疗技术人员</option>
	<option value="1115">叉车司机 </option>
	<option value="1116">统计师</option>
	<option value="1117">财会人员</option>
	<option value="1118">出纳</option>
	<option value="1119">对外经贸业务员</option>
	<option value="1120">房地产业务人员</option>
	<option value="1121">金融业务人员</option>
	<option value="1122">国际金融业务员</option>
	<option value="1123">保险业务员</option>
	<option value="1124">律师</option>
	<option value="1125">教学人员</option>
	<option value="1126">中等职业教育教师</option>
	<option value="1127">中学教师</option>
	<option value="1128">小学教师</option>
	<option value="1129">幼儿教师</option>
	<option value="1130">家庭教师</option>
	<option value="1131">化妆师</option>
	<option value="1132">美术专业人员</option>
	<option value="1133">工艺美术专业人员</option>
	<option value="1134">装璜美术设计人员</option>
	<option value="1135">服装设计师</option>
	<option value="1136">室内装饰设计人员</option>
	<option value="1137">广告设计人员</option>
	<option value="1138">记者</option>
	<option value="1139">编辑</option>
	<option value="1140">翻译</option>
	<option value="1141">行政办公人员</option>
	<option value="1142">办事人员和有关人员</option>
	<option value="1143">人事劳资业务人员</option>
	<option value="1144">秘书</option>
	<option value="1145">公关员</option>
	<option value="1146">打字员</option>
	<option value="1147">治安保卫人员</option>
	<option value="1148">消防人员</option>
	<option value="1149">投递员</option>
	<option value="1150">电信业务人员</option>
	<option value="1151">话务员</option>
	<option value="1152">购销人员</option>
	<option value="1153">营业员</option>
	<option value="1154">收银员</option>
	<option value="1155">市场管理员</option>
	<option value="1156">医药商品购销员</option>
	<option value="1157">保管人员</option>
	<option value="1158">餐饮服务人员</option>
	<option value="1159">中式烹调师</option>
	<option value="1160">中式面点师</option>
	<option value="1161">西餐烹饪人员</option>
	<option value="1162">调酒和茶艺人员</option>
	<option value="1163">餐厅服务员</option>
	<option value="1164">前厅服务员</option>
	<option value="1165">客房服务员</option>
	<option value="1166">旅游游览场所服务员</option>
	<option value="1167">导游</option>
	<option value="1168">园林植物保护工</option>
	<option value="1169">清洁工</option>
	<option value="1170">保健按摩师</option>
	<option value="1171">注塑技术员</option>
	<option value="1172">汽车客运服务员</option>
	<option value="1173">护理员</option>
	<option value="1174">社会和居民服务人员</option>
	<option value="1175">信息咨询人员</option>
	<option value="1176">锅炉操作工</option>
	<option value="1177">美发美容人员</option>
	<option value="1178">网络管理</option>
	<option value="1179">洗染、织补人员</option>
	<option value="1180">线切割</option>
	<option value="1181">家用机电产品维修人员</option>
	<option value="1182">办公设备维修人员</option>
	<option value="1183">保育员</option>
	<option value="1184">家庭服务员</option>
	<option value="1185">环境卫生人员</option>
	<option value="1186">CNC技术员</option>
	<option value="1187">花卉园艺工</option>
	<option value="1188">生产运输设备操作工</option>
	<option value="1189">化工产品生产工</option>
	<option value="1190">机械冷加工工</option>
	<option value="1191">车工</option>
	<option value="1192">铣工</option>
	<option value="1193">冲压工</option>
	<option value="1194">磨工</option>
	<option value="1195">镗工</option>
	<option value="1196">钻床工</option>
	<option value="1197">铸造工</option>
	<option value="1198">锻造工</option>
	<option value="1199">焊工</option>
	<option value="1200">冷作钣金加工工</option>
	<option value="1201">机电产品装配工</option>
	<option value="1202">机械设备装配工</option>
	<option value="1203">工具钳工</option>
	<option value="1204">仪器仪表装配工</option>
	<option value="1205">运输车辆装配工</option>
	<option value="1206">汽车修理工</option>
	<option value="1207">仪器仪表修理工</option>
	<option value="1208">电力设备装运检修工</option>
	<option value="1209">电力设备安装工</option>
	<option value="1210">电力工程内线安装工</option>
	<option value="1211">专业电力设备检修工</option>
	<option value="1212">普通电力设备检修工</option>
	<option value="1213">维修电工</option>
	<option value="1214">电子元器件制造装调工</option>
	<option value="1215">电子设备装配调试工</option>
	<option value="1216">电子产品维修工</option>
	<option value="1217">计算机维修工</option>
	<option value="1218">橡胶制品生产工</option>
	<option value="1219">塑料制品加工工</option>
	<option value="1220">裁剪缝纫工</option>
	<option value="1221">纺织针织印染工</option>
	<option value="1222">鞋帽制作工</option>
	<option value="1223">皮革、毛皮加工工</option>
	<option value="1224">外贸文员</option>
	<option value="1225">木材人造板生产制作工</option>
	<option value="1226">纸制品制作工</option>
	<option value="1227">建筑材料生产加工工</option>
	<option value="1228">家政保姆</option>
	<option value="1229">剪裁</option>
	<option value="1230">制版印刷人员</option>
	<option value="1231">工程施工人员</option>
	<option value="1232">电气设备安装工</option>
	<option value="1233">技工</option>
	<option value="1234">机动车驾驶员</option>
	<option value="1235">船舶水手和相关工人</option>
	<option value="1236">起重装卸机械操作工</option>
	<option value="1237">检验员</option>
	<option value="1238">计量员</option>
	<option value="1239">包装工</option>
	<option value="1240">其它</option>
	<option value="1822">普工</option>
	<option value="1823">临时工</option>

</select>
        </td>
        <td height="25" align="right">
          毕业时间：
        </td>
        <td height="25" align="left">
          <input name="txtw_graduate_time" type="text" id="txtw_graduate_time" onclick="WdatePicker()" style="width:70px;" />
        </td>
      </tr>
      <tr>
        <td height="25" align="right">
          *求职意向：
        </td>
        <td height="25" align="left">
          <input name="txtw_professional_like" type="text" id="txtw_professional_like" style="width:200px;" />
        </td>
        <td height="25" align="right">
          所学专业：
        </td>
        <td height="25" align="left">
          <input name="txtw_professional" type="text" id="txtw_professional" style="width:200px;" />
        </td>
      </tr>
      <tr>
        <td height="25" align="right">
          *手机：
        </td>
        <td height="25" align="left">
          <input name="txtw_professional_title" type="text" id="txtw_professional_title" style="width:200px;" />
        </td>
        <td height="25" align="right">
          工作年限：
        </td>
        <td height="25" align="left">
          <input name="txtw_work_years" type="text" id="txtw_work_years" style="width:200px;" />
        </td>
      </tr>
      <tr>
        <td height="25" align="right">
          qq ：
        </td>
        <td height="25" align="left">
          <input name="txtw_like" type="text" id="txtw_like" style="width:200px;" />
        </td>
        <td height="25" align="right">
          学历：
        </td>
        <td height="25" align="left">
          <select name="txtw_graduage_level" id="txtw_graduage_level" style="width:200px;">
	<option value="192">无</option>

</select>
        </td>
      </tr>
      <tr>
        <td height="25" align="right">
          电子邮件 ：
        </td>
        <td height="25" align="left">
          <input name="txtw_home_page" type="text" id="txtw_home_page" style="width:200px;" />
        </td>
        <td height="25" align="right">
          毕业学校：
        </td>
        <td height="25" align="left">
          <input name="txtw_graduate_school" type="text" id="txtw_graduate_school" style="width:200px;" />
        </td>
      </tr>
      <tr>
        <td height="25" align="right">
          个人介绍 ：
        </td>
        <td height="25" align="left">
          <input name="txtw_remark" type="text" id="txtw_remark" style="width:200px;" />
        </td>
        <td height="25" align="right">
          身高：
        </td>
        <td height="25" align="left">
          <input name="txtw_height" type="text" id="txtw_height" style="width:200px;" />
        </td>
      </tr>
      <tr>
        <td height="25" align="right">
          民族：
        </td>
        <td height="25" align="left">
          <input name="txtw_nationl" type="text" id="txtw_nationl" style="width:200px;" />
        </td>
        <td height="25" align="right">
        </td>
        <td height="25" align="left">
        </td>
      </tr>
      <tr>
        <td>
        </td>
        <td>
          <input id="Button2" type="button" value="重置" onclick="clearData()" />
        </td>
        <td>
        </td>
        <td>
          <input type="submit" name="btnAddResume" value="确定" id="btnAddResume" />
        </td>
      </tr>
    </table>
  </div>
  <div>
    <ul>
      <li>1.本登记页面支持纯键盘操作 以提高操作效率 敲击【回车】即可完成提交</li>
      <li>2.无需手动点击“查询”，刷卡后系统自动判断是否有重复资料</li>
      <li>3.星号 * 为必填项目</li>
    </ul>
  </div>
  <div id="msg">
  </div>
  </form>
</body>
</html>
