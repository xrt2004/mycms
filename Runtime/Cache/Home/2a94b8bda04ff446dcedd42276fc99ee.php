<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<ul>
<li><a href="<?php echo U('Home/index/test');?>">test get customer</a> --><?php echo U('Home/index/test');?> </li>
<li><a href="<?php echo U('Home/index/login/name/james/pass/james');?>">test login  </a>--><?php echo U('Home/index/login/name/james/pass/james');?></li>
<li><a href="<?php echo U('Home/index/logout');?>">test logout</a> --><?php echo U('Home/index/logout');?> </li>
</ul>
<hr>
<ul>
<li><a href="<?php echo U('Home/Customer/customerList');?>">test 用户列表</a> --><?php echo U('Home/Customer/customerList');?> </li>
<li><a href="<?php echo U('Home/Customer/customerView/customerId/1');?>">test customerView  </a>--><?php echo U('Home/Customer/customerView/customerId/1');?></li>

<li><a href="<?php echo U('Home/Customer/fansAdd/customerId/1/fansid/1');?>">test fansAdd  </a>--><?php echo U('Home/Customer/fansAdd/customerId/1/fansid/1');?></li>

<li><a href="<?php echo U('Home/Customer/fansDel/customerId/1');?>">test fansDel  </a>--><?php echo U('Home/Customer/fansAdd/customerId/1');?></li>
</ul>
<hr>
<form action="<?php echo U('Home/Customer/customerEdit');?>">
customerEdit<br>
id<input type="text" name="id" value="1"/>
key<input type="text" name="key" value="sign"/>
value<input type="text" name="val"/>
<input type="submit"/>
</form>

<hr>
<form action="<?php echo U('Home/Customer/customerCreate');?>">
customerCreate<br>
name<input type="text" name="name" value="name1"/>
pass<input type="text" name="pass" value="pass2"/>
sign<input type="text" name="sign" value="sign1"/>
face<input type="text" name="face" value="1"/>
<input type="submit"/>
</form>
<hr>
<ul>
<li><a href="<?php echo U('Home/Image/faceView/faceId/2');?>">test faceView  </a>--><?php echo U('Home/Image/faceView/faceId/1');?></li>
<li><a href="<?php echo U('Home/Image/faceList');?>">test faceList  </a>--><?php echo U('Home/Image/faceList');?></li>

<li><a href="<?php echo U('Home/Notify/notice/id/1');?>">test Notify/notice  </a>--><?php echo U('Home/Notify/notice/id/1');?></li>

<li><a href="<?php echo U('Home/Comment/notice/id/1');?>">test Comment/notice  </a>--><?php echo U('Home/Comment/notice/id/1');?></li>
<li><a href="<?php echo U('Home/Comment/commentList/blogId/1/pageId/0');?>">test commentList  </a>--><?php echo U('Home/Comment/commentList/blogId/1/pageId/0');?></li>
</ul>

<hr>
<form action="<?php echo U('Home/Comment/commentCreate');?>">
customerCreate<br>
blogId<input type="text" name="blogId" value="1"/>
content<input type="text" name="content" value="content"/>
 customerid<input type="text" name="customerid" value="customerid"/>
<input type="submit"/>
</form>
<ul>
<li><a href="<?php echo U('Home/Blog/blogList/typeId/0/pageId/0/customerid/1');?>">test blogListe  </a>--><?php echo U('Home/Blog/blogList');?></li>
<li><a href="<?php echo U('Home/Blog/blogView/blogId/1');?>">test blogView  </a>--><?php echo U('Home/Blog/blogList');?></li>
</ul>
<form action="<?php echo U('Home/Blog/blogCreate');?>">
customerCreate<br>
blogId<input type="text" name="blogId" value="1"/>
content<input type="text" name="content" value="content"/>
 customerid<input type="text" name="customerid" value="customerid"/>
<input type="submit"/>
</form>

</body>
</html>