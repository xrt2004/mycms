<?php
namespace Home\Controller;
use Think\Controller;
class CommentController extends BaseController {
   
   
   
  
    public function commentList()
    {
        $this->doAuth();
    
        $blogId = intval(I('blogId'));
        $pageId = intval(I('pageId'));
    
        $commentDao = M('Comment');
        $map['blogid'] = $blogId;
        // 把查询条件传入查询方法
        $commentList = $commentDao->where($map)->limit($pageId,10)->select();
 
        if(NULL==$commentList)
        {
           
            $this->render('14010', 'Get comment list failed');
        }
        else
        {    
            $this->render('10000', 'get comment list success', array(
                 'Comment.list' => $commentList
            ));
        
        }
    }
  //================
  
    public function commentCreate ()
    {
        $this->doAuth();
    
        $blogId = intval(I('blogId'));
        $content =I('content');
    
        // check blog exist
        $blogDao = M('Blog');
        $map['id'] = $blogId;
        
        $blogs = $blogDao->where($map)->select();
        //$customerItem = $Customer->field('*')->where($map)->find();
         
        if(NULL==$blogs)
        {
            $this->render('10009', 'Blog not exist');
        }

        if ($blogId && $content) {
            $commentDao = M('Comment');
            $commentDao->add(array(
                'blogid'		=> $blogId,
                'customerid'	=> I('customerid'),
                'content'		=> $content
            ));
            // add blog commentcount
            $blogDao->where(array('customerid'=>$customerId))->setInc('commentcount',1); // 文章阅读数加1

            $this->render('10000', 'Create comment ok');
        }
 
        $this->render('14011', 'Create comment failed');
    }
    
    //=============
}