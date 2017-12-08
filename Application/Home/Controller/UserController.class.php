<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\Captcha;

// require_once '../Model/Captcha.class.php';


class UserController extends Controller
{
	public function register()
	{
		if(IS_POST)
		{
		//1.创建数据表操作对象
		$userTable = D('users');  
		//通俗一点说：M实例化参数是数据库的表名。D实例化的是你自己在Model文件夹下面建立的模型文件
		

		//2.获取表单数据
		$userName =I('post.username');
		$userPswd = I('post.password');
		$userPswd2= I('post.password2');
		$userImage =I('post.image');
		$captcha = I('post.captcha');

		// echo $userName;

		if(Captcha::checkCaptcha($captcha,Captcha::REGISTER_CAPTCHA))
			{
		//3.注册
		$r = $userTable->doUserRegister($userName,$userPswd,$userImage);
		// dump($r);
		
				if($r)
				{
					$this->success('用户注册成功！',U('user/login'));
				}
			}else
			{ //验证码不正确，要求用户重新填写
				$this->error('验证码错误,请重新填写');
			}

		}else
		{
			//显示视图文件
			$this->assign('view_title','注册');
			$this->display();
		}

	}

	public function login()
	{
		if (IS_POST) {  //用户已经提交表单数据

		//1.创建数据表操作对象
		$userTable = D('users');  
		//通俗一点说：M实例化参数是数据库的表名。D实例化的是你自己在Model文件夹下面建立的模型文件
		

		//2.获取表单数据
		$userName =I('post.username');
		$userPswd = I('post.password');
		
		//3.判断用户名和密码的有效性
		if($userTable->isValidUser($userName,$userPswd))
		{
			//3.1把用户名和用户id信息放到session中
			session('loginedUser',$userName);
			session('loginedUserId',$userTable->getUserIdByUserName($userName));
			//3.2跳转到首页
			$this->success('用户登录成功！',U('msg/index')); 
		}else
		{
			$this->error('用户名或密码错误，请重新登录');	
		}

		}
		else  // 用户没有提交POST表单数据
		{
			//显示视图文件
			$this->assign('view_title','登录');
			$this->display();
		}
	}

	public function logout()
	{
		//1、销毁session
		session('loginedUser',null);
		session('loginedUserId',null);

		//2、跳转到首页
		$this->redirect('home/msg/index', array(), 2, '注销成功，正在跳转到首页...');
		//redirect方法的参数用法和U函数的用法一致
	}

	public function changepassword()
	{
		//1.创建数据表操作对象
		$userTable = D('users');  
		//通俗一点说：M实例化参数是数据库的表名。D实例化的是你自己在Model文件夹下面建立的模型文件
		

		//2.获取表单数据
		$userName ='test01';
		$oldPswd = '111';
		$newPswd ='222';

		//3.修改密码
		$r = $userTable->doChangePswd($userName,$oldPswd,$newPswd);
		dump($r);
	}

/**
 * 创建验证码图片
 * @param  [string] $atype [创建的是哪一个操作的验证码，默认为'register']
 * @return [type]        [description]
 */
	public function captcha($atype = 'register')
	{
		// echo " get here";
		// exit();
		switch ($atype) {
				case 'register':
					Captcha::createCaptcha(Captcha::REGISTER_CAPTCHA);
					break;

				case 'login':
					Captcha::createCaptcha(Captcha::LOGIN_CAPTCHA);
					break;
				
				default:
					Captcha::createCaptcha(Captcha::REGISTER_CAPTCHA);
					break;
			}	
	}
}