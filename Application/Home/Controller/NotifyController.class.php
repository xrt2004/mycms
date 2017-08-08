<?php
namespace Home\Controller;
use Think\Controller;
class NotifyController extends BaseController {
   
   
         
    public function notice(){
    	$this->doAuth();
	 
    	$id = I('id');
		$NoticeDao = M("Notice");  
        $map['id'] = $id;
       // 把查询条件传入查询方法
       	$NoticeItem = $NoticeDao->where($map)->select(); 

	 
       	

       	if(NULL==$NoticeItem)
       	{
       	    $this->render('14013', 'get notification failed');
       	
       	}
       	else
       	{
       	   
       	     
       	   
       	    	
       	    $this->render('10000', 'get notification success', array(
       	        'Notice' => $NoticeItem
       	    ));
       	
       	}
       	
    }
  
  
}