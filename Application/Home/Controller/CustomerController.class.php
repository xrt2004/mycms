<?php
namespace Home\Controller;
use Think\Controller;
class CustomerController extends BaseController {
   
   
    public function customerList()
    {
        $this->doAuth();
    
        $Customer = M("customer");
 
        $customerList = $Customer->select();
       
        
        $this->render('10000', 'Get customer list ok', array(
            'Customer.list' => $customerList
        ));
    }
    
         
    public function customerView()
    {
        $this->doAuth();
        $customerId = I('customerId');
        
       $Customer = M("Customer");
    
       $map['id'] = $customerId;
       // 把查询条件传入查询方法
       $customerItem = $Customer->where($map)->select();
       
       if(NULL==$customerItem)
       {
           $this->render('14002', 'get customer failed');
       }
       else
       {
           $this->render('10000', 'view customer success', array(
               'Customer' => $customerItem
           ));
       
       }
     
    }
    
    public function customerEdit ()
    {
        $this->doAuth();
        $id = I('id');
        $key = I('key');
        $val = I('val');
        $customerDao = M("Customer");
		//$whereid="id={$id}";
		//dump($val);
        if ($key) 
        {
           
            try {
                
                $customerDao->where("id={$id}")->setField($key,$val);
            } 
            catch (Exception $e) 
            {
                $this->render('14003', 'Update customer failed');
            }
            $this->render('10000', 'Update customer ok');
        }
        $this->render('14004', 'Update customer failed');
    }
    
	public function customerCreate()
	{
//		$this->doAuth();
		
		$name = I('name');
		$pass = I('pass');
		$sign = I('sign');
		$face = I('face');
		if ($name && $pass && $sign && $face) 
		{
			
			 $customerDao = M("Customer");
			$data['name'] = I('name');
			$data['pass'] = I('pass');
			$data['sign'] = I('sign');
			$data['face'] = I('face');
            $customerDao->add($data);

			$this->render('10000', 'Create customer ok');
		}
		$this->render('14005', 'Create customer failed');
	}
  
	
	public function fansAdd()
	{
	    $this->doAuth();
	
	    $customerId = I('customerId');
	    if ($customerId) 
	    {
	        $CustomerFansDao = M("CustomerFans");
	       
	        $map['id'] = $customerId;
	       
	        $CustomerFans = $CustomerFansDao->where($map)->select();
	        //$customerItem = $Customer->field('*')->where($map)->find();
	        
	        if(NULL==$CustomerFans)
	        {
	           $CustomerFansDao->add(array(
	                'customerid'	=> $customerId,
	                'fansid'		=> I('fansid')
	            ));
	           $Customer = M("Customer");
	           $Customer->where(array('id'=>$customerId))->setInc('fanscount',1); // 文章阅读数加1
	           
	           $Notice = M("Notice");
	           $Notice->where(array('customerid'=>$customerId))->setInc('fanscount',1); // 文章阅读数加1
	           $this->render('10000', 'Add fans ok');
	        }
	        else
	        {    	
	            $this->render('14006', 'Add fans failed');        
	        }

	    }
	    $this->render('14006', 'Add fans failed');
	}
	
	public function fansDel()
	{
	    $this->doAuth();
	
	    $customerId = I('customerId');
	    if ($customerId)
	    {
	        $CustomerFansDao = M("CustomerFans");
	
	        $map['customerid'] = $customerId;
	
	        $CustomerFans = $CustomerFansDao->where($map)->select();
	         
	        if(NULL==$CustomerFans)
	        {
	           
	            $this->render('14007', 'delete fans failed');
	        }
	        else
	        {
	          //  $User->where('id=5')->delete(); // 删除id为5的用户数据
	            M("CustomerFans")->where("customerid=".$customerId)->delete(); // 文章阅读数加1
	          
	            $Customer = M("Customer");
	            $Customer->where("id=".$customerId)->setDec('fanscount',1); // 文章阅读数加1
	            
	            $Notice = M("Notice");
	            $Notice->where("customerid=".$customerId)->setDec('fanscount',1); // 文章阅读数加1
	            $this->render('10000', 'Delete fans ok');
	             
	        }
	
	    }
	    $this->render('14006', 'Add fans failed');
	}
  
}