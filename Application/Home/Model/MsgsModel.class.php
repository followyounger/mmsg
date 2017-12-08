<?php

namespace Home\Model;
use Think\Model;
use Think\Page;
use Home\Model\UsersModel;

class MsgsModel extends Model
{
	//当前数据表
	protected $trueTableName = 'msgs';

	//字段限定信息
	


	//////////////////////////////////////////////////////
	

	//功能函数
	
	/**
	 * 添加留言函数
	 * @param [type] $msgTitle  [description]
	 * @param string $msgBody   [description]
	 * @param [type] $msgUserId [description]
	 */
	public function addMsg($msgTitle,$msgBody="",$msgUserId = null)
	{
		$data=array();

		//1.先判断$msgTitle类型
		if (is_array($msgTitle)) {
			$data['title'] = $msgTitle['title'];
			$data['body'] = $msgTitle['body'];
			$data['userid'] = $msgTitle['userid'];
		}else if(is_string($msgTitle))
		{
			$data['title']=$msgTitle;
			if(empty($msgBody) || !$msgUserId)
				return false;

			$data['body'] = $msgBody;
			$data['user_id'] = $msgUserId;
		}

		//2.数据库插入
		//
		return  $this->add($data);

	}

	/**
	 * 修改留言
	 * @param  [type] $where [查询条件（哪些记录符合条件）]
	 * @param  array  $data  [修改后的记录值]
	 * @return [type]        [description]
	 */
	public function updateMsg($where,$data=array())
	{
		//1.查询条件的判断
		// if(is_array($where))
		// {

		// }else if(is_string($where))
		// {

		// }
		// 
		if (empty($where)) {
			return false;
		}

		//2.修改
		return $this->where($where)->save($data);

	}

	/**
	 * 删除留言
	 * @param  [type] $where [description]
	 * @return [type]        [description]
	 */
	public function deleteMsg($where)
	{
		//1.条件判断
		if (!$where || empty($where)) {
			return false;
		}

		//2.开始删除
		//2.1先获取当前留言的主键
		$id = $this->where($where)->getField('id');


		//2.2删除当前留言的回帖信息
		$rmsgsTable = D('rmsgs');

		if(false !== $rmsgsTable->deleteRmsgsByMsgId($id))
		{
		//
		//2.3删除当前留言
			return $this->where($where)->delete();
		
		}
		return false;
	}


	public function getMsgById($id)
	{
		//1.先获取主贴
		$msg = $this->getById($id);
		$userTable = D('users');
		$msg['username'] = $userTable->getUserNameByUserId($msg['user_id']);
		$image = $userTable->getImageByUserId($msg['user_id']);
		$image = strstr($image, 'images/');
		$msg['image'] = $image;

		//2.获取回帖信息
		$rmsgsTable = D('rmsgs');
		$msg['rmsgs'] = $rmsgsTable->getRmsgsByMsgId($msg['id']);

		for ($i=0; $i <count($msg['rmsgs']) ; $i++) { 
			# code...
			$msg['rmsgs'][$i]['username'] = $userTable->getUserNameByUserId($msg['rmsgs'][$i]['userid']);
			$image = $userTable->getImageByUserId($msg['rmsgs'][$i]['userid']);
			$image = strstr($image, 'images/');
			$msg['rmsgs'][$i]['image'] = $image;
		}

		//3.返回
		// dump($msg);
		return $msg;
	}

	public function getMsgsByPage()
	{
		//1.得到数据集的总数
		$count = $this->count();
		//2.创建分页类（Page）
		$page = new Page($count,C('page_rows'));

		// 设置分页链接信息
		$page->setConfig('theme',"%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");
		$page->setConfig('prev','上一页');
		$page->setConfig('next','下一页');
		//3.获取分页码
		$show = $page->show();
		//4.获取分页记录
		$msgs = $this->order('time desc')->limit($page->firstRow . ',' . $page->listRows)->select();

		//5.获取留言中的用户名和头像
		$userTable = D('users');
		

		for ($i=0; $i < count($msgs) ; $i++) { 
			# code...
			// dump($userTable->getUserNameByUserId(12));
			$msgs[$i]['username'] = $userTable->getUserNameByUserId($msgs[$i]['user_id']);
			$image = $userTable->getImageByUserId($msgs[$i]['user_id']);
			$image = strstr($image, 'images/');
			$msgs[$i]['image'] = $image;
			// print_r($msgs[$i]);
		}

		// dump($msgs);

		//6.生成返回结果
		$results = array();
		$results['lists']  = $msgs;
		$results['pages'] = $show;
		$results['pageCount'] = $page->totalPages;

		//6.返回
		return $results;
	}

}