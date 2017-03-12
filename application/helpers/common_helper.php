<?php

/**
*@desc 密码生成
*
**/
if ( ! function_exists('user_pawd'))
{
	function user_pawd($pawd,$key='')
	{
		return md5($pawd);
	}

}


if ( ! function_exists('responseData'))
{
	function responseData($data,$type='json')
	{
		echo json_encode($data);
		exit;
	}

}

//刮奖方式
if(!function_exists('lottery_type')){

    function lottery_type($status)
    {
        $result = '';
        switch($status){
            case 0:
                $result = '系统刮奖';
                break;
            case 1:
                $result = '自动刮奖';
                break;
  
            default:
                $result = '未知';
                break;
        }

        return $result;
    }
}

//客户类型
if( !function_exists('winning_status') ){

    function winning_status($v)
    {
        $result = '未知';
        switch($v){
            case 0:
                $result = '未中奖';
                break;
            case 1:
                $result = '已中奖';
                break;

            default:
                $resul = '未知';
                break;
        }

        return $result;
    }
}

if( !function_exists('passin_status') ){

    function passin_status($v)
    {
        $result = '未知';
        switch($v){
            case 0:
                $result = '<font color="green">正常</font>';
                break;
            case 1:
                $result = '<font color="red">流拍</font>';
                break;
            default:
                $resul = '未知';
                break;
        }

        return $result;
    }
}

if ( ! function_exists('get_ip'))
{
    function get_ip()
    {
        $CI =& get_instance();
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
         }else {
            $ip=$_SERVER['REMOTE_ADDR'];
         }
        return $ip;
    }
}