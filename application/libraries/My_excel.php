<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class My_excel {
	/**
	 * 导出excel 2007
	 * @param $array 二维数组
	 */
    function export($array, $title){
    	
    	require_once 'phpexcel/PHPExcel.php';
    	$objPHPExcel = new PHPExcel();

    	$objPHPExcel
	      ->getProperties()  //获得文件属性对象，给下文提供设置资源
	      ->setCreator( "Maarten Balliauw")                 //设置文件的创建者
	      ->setLastModifiedBy( "Maarten Balliauw")          //设置最后修改者
	      ->setTitle( "Office 2007 XLSX Test Document" )    //设置标题
	      ->setSubject( "Office 2007 XLSX Test Document" )  //设置主题
	      ->setDescription( "Test document for Office 2007 XLSX, generated using PHP classes.") //设置备注
	      ->setKeywords( "office 2007 openxml php")        //设置标记
	      ->setCategory( "Test result file");                //设置类别
		// 位置aaa  *为下文代码位置提供锚
		// 给表格添加数据
		
		$c = array('A','B','C','D','E','F','G','H','I','J','K','L');
		$list_count = count($array[0]);
		
		$total = count($array);
		for($i=0; $i<$total; $i++){
			for($j=0; $j<$list_count; $j++){
				$objPHPExcel->setActiveSheetIndex(0)->setCellValueExplicit($c[$j].($i+1), $array[$i][$j], PHPExcel_Cell_DataType::TYPE_STRING);
			}
		}
		
		//得到当前活动的表,注意下文教程中会经常用到$objActSheet
		$objActSheet = $objPHPExcel->getActiveSheet();
		// 位置bbb  *为下文代码位置提供锚
		// 给当前活动的表设置名称
		$objActSheet->setTitle($title);


		  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          header("Content-Disposition: attachment; filename=\"$title\"");
          header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory:: createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save( 'php://output');
		//$objWriter->save('php://output'); //文件通过浏览器下载
    }

    //导入
    public function imports($dir)
    {

    	require_once 'phpexcel/PHPExcel.php';

		$reader = PHPExcel_IOFactory::createReader('Excel5'); //设置以Excel5格式(Excel97-2003工作簿)
		$PHPExcel = $reader->load($dir); // 载入excel文件
		$sheet = $PHPExcel->getSheet(0); // 读取第一個工作表
		$highestRow = $sheet->getHighestRow(); // 取得总行数
		$colsNum = $sheet->getHighestColumn(); // 取得总列数
		$highestColumm= PHPExcel_Cell::columnIndexFromString($colsNum); //字母列转换为数字列 如:AA变为27
		 var_dump($highestColumm);
		 exit;
		/** 循环读取每个单元格的数据 */
		$arr = array(
			0=>'ids',
			1=>'username',
			2=>'order_no',
			3=>'no',
			4=>'style',
			5=>'zhongliang',
			6=>'status',
			7=>'createtime',
			8=>'director'

			);
		
		$tmp = array();
		$result = array();
		for ($row = 1; $row <= $highestRow; $row++){//行数是以第1行开始
		    for ($column = 0; $column < $highestColumm; $column++) {//列数是以第0列开始
		        $columnName = PHPExcel_Cell::stringFromColumnIndex($column);
		        //echo $columnName.$row.":".$sheet->getCellByColumnAndRow($column, $row)->getValue()."<br />";
		        //echo $sheet->getCellByColumnAndRow($column, $row)->getValue();
		        //echo '<br/>';
		        $tmp[$arr[$column]] = $sheet->getCellByColumnAndRow($column, $row)->getValue();
		    }
		   $result[] = $tmp;
		}

		return $result;
		

    }

    public function read_csv($file)
    {
    	header("Content-type:text/html;charset=utf-8");
    	$file = fopen($file,'r'); 
    	$goods_list = array();
		while ($data = fgetcsv($file)) { //每次读取CSV里面的一行内容
			$_tmp['order_no'] = iconv('gb2312','utf-8',trim($data[0])); //订单号
			$_tmp['realname'] = iconv('gb2312','utf-8',trim($data[4])); //
			$_tmp['price'] = iconv('gb2312','utf-8',trim($data[11])); //
			$_tmp['phone'] = iconv('gb2312', 'utf-8', trim($data[29]));
			$_tmp['pro_name'] = iconv('gb2312', 'utf-8', trim($data[34]));

			$goods_list[] = $_tmp;
		 }

		 //var_dump($goods_list);

		 return $goods_list;
    }
}
?>