<?php


if ( ! function_exists('home_page'))
{
	function home_page($pageconfig)
	{
		$CI =& get_instance();
		$CI->load->library('pagination');
        //$config['base_url'] = base_url('index.php/home/product/index?');
        $config['base_url'] = $pageconfig['base_url'];
        $config['total_rows'] = $pageconfig['count'];
        //设置url上第几段用于传递分页器的偏移量
        $config['per_page'] = $pageconfig['limit'];
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config ['uri_segment'] = 2;

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li><a  class="active">';
		//“当前页”链接的打开标签。
		$config['cur_tag_close'] = '</a></li>';
		//“当前页”链接的关闭标签。

		$config['next_link'] = '下页';
		//你希望在分页中显示“下一页”链接的名字。如果你不希望显示，可以把它的值设为 FALSE 。
		$config['next_tag_open'] = '<li>';
		//“下一页”链接的打开标签。
		$config['next_tag_close'] = '</li>';
		//“下一页”链接的关闭标签。

		$config['prev_link'] = '上页';

		//你希望在分页中显示“上一页”链接的名字。如果你不希望显示，可以把它的值设为 FALSE 。
		$config['prev_tag_open'] = '<li>';
		//“上一页”链接的打开标签。
		$config['prev_tag_close'] = '</li>';
		//“上一页”链接的关闭标签。

		$config['first_link'] = '第一页';
		//你希望在分页的左边显示“第一页”链接的名字。如果你不希望显示，可以把它的值设为 FALSE 。
		$config['first_tag_open'] = '<li>';
		//“第一页”链接的打开标签。
		$config['first_tag_close'] = '</li>';
		//“第一页”链接的关闭标签。

		$config['last_link'] = '尾页';
		//你希望在分页的左边显示“第一页”链接的名字。如果你不希望显示，可以把它的值设为 FALSE 。
		$config['last_tag_open'] = '<li>';
		//“第一页”链接的打开标签。
		$config['last_tag_close'] = '</li>';
		//“第一页”链接的关闭标签。

        $config['query_string_segment'] = 'page';
        $CI->pagination->initialize($config);
        $page = $CI->pagination->create_links();

        return $page;
	}


}

if ( ! function_exists('base_page'))
{
	function base_page($pageconfig)
	{
		$CI =& get_instance();
		$CI->load->library('pagination');
        //$config['base_url'] = base_url('index.php/home/product/index?');
        $config['base_url'] = $pageconfig['base_url'];
        $config['total_rows'] = $pageconfig['count'];
        //设置url上第几段用于传递分页器的偏移量
        $config['per_page'] = $pageconfig['limit'];
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config ['uri_segment'] = 2;

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li  class="active"><a>';
		//“当前页”链接的打开标签。
		$config['cur_tag_close'] = '</a></li>';
		//“当前页”链接的关闭标签。

		$config['next_link'] = '下页';
		//你希望在分页中显示“下一页”链接的名字。如果你不希望显示，可以把它的值设为 FALSE 。
		$config['next_tag_open'] = '<li>';
		//“下一页”链接的打开标签。
		$config['next_tag_close'] = '</li>';
		//“下一页”链接的关闭标签。

		$config['prev_link'] = '上页';

		//你希望在分页中显示“上一页”链接的名字。如果你不希望显示，可以把它的值设为 FALSE 。
		$config['prev_tag_open'] = '<li><span aria-hidden="true">';
		//“上一页”链接的打开标签。
		$config['prev_tag_close'] = '</span></li>';
		//“上一页”链接的关闭标签。

		$config['first_link'] = '第一页';
		//你希望在分页的左边显示“第一页”链接的名字。如果你不希望显示，可以把它的值设为 FALSE 。
		$config['first_tag_open'] = '<li>';
		//“第一页”链接的打开标签。
		$config['first_tag_close'] = '</li>';
		//“第一页”链接的关闭标签。

		$config['last_link'] = '尾页';
		//你希望在分页的左边显示“第一页”链接的名字。如果你不希望显示，可以把它的值设为 FALSE 。
		$config['last_tag_open'] = '<li>';
		//“第一页”链接的打开标签。
		$config['last_tag_close'] = '</li>';
		//“第一页”链接的关闭标签。

        $config['query_string_segment'] = 'page';
        $CI->pagination->initialize($config);
        $page = $CI->pagination->create_links();

        return $page;
	}

	
}

if ( ! function_exists('website_page'))
{
	function website_page($pageconfig)
	{
		$CI =& get_instance();
		$CI->load->library('pagination');
        //$config['base_url'] = base_url('index.php/home/product/index?');
        $config['base_url'] = $pageconfig['base_url'];
        $config['total_rows'] = $pageconfig['count'];
        //设置url上第几段用于传递分页器的偏移量
        $config['per_page'] = $pageconfig['limit'];
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config ['uri_segment'] = 2;

        //$config['num_tag_open'] = '<li>';
        //$config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<a class="on">';
		//“当前页”链接的打开标签。
		$config['cur_tag_close'] = '</a>';
		//“当前页”链接的关闭标签。

		$config['next_link'] = '下页';
		//你希望在分页中显示“下一页”链接的名字。如果你不希望显示，可以把它的值设为 FALSE 。
		//$config['next_tag_open'] = '<li>';
		//“下一页”链接的打开标签。
		//$config['next_tag_close'] = '</li>';
		//“下一页”链接的关闭标签。

		//$config['prev_link'] = '上页';

		//你希望在分页中显示“上一页”链接的名字。如果你不希望显示，可以把它的值设为 FALSE 。
		//$config['prev_tag_open'] = '';
		//“上一页”链接的打开标签。
		//$config['prev_tag_close'] = '</span></li>';
		//“上一页”链接的关闭标签。

		$config['first_link'] = '第一页';
		//你希望在分页的左边显示“第一页”链接的名字。如果你不希望显示，可以把它的值设为 FALSE 。
		$config['first_tag_open'] = '<a>';
		//“第一页”链接的打开标签。
		$config['first_tag_close'] = '</a>';
		//“第一页”链接的关闭标签。

		$config['last_link'] = '尾页';
		//你希望在分页的左边显示“第一页”链接的名字。如果你不希望显示，可以把它的值设为 FALSE 。
		//$config['last_tag_open'] = '<li>';
		//“第一页”链接的打开标签。
		//$config['last_tag_close'] = '</li>';
		//“第一页”链接的关闭标签。

        $config['query_string_segment'] = 'page';
        $CI->pagination->initialize($config);
        $page = $CI->pagination->create_links();

        return $page;
	}

	
}
