<?php if( !defined('BASEPATH')) exit('No direct script access allowed.');

class Almanager_Model extends CI_Model
{
	/**
		* user id : 1623412
	**/
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	/****	
		* 게시판 리스트
	*****/
	public function notice_board_list($page_num = 0, $howmany = 15, $app=1, $type='notice')
	{
		$sql = "
			SELECT 
				count(*) as cnt
			FROM ad_board
			WHERE valid<2 and app=$app and type='$type' 
		";
		$query = $this->db->query($sql);
		$row = $query->row();
		$total = $row->cnt;

		$sql = "
			select @row := @row + 1 as num, A.*
			from (
				SELECT 
					type, nid, app, title, contents, description, is_notice, is_strong, 
					valid, urgent_sdate, urgent_edate, reg_date, last_date 
				FROM ad_board
				WHERE valid<2 and app=$app and type='$type'
				group by is_notice desc, nid desc) A, 
				(SELECT @row := $page_num) r
			order by num desc
			LIMIT $page_num, $howmany
		";
		$sql = "
			SELECT 
				type, nid, app, title, contents, description, is_notice, is_strong, 
				valid, urgent_sdate, urgent_edate, reg_date, last_date 
			FROM ad_board
			WHERE valid<2 and app=$app and type='$type'
			GROUP BY is_notice desc, nid desc
			LIMIT $page_num, $howmany
		";
		
		$query = $this->db->query($sql);
		$arr = $query->result_array();
		return array('total'=>$total, 'arr'=>$arr);
	}

	public function notice_board_info($app, $nid)
	{
		$sql = "
			SELECT title, valid, description,
				contents, urgent_sdate, urgent_edate
			FROM ad_board 
			WHERE app=$app and nid=$nid
		";

		$query = $this->db->query($sql);
		if ($query->num_rows() == 1){
			return $query->row();
		} else {
			return null;
		}
	}
	
	/**
	 **	일괄적립 처리
	**/
	public function reward_event($users, $ad_type, $ad_id, $ad_name, $amount, $sname)
	{
		$date = new DateTime(date(), new DateTimeZone('Asia/Seoul'));
		$now = $date->format('Y-m-d H:i:s');
		
		$location = 'event';
		$cnt = count($users);	// 적립대상자 수
		$users = implode(",", $users);
		$msg = "[ $ad_name ] 적립금 지급 되었습니다. 마이페이지에서 새로고침 후 적립금 확인해주세요.";
		$msg_cs = "$sname 님이 $cnt 명의 일괄적립 처리.";
		
		$sqls = array(
			"
				INSERT INTO ad_user_remain_log 
				SELECT user_id, '$now', '$location', '+', $ad_id, money_remain + $amount, $amount 
				FROM ad_user 
				WHERE user_id in ($users)
			",
			"
				INSERT INTO admin_cs_log 
				SELECT 
					user_id , $ad_id, '$sname', '$msg_cs', money_accumulated, money_remain, 
					money_accumulated + $amount, 
					money_remain + $amount, 
					$amount, 1, '$now' 
				FROM ad_user 
				WHERE user_id in ($users)
			",
			"
				UPDATE ad_user 
				SET money_accumulated = money_accumulated + $amount, money_remain = money_remain + $amount 
				WHERE user_id in ( $users )
			",
			"
				INSERT INTO ad_inbox (sender_id,valid_sender,receiver_id,valid_receiver,message,p_code,date)
				SELECT 3, 1, A.user_id, 1, '$msg', null, '$now' 
				FROM (SELECT user_id FROM ad_user WHERE user_id in ($users)) A
			"
		);
		
		$this->db->trans_start();
		foreach( $sqls as $sql )
			$this->db->query($sql);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			return array('result'=>false, 'msg'=>'일괄적립 실패되었습니다.', 'sqls'=>$sqls);
		}
		
		return array('result'=>true, 'msg'=>'일괄적립 성공되었습니다.', 'sqls'=>$sqls);
	}
}












