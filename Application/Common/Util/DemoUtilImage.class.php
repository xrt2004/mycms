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
 
		
        $facePath = WEB_URL . '/Data/faces';
      // $facePath="";
    
        return    $facePath.'/face_' . $id . '.gif';
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

