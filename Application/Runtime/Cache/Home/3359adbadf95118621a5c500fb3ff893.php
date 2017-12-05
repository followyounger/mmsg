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
                    <div class="loginbox clearfix twocolumns"> 
          <div class="loginpanel"> 
            <h2>请详细填写您的注册信息！</h2> 
              <div class="subcontent loginsub">         
                <form action="" method="post" id="login"> 
                  <div class="loginform"> 
                    <div class="form-label">
                        <label for="username">用户名</label>
                    </div> 
                    <div class="form-input"> 
                      <input type="text" name="username" id="username" size="15" value="" />
                      <br>
                      <span id="userTip" class="errorTip"></span> 
                    </div> 
        
                    <div class="clearer"></div> 
        
                    <div class="form-label">
                        <label for="password">密码</label>
                    </div> 
                    <div class="form-input"> 
                      <input type="password" name="password" id="password" size="15" value="" /> 
                      <br>
                      <span id="pswdTip" class="errorTip"></span>
                    </div> 
        
                     <div class="clearer"></div> 
        
                     <div class="form-label">
                        <label for="password">确认密码</label>
                    </div> 
                    <div class="form-input"> 
                      <input type="password" name="password2" id="password2" size="15" value="" /> 
                      <br>
                      <span id="pswd2Tip" class="errorTip"></span>
                    </div> 
        
                    <div class="clearer"></div> 
        
                     <div class="form-label">
                        <label for="password">选择头像</label>
                    </div> 
                    <div style="margin-left: 235px"> 
                                            <img src="/Public/images/0.gif" width="30px" height="30px">
                        <input type="radio" name="image" id="image" value="/Public/images/0.gif">                       <img src="/Public/images/1.gif" width="30px" height="30px">
                        <input type="radio" name="image" id="image" value="/Public/images/1.gif">                       <img src="/Public/images/2.gif" width="30px" height="30px">
                        <input type="radio" name="image" id="image" value="/Public/images/2.gif">                       <img src="/Public/images/3.gif" width="30px" height="30px">
                        <input type="radio" name="image" id="image" value="/Public/images/3.gif">                       <img src="/Public/images/4.gif" width="30px" height="30px">
                        <input type="radio" name="image" id="image" value="/Public/images/4.gif">                       <img src="/Public/images/5.gif" width="30px" height="30px">
                        <input type="radio" name="image" id="image" value="/Public/images/5.gif">                       <img src="/Public/images/6.gif" width="30px" height="30px">
                        <input type="radio" name="image" id="image" value="/Public/images/6.gif">                       <img src="/Public/images/7.gif" width="30px" height="30px">
                        <input type="radio" name="image" id="image" value="/Public/images/7.gif">                       <img src="/Public/images/8.gif" width="30px" height="30px">
                        <input type="radio" name="image" id="image" value="/Public/images/8.gif">                       <img src="/Public/images/9.gif" width="30px" height="30px">
                        <input type="radio" name="image" id="image" value="/Public/images/9.gif">                    </div> 
                    
                    <div class="clearer"></div> 
        
                     <div class="form-label">
                        <label for="captcha">验证码</label>
                    </div> 
                    <div class="form-input"> 
                      <input type="text" name="captcha" id="captcha" size="15" value="" />
                      <img src="<?php echo U('user/captcha?atype=register');?>" id="captchaImg" style="cursor: pointer; width: 150px; height: 60px;">
                      <br>
                      <span id="captchaTip" class="errorTip"></span>
                    </div> 
        
                    <div class="clearer"></div> 
        
                    <div class="form-input"> 
                      <input type="submit" id="submit" name="register" value="注册" /> 
                    </div> 
        
                    <div class="clearer"></div> 
                  </div> 
                </form> 
              </div> 
              
             </div> 
            <div class="signuppanel"> 
              <h2>注册帮助</h2> 
              <div class="subcontent"> 
                <p>
                    <b>1 用户名</b> <br> 
                    用户名必须是字母、数字或下划线，且必须以字母开头（至少6位）<br>
                    <b>2 密码和确认密码</b> <br> 
                    密码和确认密码必须相同，且至少8位<br>
                    <b>3 验证码</b> <br> 
                    验证码不区分大小写<br>
                </p>     
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