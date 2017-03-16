<?php


class Auth{
	
	/**
     * 用户
     *
     * @access private
     * @var array
     */
    private $_user = array();
    
    /**
     * 是否已经登录
     * 
     * @access private
     * @var boolean
     */
    private $_hasLogin = NULL;
	
	/**
    * CI句柄
    * 
    * @access private
    * @var object
    */
	private $_CI;

    private $_KEY = 'WX_CMS';
	
	public function __construct()
	{
		        /** 获取CI句柄 */
		$this->_CI = & get_instance();
		$this->_CI->load->model('user_mdl','user_mdl');
		//$this->_user = unserialize($this->_CI->session->userdata($this->_user));
	}
	
    /**
     * 判断用户是否已经登录
     *
     * @access public
     * @return void
     */
	public function hasLogin()
	{
		/** 检查session，并与数据库里的数据相匹配 */

		if (NULL !== $this->_hasLogin)
		{
            return $this->_hasLogin;
        }
		else 
		{

			if(!empty($this->_user) && NULL !== $this->_user['id'])
			{

				$user = $this->_CI->user_mdl->get_user_by_id($this->_user['id']);

				if($user && $user['token'] == $this->_user['token'])
				{
					
					$this->_CI->user_mdl->update_user($this->_user['id'],$user);
					
					return ($this->_hasLogin = TRUE);
				}
			}
			
			return ($this->_hasLogin = FALSE);
		}
	}
	
	/**
     * 处理用户登录
     *
     * @access public
     * @param  array $user 用户信息
     * @return boolean
     */
	public function process_login($user)
	{
		/** 获取用户信息 */
		$this->_user = $user;

		/** 每次登陆时需要更新的数据 */
		$this->_user['lastlogin'] = time();
		/** 每登陆一次更新一次token */
		$this->_user['token'] = sha1(time().rand());
       unset($this->_user['pwd']);

		$updata = array(
            'id'=>$this->_user['id'],
        );

		if($this->_CI->user_mdl->update_user($updata,$this->_user))
		{
			/** 设置session */
			$this->_set_session_by_key($this->_KEY);
			$this->_hasLogin = TRUE;

			return $this->_user['token'];
		}
		
		return FALSE;
	}
	
	/**
	 * 判断登录
	 * @access public
	 * 
	 */
	
	public function check_login()
	{
		
		$user = $this->_CI->session->userdata($this->_KEY);
		
		if(empty($user))
		{
			
			return null;
		}
		else
		{
			return $user;
		}
	}
	
	
	public function check_user($data)
	{
		
		if(!empty($data['EMAIL']) && !empty($data['UID']) && !empty($data['TOKEN']))
		{
			$useritem = $data['UID'].'_'.$data['EMAIL'];		
			$userarr = $this->_CI->session->userdata($useritem);

			if(empty($user))
			{
				return null;
			}
			else 
			{
				$userarr = json_decode($user,true);
				
				if($userarr['txemail'] == $data['EMAIL'] && $userarr['uid'] == $data['UID'] && $userarr['token'] == $data['TOKEN'])
				{
					return $user;
				}
				else 
				{
					return null;
				}
			}
		}
		else 
		{
			return null;
		}
		
	}
	
	/**
     * 设置session
     *
     * @access private
     * @return void
     */
	private function _set_session() 
	{
		$session_data = array('user' => serialize($this->_user));
		
		$this->_CI->session->set_userdata($session_data);
	}
	
	/**
	 * 
	 * 根据键值设置session ...
	 */
	private function _set_session_by_key($key)
	{
		
		$session_data = serialize($this->_user);
        unset($this->_user['passwd']);
		$this->_CI->session->set_userdata($this->_KEY,$this->_user);
	}
	
	 /**
     * 处理用户登出
     * 
     * @access public
     * @return void
     */
	public function process_logout()
	{
		$this->_CI->session->sess_destroy();
		
		redirect('login');
	}
	
}