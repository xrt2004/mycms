<?php
namespace Home\Controller;
use Think\Controller;

import('ORG.Net.UploadFile');
class BlogController extends BaseController {
   
   
         
  
    
    public function blogList()
    {
        $this->doAuth();
    
        $typeId = intval(I('typeId'));
        $pageId = intval(I('pageId'));
        $customerid=I('customerid');
    
        $blogList = array();
        switch ($typeId) { 
            case 0:
                $blogDao = M('blog');
                $blogList = $blogDao->limit($pageId,10)->select();
                
                break;
            case 1:
                $blogDao = M('Blog');

                $map['customerid'] = $customerid;
                // 把查询条件传入查询方法
                $blogList = $blogDao->where($map)->limit($pageId,10)->select();   
                break;
            case 2:
                break;
        }
        if ($blogList) 
        {
            foreach ($blogList as &$row) {
               /*
                if (strlen($row['picture']) > 0) 
                {
                    $row['picture'] = C("TMPL_PARSE_STRING")["__HOME_IMAGE__"] . $row['picture'];
                }
                */
            }
            $this->render('10000', 'Get blog list ok', array(
                'Blog' => $blogList
            ), 1);
        }
        $this->render('14008', 'Get blog list failed');
    }
  
    //xiangrt 
    public function blogView ()
    {
        $this->doAuth();
    
        $blogId = intval(I('blogId'));
    
         $blogDao = M('Blog');
  
        $map['id'] = $blogId;
        // 把查询条件传入查询方法
        $blogItem = $blogDao->where($map)->select();
        
        if(NULL==$blogItem)
        {
            $this->render('14013', 'get notification failed');
        
        }
        else
        {
        /*
            if (strlen($blogItem['picture']) > 0) {
                $blogItem['picture'] = __PICTURE_URL . $blogItem['picture'];
            }*/
            
            $customerDao = M('Customer');       
            $map['id'] =$blogItem[0]['customerid'];
            // 把查询条件传入查询方法
            $customerItem = $customerDao->where($map)->select();
            
    
            $this->render('10000', 'Get blog ok', array(
                'Customer' => $customerItem,
                'Blog' => $blogItem
            ));
            
        }

    }
    //////
    
    public function blogCreate()
    {
        $this->doAuth();
    
        $content =I('content');
    
        if ($content) 
        {
        
        if (! empty ( $_FILES )) 
        {
             $upload = new \Think\Upload();// 实例化上传类
		    $upload->maxSize   =     3145728 ;// 设置附件上传大小
		    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		    $upload->rootPath  =     './Upload/'; // 设置附件上传根目录
		    $upload->savePath  =     ''; // 设置附件上传（子）目录
		    	
		    	//略所图
        $upload->thumb = true; //开启略所图
        $upload->thumbType = 0; //保持原始比例
        $upload->thumbMaxWidth = '50,480';
        $upload->thumbMaxHeight = '50,640';
		    // 上传文件 
		    $info   =   $upload->upload();
		    if(!$info) 
		    {  // 上传错误提示错误信息
		      $this->render('10030', 'upload error', array("aa"=>"bb"));   
		    }
		    else
		    {// 上传成功
		          //  $uploadList = $upload->getUploadFileInfo();
		          // dump($info['file0']['savename']);   $file['savePath'].$file['savename']
 
 
			 
			
 
 
		         //  $this->render('10000', 'upload ok', array("aa"=>"bb"));   
		    }
		} //end if empty
     
            
    
            $blogDao = M('Blog');
             $upload_file_url='http://192.168.31.208/mycms/Upload/' . $info['file0']['savepath'] . $info['file0']['savename'];
           //  dump($upload_file_url);
            $blogDao->add(array(
                'customerid'	=>1,
                'desc'			=> '0',
                'title'			=> 'title '.$content,
                'content'		=> $content,
                'picture'		=> $upload_file_url,
                 'face'		=> $upload_file_url,
                'commentcount'	=> 0
            ));
   
         
             $this->render('10000', 'create blog  OK', array("aa"=>"bb"));   
        } //  if ($content)
        $this->render('14009', 'Create blog failed', array("aa"=>"bb"));   
        
        
    }
    /////////////////
}

