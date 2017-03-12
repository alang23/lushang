<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>表单页</title>
<!-- 此文件为了显示Demo样式，项目中不需要引入 -->
<link href="../../assets/code/demo.css" rel="stylesheet">
 
  <link href="http://g.alicdn.com/bui/bui/1.1.21/css/bs3/dpl.css" rel="stylesheet">
  <link href="http://g.alicdn.com/bui/bui/1.1.21/css/bs3/bui.css" rel="stylesheet">
 
</head>
<body>
  <div class="demo-content">
    
    <!-- 表单页 ================================================== --> 
    <div class="row">
      <div class="span24">
        <h2>详细的表单页</h2>
        <hr>
        <form id="J_Form" class="form-horizontal" method="post" action="#">
          <h3>入仓信息：</h3>
 
            <div class="control-group">
              <label class="control-label"><s>*</s>货品来源：</label>
              <div class="controls">
                <select data-rules="{required:true}">
                  <option value="">-请选择-</option>
                  <option value="其他">其他</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label"><s>*</s>是否QC：</label>
              <div class="controls">
                <input type="radio" name="ismerge" value="是"> 是
                <input type="radio" name="ismerge" value="否" checked="checked" > 否
                <span class="auxiliary-text">默认“预计入仓时间”至少比“活动时间”早2天；如需QC，则“预计入仓时间”至少比“活动时间”早4天</span>
              </div>
            </div>
 
            <div class="control-group">
              <label class="control-label"><s>*</s>活动时间：</label>
              <div class="controls">
                <input type="text" class="calendar" data-rules="{required:true}">
              </div>
            </div>
 
            <div class="control-group">
              <label class="control-label"><s>*</s>预计入仓时间：</label>
              <div class="controls">
                <input type="text" class="calendar" data-rules="{required:true}">
              </div>
            </div>
 
            <div class="control-group">
              <label class="control-label">上架时间：</label>    
              <div class="controls control-row-auto">
                <label class="radio">
                  <input type="radio" name="uptime" value="now" checked="checked">立刻
                </label>
                <label  class="radio">
                  <input id="chk" type="radio" name="uptime" value="set">设定  
                </label>
                <label class="radio">
                  <input type="radio" name="uptime" value="inputc">放入仓库
                </label>
                      
              </div>
            </div>
 
            <div class="control-group">
              <label class="control-label"><s>*</s>入仓类别：</label>
              <div class="controls">
                <select data-rules="{required:true}">
                  <option value="">-请选择-</option>
                  <option value="其他">其他</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">4PL处理订单类型：</label>
              <div class="controls">
                <label class="checkbox">
                  <input type="checkbox" value="零售">零售
                </label>
                <label class="checkbox">
                  <input type="checkbox" value="聚划算" checked="checked">聚划算
                </label>
              </div>
            </div>
 
            <div class="control-group">
              <label class="control-label">仓原备注：</label>
              <div class="controls control-row4">
                <textarea type="text" class="input-large" data-valid="{}"></textarea>
              </div>
            </div>
            <hr>
            <div class="form-actions span5 offset3">
              <button id="btnSearch" type="submit" class="button button-primary">提交</button>
            </div>
        </form> 
      </div>
    </div>  
    <script src="http://g.tbcdn.cn/fi/bui/jquery-1.8.1.min.js"></script>
    <script src="http://g.tbcdn.cn/fi/bui/seed-min.js?t=201212261326"></script>
    <script type="text/javascript">
      BUI.use('bui/form',function  (Form) {
        new Form.Form({
          srcNode : '#J_Form'
        }).render();
      });
    </script>
<!-- script end -->
  </div>
</body>
</html>