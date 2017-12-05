<?php
namespace Home\Model;
use Think\Model;

class RmsgsModel extends Model
{
	protected $trueTableName ='rmsgs';

	////////////////////////////////////////
	
/**
 * 添加回复
 * @param  [type] $msgid  [description]
 * @param  [type] $userid [description]
 * @param  [type] $body   [description]
 * @return [type]         [description]
 */
	public function recipeMsg($msgid,$userid,$body)
	{
		//1.数据完整性校验
		//2.准备数据
		$data = array();
		$data['msgid'] = $msgid;
		$data['userid'] = $userid;
		$data['body'] = $body;

		//3.插入数据到表中
		return $this->add($data);
	}

/**
 * 修改留言
 * @param  [type] $where [description]
 * @param  array  $data  [description]
 * @return [type]        [description]
 */
	public function editRmsg($where,$data = array())
	{
		//1.查询条件的判断
		if (empty($where)) {
			return false;
		}

		//2.修改
		return $this->where($where)->save($data);
	}

/**
 * 删除回复信息
 * @param  [type] $where [description]
 * @return [type]        [description]
 */
	public function deleteRmsg($where)
	{
		//1.条件判断
		if (!$where || empty($where)) {
			return false;
		}

		//2.开始删除
		
			return $this->where($where)->delete();
		
	}

/**
 * 根据主留言id删除它所有的回复留言信息
 * @param  [mix] $msgid [主留言id,类型为数组或数字或字符串]
 * @return [mix]        [若删除成功，返回删除的记录；若删除失败，返回false]
 */
	public function deleteRmsgsByMsgId($msgid)
	{
		//1.数据完整性校验
		//1.1先判断当前$msgid是否为空
		if(!$msgid || empty($msgid))
		{
			return false;
		}

		//1.2再判断$msgid是否在msgs表中

		//2.构造条件并删除 (借助ThinkPHP源代码)
		$where = array();

		if (is_array($msgid)) {
			$where['msgid'] = array('in',implode(',', $msgid));
			
		}else if(is_string($msgid))
		{
			if(false !== strpos($msgid,','))
			{
				//字符串中包含逗号
				$where['msgid'] = array('in',$msgid);
				
			}else
			{
				$where['msgid'] = $msgid;
			}

		}else if(is_int($msgid))
		{
			$where['msgid'] = $msgid;
		}

		//3.删除
		return $this->where($where)->delete();

	}


	public function getRmsgsByMsgId($msgid)
	{
		//1.数据完整性校验
		//1.1先判断当前$msgid是否为空
		if(!$msgid || empty($msgid))
		{
			return false;
		}

		//1.2再判断$msgid是否在msgs表中

		//2.构造条件并删除
		$where = array();

		if (is_array($msgid)) {
			$where['msgid'] = array('in',implode(',', $msgid));
			
		}else if(is_string($msgid))
		{
			if(false !== strpos($msgid,','))
			{
				//字符串中包含逗号
				$where['msgid'] = array('in',$msgid);
				
			}else
			{
				$where['msgid'] = $msgid;
			}

		}else if(is_int($msgid))
		{
			$where['msgid'] = $msgid;
		}

		//3.查询
		return $this->where($where)->select();
	}


	public function getRmsgById($id)
	{
		//1.先获取主贴
		$rmsg = $this->getById($id);
		

		return $rmsg;
	}
}