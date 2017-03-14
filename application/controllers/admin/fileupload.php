<?php


class Fileupload extends Zrjoboa
{
	

	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{

	}

	public function do_upload($dir)
	{

		if(!empty($_FILES['userfile']['name'])){

             $config['upload_path'] = FCPATH.'/uploads/products/';
                
             $config['allowed_types'] = '*';
             $config['file_name']  =date("YmdHis");

             $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile')){

                    $error = array('error' => $this->upload->display_errors());
                    echo json_encode($error);

                }else{

                    $data = array('upload_data' => $this->upload->data());
                    $picname = $data['upload_data']['orig_name'];
                    $dataarr['pic'] = $picname;
                    $dataarr['url'] = $url;
                    $dataarr['name'] = $name;
                    $dataarr['rank'] = $rank;
                    $dataarr['price'] = $price;
                    $dataarr['createtime'] = time();
                    $dataarr['ptype'] = $ptype;
                    $dataarr['yuanjia'] = $yuanjia;
                    $dataarr['content'] = $content;
                    $dataarr['month'] = $month;

                    if($this->products->add($dataarr)){

                    	redirect('/home/products');

                   }else{

                   		exit('error');

                   }

                }

            }else{
            	exit('no pic');
            }
	}
}