<?php
 
namespace Common\Util;

class DemoUtilImage
{

    /**
     * 获取头像图片的URL地址
     * @param int $id
     */
    public static function getFaceUrl($id)
    {
 
		
       // $facePath = WEB_URL . '/Data/faces';
      // $facePath="";
    
      //  return    $facePath.'/face_' . $id . '.gif';
    return   'http://192.168.31.208/mycms/Upload/Home/image/' . $id .'.jpg';
    }
    
    /**
     * 获取头像图片的对象
     * @param int $id
     */
    public static function getFaceImage($id)
    {
        return array(
            'id' => $id,
            'url' => self::getFaceUrl($id),
            'type' => 'png',
        );
    }
}

