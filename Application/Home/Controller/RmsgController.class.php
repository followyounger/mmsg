<?php

namespace Home\Controller;
use Think\Controller;

class RmsgController extends Controller
{
	public function recipemsg()
	{
		$rmsgsTable = D('rmsgs');
		//获取当前主留言的id
		$msgid = I('get.msgid');

		if(IS_POST) 
		{
			//获取表单数据
			
			$content= I('post.content');
			//添加留言
			$user_id = session('loginedUserId');

			$r = $rmsgsTable->recipeMsg($msgid,$user_id,$content);
			//添加留言后的处理
			if(false !== $r)
			{
				$this->success('回复留言成功',U('msg/viewmsg?msgid=' . $msgid),3);
			}
			else
			{
				$this->error('添加回复失败');
			}

		}else
		{
			if(session('?loginedUser'))
			{
				//获取当前主留言的详细信息
				$msgsTable = D('msgs');
				$msgObj = $msgsTable->getMsgById($msgid);
				//显示视图
				$this->assign('msg' , $msgObj);
				$this->assign('view_title','发表留言');
				$this->display();
			}else
			{
				//提示用户登录，不能添加留言
				$this->error('只有登录用户才可以发表回复，请您先登录！',U('user/login/'));
			}
		}

	}

	public function editrmsg()
	{

	}	

	public function deletermsg()
	{

		$rmsgsTable = D('rmsgs');

		
		$rmsg = $rmsgsTable->getRmsgById(I('get.rmsgid'));


		
		// 
		$r = $rmsgsTable->deleteRmsg('id=' . I('get.rmsgid'));
		if (false !== $r) {  //删除成功
			$this->success('回帖删除成功!',U('msg/viewmsg?msgid=' . $rmsg['msgid']),4);
		}else
		{
			//留言删除失败
			$this->error('回帖删除失败！');
		}

	}

	
}