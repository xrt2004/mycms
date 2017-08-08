<?php
namespace Home\Controller;
use Think\Controller;

use Common\Util\DemoUtilImage;
class ImageController extends BaseController {
   
   
         
    public function faceView(){

    	$this->doAuth();
	 
    	$faceIdStr = I('faceId');
    	$faceIdArr = $faceIdStr ? explode(',', I('faceId')) : array();
    	$faceCount = count($faceIdArr);
    	if ($faceCount == 1)
		 {
    	    $faceId = intval($faceIdArr[0]);
    	    $faceItem = DemoUtilImage::getFaceImage($faceId);
    	    $this->render('10000', 'Get face ok', array(
    	        'Image' => $faceItem
    	    ));
    	} 
    	elseif ($faceCount > 1) {
    	    $faceList = array();
    	    foreach ($faceIdArr as $faceId) {
    	        $faceList[] = DemosUtilImage::getFaceImage($faceId);
    	    }
    	    $this->render('10000', 'Get face list ok', array(
    	        'Image.list' => $faceList
    	    ));
    	} else {
    	    $this->render('14012', 'Get face failed');
    	}
       	
    }
  
    /**
     * ---------------------------------------------------------------------------------------------
     * > 接口说明：头像列表接口
     * <code>
     * URL地址：/image/faceList
     * 提交方式：GET
     * </code>
     * ---------------------------------------------------------------------------------------------
     * @title 头像列表接口
     * @action /image/faceList
     * @method get
     */
    public function faceList()
    {
        // valid face ids
        $faceIdArr = range(0,14);
        // get face images
        $faceList = array();
		
        foreach($faceIdArr as $faceId) 
		{  
			    $faceList[] = DemoUtilImage::getFaceImage($faceId);  
        }
        $this->render('10000', 'Get face list ok', array(
           'Image.list' => $faceList
        ));
		
    }
}