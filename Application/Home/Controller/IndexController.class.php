<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {
   
       //https://www.kancloud.cn/manual/thinkphp/1769
       //PHP 3.2.3开发手册
    public function index(){
        $this->display();
    }
    public function test(){
      // 	$this->doAuth();
	 
		$Customer = M("customer");  
        $map['id'] = 1;
       // 把查询条件传入查询方法
       	$customerItem = $Customer->where($map)->select(); 

	 
		$this->render('10000', 'Load index ok', array(
			'Customer' => $customerItem
		));
    }
    
    //http://localhost/mycms/index.php/home/index/login/name/huang/pass/2
    	public function login()
	{
		// return login customer
		$name = I('name');
		$pass = I('pass');
		 
		$Customer = M("customer");  
        $map['name'] = $name;
         $map['pass'] = $pass;
        
       // 把查询条件传入查询方法
       	$customerItem = $Customer->where($map)->select(); 
      	//$customerItem = $Customer->field('*')->where($map)->find();

	 if(NULL==$customerItem)
	 {
	 $this->render('10001', 'login error');
	 	 
	 }
	  else
	 {
	 	 	 	  session('customer', $customerItem);
               
	 	 	 	  $customer = array('sid' => session_id());
	 	 	 	  
               	$this->render('10000', 'login success', array(
			       'Customer' => $customerItem
		      ));
	 	 	  	
	 	 }
		
	}//end login
	
		public function logout()
	{
		$_SESSION['customer'] = null;
		$this->render('10000', 'Logout success');
	}
  
}