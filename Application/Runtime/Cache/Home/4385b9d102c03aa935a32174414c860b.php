<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="zh-cn" xml:lang="zh-cn">
<head>
    <title>多用户留言系统</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/moodle.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/moodle2.css" />
    <script type="text/javascript" src="/Public/script.js"></script>
</head>
 
<body  class="login course-1 notloggedin dir-ltr lang-zh_cn_utf8" id="login-index"> 
    <div id="page">
        <div id="header" class="clearfix"> 
            <h1 class="headermain">多用户留言系统</h1> 
            <div class="headermenu">
                <div class="logininfo">
                    <?php if(isset($_SESSION['loginedUser'])): ?>欢迎您，<?php echo (session('loginedUser')); ?>！ | <a href='/index.php/home/user/logout/'>注销</a>
                    <?php else: ?>
                    您尚未登录(<a  href='/index.php/home/user/login/'>登录</a>)&nbsp;
                    还没有用户名(<a href='/index.php/home/user/register/'>注册</a>)<?php endif; ?>
                </div>
            </div> 
        </div>      

        <!-- 面包屑（即“留言板->登录”之类的内容）-->
        <div class="navbar clearfix"> 
            <div class="breadcrumb"> 
                <ul> 
                    <li class="first"><a href="/">多用户留言系统</a></li>
                    <li> <span class="arrow sep">&#x25BA;</span> <?php echo ($view_title); ?> </li>
                </ul>
            </div>          
        </div> 

        <!-- START OF CONTENT --> 
        <div id="content">
                    <div id="content">
            <div id="intro" class="generalbox box">
                <font size="+0" face="courier new">
                    欢迎大家来到我的留言板。<br>
                    您有什么问题或想法，请书写下您的笔墨。<br>                 
                    如果您有其他的想法......<br>
                    您可以在这里和大家一起交流和探讨。<br>
                    如果您还没有用户名，请<a href="<?php echo U('user/register');?>">注册</a>一个用户名，体验更多精彩。<br>
                </font>
            </div>
        
            <div class="singlebutton forumaddnew">
                 <input type="submit" onclick="window.location.href='<?php echo U('msg/addmsg');?>';" value="添加一个新讨论话题">
            </div>

            <br>

            <table cellspacing="0" class="forumheaderlist">
                    
                <!-- 表头信息 -->
                <tbody><tr>
                    <th class="header topic" scope="col">留言</th>
                    <th class="header author" colspan="1">留言人</th>
                    <th class="header replies" scope="col">发表时间</th>
                    <th class="header lastpost" scope="col">操作</th>
                </tr>   
                
                <?php if(is_array($lists)): foreach($lists as $key=>$vo): ?><tr class="">
                    <td class="topic starter" width="40%"><a href="<?php echo U('msg/viewmsg');?>?msgid=<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></td>
                    <td width="20%" style="line-height: 35px;">
                        <img class="userpicture" src="images/2.gif" height="35" width="35">
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($vo["user_id"]); ?></span>
                    </td>
                    <td class="replies" width="20%"><?php echo ($vo["time"]); ?></td>
                    <td class="lastpost" width="20%" style="text-align: center;">
                        <a href="<?php echo U('msg/editmsg');?>?msgid=<?php echo ($vo["id"]); ?>">编辑</a>
                        <a href="<?php echo U('msg/deletemsg');?>?msgid=<?php echo ($vo["id"]); ?>">删除</a>
                    </td>
                </tr><?php endforeach; endif; ?>    

                </tbody>
            </table>

            <!-- 显示分页码（开始） -->
            <div class="paging">
                <?php echo ($pages); ?>
            </div>
            <!-- 显示分页码（结束） -->

        </div>
        </div> 
        <!-- END OF CONTENT --> 

        
        <!-- START OF FOOTER -->
        <div id="footer">
            &copy;2017 <a href="#">我叫 叶 茂 昭~~跟我念一遍</a><br />
        </div>
        <!-- END OF FOOTER -->
    </div>
</body>
</html>