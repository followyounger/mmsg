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
<div class="loginbox clearfix twocolumns"> 
  <div class="loginpanel"> 
    <h2>欢迎访问本站</h2> 
      <div class="subcontent loginsub"> 
        <div class="desc"> 
          请使用用户名和密码登录<br>(您的浏览器的Cookies设置必须打开)</div> 
        <form action="" method="post" id="login"> 
          <div class="loginform"> 
            <div class="form-label">
                <label for="username">用户名</label>
            </div> 
            <div class="form-input"> 
              <input type="text" name="username" id="username" size="15" value="" /> 
            </div> 

            <div class="clearer"></div> 

            <div class="form-label">
                <label for="password">密码</label>
            </div> 
            <div class="form-input"> 
              <input type="password" name="password" id="password" size="15" value="" /> 
            </div> 

            <div class="clearer"></div> 

            <div class="form-label">
                <label for="password">保持登录</label>
            </div> 
            <!-- <div class="form-input" id="time">  -->
              <input type="radio" name="day" value="1" />1天       
              <input type="radio" name="day" value="7" />1周
             <input type="radio" name="day" value="31" />1月
              <input type="radio" name="day" value="365" />1年
            <!-- </div> --> 
            
            <div class="clearer"></div> 

            <div class="form-input"> 
              <input type="submit" name="login" id="submit" value="登录" /> 
            </div> 

            <div class="clearer"></div> 
          </div> 
        </form> 
      </div> 
      
     </div> 
    <div class="signuppanel"> 
      <h2>常见问题</h2> 
      <div class="subcontent"> 
        <p><b>还没有用户名？</b> <br> 
            本留言板必须用户登录后，才可以发表留言，游客只能查看留言，还等什么，快来<a href="register.php">注册</a>吧！<br>
            <br>
            <b>忘记密码了？</b> <br> 
            密码忘记了，怎么办呢？还记得注册时填写的密码保护问题吗？快去<a href="fetchPswd.php">重设密码</a>吧！<br></p>      </div> 
      </div> 
</div> 
 
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