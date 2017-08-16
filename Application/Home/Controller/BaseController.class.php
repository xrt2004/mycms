<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
   
    public function indexSrc(){
      //PHP手册
      //https://www.kancloud.cn/manual/thinkphp/1759
      
     //  $Data = M('customer'); // 实例化Data数据模型
      //  $this->data = $Data->select();
        // $this->display();
      $Data = M('customer'); // 实例化Data数据模型
      $blogList= $Data->select();
          $this->render('100','good',array(
				'customer.list' => $blogList
			));
	}
    
   	public function doAuth ()
	{
	   //xiang rt 后台测试用的  admin   ,原来是 customer
	/*
		if (!isset($_SESSION['customer'])) {
			$this->render('10001', 'Please login firstly,you login');
		} else {
	    	$this->customer = $_SESSION['customer'];
		}
		*/
	}
    
    	/**
	 * @ingore
	 */
	public function doAuthAdmin ()
	{	/*
		if (!isset($_SESSION['admin'])) 
		{
			$this->forward($this->apiAuth); // auth action
		} 
		else {
			$this->admin = $_SESSION['admin'];
		}	*/
	}
    	public function render ($code, $message, $result = '', $isList = 0)
	{
		// filter by datamap
		if (is_array($result)) 
		{
			foreach ((array) $result as $name => $data) 
			{
				if (isList==1) {
				//	$model = trim(str_replace('.list', '', $name));
					foreach ((array) $data as $k => $v) 
					{
					//	$result[$name][$k] = M($model,C('DB_PREFIX'), $v);
						$result[$name][$k] = $v;
					}
				
				} 
				else 
				{
					$model = trim($name);
				//	$result[$name] = M($model, $data);
					$result[$name] =$data;
			//	$result =$data;
				}
			}
		
		}
		// print json code
		echo json_encode(array(
			'code'		=> $code,
			'message'	=> $message,
			'result'	=> $result
		));
	 die;
	}
}