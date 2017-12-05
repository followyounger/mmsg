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
            <br>
            <!-- 主贴 -->
            <table cellspacing="0" class="forumpost">
                <tbody><tr class="header">
                    <td class="picture left">
                        <img src="images/2.gif" height="35" width="35">
                    </td>
                    <td class="topic starter">
                        <div class="subject"><?php echo ($msg["title"]); ?></div>
                        <div class="author">
                            由 <?php echo ($msg["user_id"]); ?>                          发表于 <?php echo ($msg["time"]); ?>                     </div>
                    </td>                   
                </tr>
                <tr>
                    <td class="left side"></td>
                    <td class="content"> 
                        <div class="posting">                           
                            <?php echo ($msg["body"]); ?>                                                                   <div class="commands">
        <a href="<?php echo U('rmsg/recipemsg',array('msgid' => $msg[id]));?>">回复</a>
    </div>                      </div>
                        
                    </td>
                </tr>

            </tbody></table> 
            <!-- 回帖列表 -->
            <?php if(is_array($msg["rmsgs"])): foreach($msg["rmsgs"] as $key=>$vo): ?><table cellspacing="0" class="forumpost" style="margin-left: 50px;">
    <tbody><tr class="header">
        <td class="picture left">
            <img src="images/2.gif" height="35" width="35">
        </td>
        <td class="topic">
            <div class="subject">回复: </div>
            <div class="author">由 <?php echo ($vo["userid"]); ?> 发表于 <?php echo ($vo["time"]); ?></div>
        </td>
    </tr>
    
    <tr>
        <td class="left side">&nbsp;</td>
        <td class="content"> 
            <div class="posting"> 
                <?php echo ($vo["body"]); ?>                                <br><br>                        
            </div>
                            
            <div class="commands">
                <a href="/rmsg/editrmsg/rmsgid/<?php echo ($vo["id"]); ?>">编辑</a> | 
                <a href="<?php echo U('rmsg/deletermsg',array('rmsgid' => $vo[id]));?>">删除</a>
            </div>      </td>
    </tr>
</tbody></table><?php endforeach; endif; ?>
            <!-- 回帖列表 -->
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