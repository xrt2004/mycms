<?php
namespace Home\Controller;
use Think\Controller;
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
                if (strlen($row['picture']) > 0) 
                {
                    $row['picture'] = __PICTURE_URL . $row['picture'];
                }
            }
            $this->render('10000', 'Get blog list ok', array(
                'Blog.list' => $blogList
            ));
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
        
            if (strlen($blogItem['picture']) > 0) {
                $blogItem['picture'] = __PICTURE_URL . $blogItem['picture'];
            }
            
            $customerDao = M('Customer');       
            $map['id'] =$blogItem['customerid'];
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
            // upload pic logic
            $upload_file_url = '';
            $upload_err = $_FILES['file0']['error'];
            $upload_file = $_FILES['file0']['tmp_name'];
            $upload_file_name = $_FILES['file0']['name'];
            if ($upload_file_name) {
                $upload_file_ext = pathinfo($upload_file_name, PATHINFO_EXTENSION);
                if ($upload_err == 0) {
                    $upload_face_dir = __PICTURE_DIR . '/';
                    $upload_file_name = md5(time().rand(123456,999999));
                    $upload_file_path = $upload_face_dir . $upload_file_name . '.' . $upload_file_ext;
                    if (!move_uploaded_file($upload_file, $upload_file_path)) {
                        $this->render('14010', 'Create blog failed');
                    } else {
                        $upload_file_url = $upload_file_name . '.' . $upload_file_ext;
                    }
                } else {
                    $this->render('14011', 'Create blog failed');
                }
            }
            // create
            $blogDao = M('Blog');
            $blogDao->create(array(
                'customerid'	=> $this->customer['id'],
                'desc'			=> '',
                'title'			=> '',
                'content'		=> $content,
                'picture'		=> $upload_file_url,
                'commentcount'	=> 0
            ));
            // add customer blogcount
            $customerDao = $this->dao->load('Core_Customer');
            $customerDao->addBlogcount($this->customer['id']);
            $this->render('10000', 'Create blog ok');
        }
        $this->render('14009', 'Create blog failed');
    }
    /////////////////
}