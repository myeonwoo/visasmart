<?php if( !defined('BASEPATH')) exit('No direct script access allowed.');

class Member_Model extends CI_Model
{
	/**
		* user id : 1623412
	**/
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	function test()
	{
		$sql = "select * from ad_user where user_id=1623412";
		$query = $this->db->query($sql);

		$row = $query->row();
		return $row;
	}
	
	/**
	 **	애드라떼 회원 정보 가져오기
	**/
	function info($uid)
	{
		$sql = "select * from ad_user where user_id=$uid";
		$query = $this->db->query($sql);
		$row = $query->row();
		return $row;
	}
	
	/**
	 **	애드라떼 멤버 리스트 리턴
	 **	cs admin에 사용되는 최적화된 array 리턴
	**/
	function almembers_cs_search($user_id=null, $phone_number=null, $email_address=null, $nickname=null)
	{
		if ( $user_id || $phone_number || $email_address || $nickname)
		{
			$arr = array();
			if ($user_id) $arr[] = "A.user_id=$user_id";
			if ($phone_number) array_push( $arr, "A.phone_number like '%$phone_number%'" );
			if ($email_address) array_push( $arr, "A.email_address like '%$email_address%'" );
			if ($nickname) array_push( $arr, "A.nickname like '%$nickname%'" );
			$where = "where " . join(' and ', $arr );
		} else {
			$where = '';
		}
		
		$sql = "
			select 
				A.user_id, A.os, A.phone_number, A.email_address, A.nickname, A.years, A.money_accumulated, A.money_remain, 
				B.name as valid
			from ad_user A
			left join (select * from field_type_item where valid=1 and ft_id=4) B
			on A.valid=B.value_i
			$where
		";
		
		$query = $this->db->query($sql);
		$result = $query->result_array(); // return array
		
		return $result;
	}
	
	/**
	 **	
	 **/
	public function get_adlatte_users( $fields = '*', $user_id=null, $phone_number=null, $email_address=null, $nickname=null)
	{
		if ( $user_id || $phone_number || $email_address || $nickname)
		{
			$arr = array();
			if ($user_id) $arr[] = "user_id=$user_id";
			if ($phone_number) array_push( $arr, "phone_number like '%$phone_number%'" );
			if ($email_address) array_push( $arr, "email_address like '%$email_address%'" );
			if ($nickname) array_push( $arr, "email_address like '%$email_address%'" );
			$where = "where " . join(' and ', $arr );
		} else {
			$where = '';
		}
		
		$sql = "select $fields from ad_user $where limit 20";

		$query = $this->db->query($sql);
		$cnt = $query->num_rows();
		
		$result = $query->result_array(); // return array
		
		return $result;
	}

	/**
	 **	
	 **/
	public function getallmembers( $field = array(), $where = array())
	{

		$field = (count($field) == 0) ? '*' : join(',', $field);

		$keys = array_keys($where);
		$where_items = array();
		if (in_array("user_id", $keys)){
			array_push($where_items, " user_id = " . $where['user_id']);
		}
		if (in_array("phone_number", $keys)){
			array_push($where_items, " phone_number = '" . $where['phone_number']  . "'");
		}

		if (in_array("email_address", $keys)){
			array_push($where_items, " email_address = '" . $where['email_address']  . "'");
		}
		if (in_array("nickname", $keys)){
			array_push($where_items, " nickname = '" . $where['nickname']  . "'");
		}

		if ( count($where_items) > 0 )
			$where = 'where ' . join(' and ', $where_items);
		else
			$where = '';

		$sql = "select $field from ad_user $where";
		

		$query = $this->db->query($sql);
		$result = $query->result_array(); // return array
		//$result = $query->result(); // return array

		return $result;

	}

	/**
		* 복수의 유저 검색
		* Parameters:
		*   $wheres['uids'] : array of user_id
		*   $wheres['nicknames'] : array of nickname
		*   $wheres['phones'] : array of phones
		*   $wheres['emails'] : array of emails
	**/
	public function findMembers($wheres = array())
	{
		if (isset($wheres['uids'])) {
			$uids = implode(',', $wheres['uids']);
			$sql = "
				SELECT user_id, phone_number, email_address, nickname, valid
				FROM ad_user 
				WHERE user_id in ($uids)
			";
			$sql = "
				SELECT user_id, phone_number, email_address, nickname, B.name
				FROM ad_user A
				LEFT JOIN (select * from field_type_item where ft_id=4) B
				ON A.valid=B.value_i
				WHERE A.user_id in ($uids)
			";
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return $result;
		} else if (isset($wheres['nicknames'])) {
			$nicknames = "'" . implode("','", $wheres['nicknames']) . "'";
			$sql = "
				SELECT user_id, phone_number, email_address, nickname, valid
				FROM ad_user 
				WHERE nickname in ($nicknames)
			";
			$sql = "
				SELECT user_id, phone_number, email_address, nickname, B.name
				FROM ad_user A
				LEFT JOIN (select * from field_type_item where ft_id=4) B
				ON A.valid=B.value_i 
				WHERE A.nickname in ($nicknames)
			";
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return $result;
		} else if (isset($wheres['phones'])) {
			$phones = "'" . implode("','", $wheres['phones']) . "'";
			$sql = "
				SELECT user_id, phone_number, email_address, nickname, B.name
				FROM ad_user A
				LEFT JOIN (select * from field_type_item where ft_id=4) B
				ON A.valid=B.value_i  
				WHERE A.phone_number in ($phones)
			";
			$sql1 = "
				SELECT user_id, phone_number, email_address, nickname, B.name
				FROM ad_user A
				LEFT JOIN (select * from field_type_item where ft_id=4) B
				ON A.valid=B.value_i  
				WHERE A.phone_number in ('0255855830')
			";
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return $result;
		} else if (isset($wheres['emails'])) {
			$emails = "'" . implode("','", $wheres['emails']) . "'";
			$sql = "
				SELECT user_id, phone_number, email_address, nickname, valid
				FROM ad_user 
				WHERE email_address in ($emails)
			";
			$sql = "
				SELECT user_id, phone_number, email_address, nickname, B.name
				FROM ad_user A
				LEFT JOIN (select * from field_type_item where ft_id=4) B
				ON A.valid=B.value_i 
				WHERE A.email_address in ($emails)
			";
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return $result;
		}
		return array();
	}
	
	/**
		* Desc: 복수의 유저 id중 존재하지 않는 리스트 반환
		* Paras:
		*   $wheres['uids'] : array of user_id
		*   $wheres['nicknames'] : array of nickname
		*   $wheres['phones'] : array of phone
		*   $wheres['emails'] : array of emails
	**/
	public function findNotExist($wheres = array())
	{
		if (isset($wheres['uids'])) 
		{
			foreach ( $wheres['uids'] as $key => $value ){
				$wheres['uids'][$key] = " UNION SELECT " . $wheres['uids'][$key] . " ";
			}
			
			$uids = implode(' ', $wheres['uids']);
			$sql = "
				select A.id as value
				from ( SELECT NULL AS id $uids ) A
				left join ad_user B
				on A.id = B.user_id
				where A.id is not null and B.user_id is null
			";
			
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return $result;
		} else if (isset($wheres['nicknames'])) {
			foreach ( $wheres['nicknames'] as $key => $value ){
				$wheres['nicknames'][$key] = " UNION SELECT '" . $wheres['nicknames'][$key] . "' ";
			}
			
			$nicknames = implode(' ', $wheres['nicknames']);
			$sql = "
				select A.nickname as value
				from ( SELECT NULL AS nickname $nicknames ) A
				left join ad_user B
				on A.nickname = B.nickname
				where A.nickname is not null and B.nickname is null
			";
			
			
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return $result;
		} else if (isset($wheres['phones'])) 
		{
			foreach ( $wheres['phones'] as $key => $value ){
				$wheres['phones'][$key] = " UNION SELECT '" . $wheres['phones'][$key] . "' ";
			}
			
			$phones = implode(' ', $wheres['phones']);
			$sql = "
				select A.phone as value , A.phone, B.phone_number
				from ( SELECT NULL AS phone $phones ) A 
				left join ad_user B 
				on A.phone = B.phone_number 
				where A.phone is not null and B.phone_number is null
			";
			
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return $result;
		} else if (isset($wheres['emails'])) {
			foreach ( $wheres['emails'] as $key => $value ){
				$wheres['emails'][$key] = " UNION SELECT '" . $wheres['emails'][$key] . "' ";
			}
			
			$emails = implode(' ', $wheres['emails']);
			$sql = "
				select A.email as value
				from ( SELECT NULL AS email $emails ) A
				left join ad_user B
				on A.email = B.email_address
				where A.email is not null and B.email_address is null
			";
			
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return $result;
		}
		
		return array();
	}
	
	/**
	 **	
	 **/
	public function member_ad_list($uid)
	{
		$ad_list = $this->ad_list($uid);
		
		$result = array();
		foreach ( $ad_list as $row){
			$ad_id = $row['ad_id'];
			$app_id = $row['app_id'];
			$ad_type = $row['ad_type'];
			
			$result[] = array ( 
				'ad_id' => $row['ad_id'],
				'app_id' => $row['app_id'],
				'ad_type' => $row['ad_type'],
				//'type_title' => mb_convert_encoding ($row['type_title'], 'euc-kr', 'UTF-8'),
				'type_title' => $row['type_title'],
				'event_title' => $row['event_title'],
				'title' => $row['title'],
				'is_target_abbr' => $row['is_target_abbr'],  // 타겟여부
				'update_date' => $row['update_date'] ? $row['update_date'] : '<div class="empty"></div>', // 광고시청시간
				'aurl_rdate' => $row['aurl_rdate'] ? $row['aurl_rdate'] : '<div class="empty"></div>', // 적립시간
				'r_money' => $row['r_money'] ? $row['r_money'] : '<div class="empty"></div>', // 적립금
				'aurl_amount' => $row['aurl_amount'] ? $row['aurl_amount'] : '<div class="empty"></div>', // 예상적립금
				'cpi_userinfo' => $row['cpi_userinfo'] ? $row['cpi_userinfo'] : '<div class="empty"></div>', // cpi userinfo
				'cpa_userinfo' => $row['cpa_userinfo'] ? $row['cpa_userinfo'] : '<div class="empty"></div>', // cpa userinfo
				'cpr_userinfo' => $row['cpr_userinfo'] ? $row['cpr_userinfo'] : '<div class="empty"></div>', // cpr userinfo
				'cpl_userinfo' => $row['cpl_userinfo'] ? $row['cpl_userinfo'] : '<div class="empty"></div>', // cpl userinfo
				'cpe_userinfo' => $row['cpe_userinfo'] ? $row['cpe_userinfo'] : '<div class="empty"></div>', // cpe userinfo
				"
				<button id='adlatte-user-ad-reward' name='adlatte-user-ad-reward' class='btn btn-danger' uid='$uid' ad_id='$ad_id' >적립</button>
				"
			);
		}
		
		return $result;
	}

	/**
	 **	
	 **/
	public function ad_list($uid)
	{
		/** Header names:
		valid,user_id,ad_id,is_target,update_date,app_id,ad_type,event_type,title,r_money,appRes,aurl_rdate,aurl_location,aurl_type,aurl_ref_info,aurl_tamount,aurl_amount,abbr,type_name,type_title
		**/
		$sql = "
			select 
				A.*, 
				B.aurl_rdate, B.aurl_location, B.aurl_type, B.aurl_ref_info, B.aurl_tamount, B.aurl_amount,
				C.abbr, C.name as type_name, C.title as type_title
			from (
				select 
					A.valid, A.user_id, A.ad_id, A.is_target, A.update_date, 
					B.app_id, B.ad_type, B.event_type, B.title, B.money_2 as r_money,
					0 as appRes
				from (select * from ad_ad_user_matching where user_id = $uid order by ID desc) A
				left join ad_ad B
				on A.ad_id=B.ad_id) A
			left join (select aurl_ref_info as ad_id, A.* from ad_user_remain_log A where aurl_user_id = $uid) B
			on A.ad_id = B.ad_id
			left join (select * from field_type_item where valid=1 and ft_id=1) C
			on A.ad_type=C.value_i
		";
		$sql = "
			select 
				A.ad_id, 
				DATE_FORMAT(A.update_date,'%Y-%m-%d %H:%i') as update_date,
				B.app_id, B.ad_type, 
				B.title, B.money_2 as r_money, 
				C.aurl_rdate, 
				C.aurl_amount,
				D.title as type_title,
				E.title as event_title,
				F.abbr as is_target_abbr,
				
				K.is_install as is_install_cpi, -- 0:설치안함, 1:이미설치함
				N.is_like as is_like_cpl, -- 0:정상 / 1:중복(사전에 좋아요함)
				O.is_down_app as is_down_app_cpe, -- 어플설치시도(0:미시도/1:시도)
				O.is_run_app as is_run_app_cpe, -- 어플실행여부(0:미실행,1:실행)
				P.is_install as is_install_cpq, -- 0:설치안함, 1:이미설치함
				
				K.saving_date as cpi_userinfo,
				L.saving_date as cpa_userinfo,
				M.saving_date as cpr_userinfo,
				N.saving_date as cpl_userinfo,
				O.sdate as cpe_userinfo
			from (select * from ad_ad_user_matching where user_id = $uid order by ID desc) A
			left join ad_ad B
			on A.ad_id=B.ad_id
			left join (select aurl_ref_info as ad_id, AD.* from ad_user_remain_log AD where aurl_user_id = $uid) C
			on A.ad_id = C.ad_id
			left join (select * from field_type_item where valid=1 and ft_id=1) D
			on B.ad_type=D.value_i
			left join (select * from field_type_item where valid=1 and ft_id=5) E
			on B.event_type=E.value_i

			left join (select * from field_type_item where valid=1 and ft_id=6) F
			on A.is_target=F.value_i

			left join (select * from ad_appinstall_userinfo where user_id=$uid ) K
			on B.app_id=K.app_id
			left join (select * from ad_appjoin_userinfo where user_id=$uid ) L
			on B.app_id=L.app_id
			left join (select * from ad_appsurvey_userinfo where user_id=$uid) M
			on B.app_id=M.app_id
			left join (select * from ad_applike_userinfo where user_id=$uid) N
			on B.app_id=N.app_id
			left join (select * from ad_appexec_userinfo where user_id=$uid) O
			on B.ad_id=O.ad_id
			left join (select * from ad_app_normal_userinfo where user_id=$uid) P
			on B.ad_id=P.ad_id
		";
		
		$query = $this->db->query($sql);
		
		$result = $query->result_array(); // return array
		
		return $result;
	}

	/**
	 **	
	 **/
	public function get_ad_user_valids()
	{
		$sql = "select value_i, name from field_type_item where ft_id=4 and valid=1";
		$query = $this->db->query($sql);
		$arr = $query->result_array();
		return $arr;
	}
	/**
	 **	
	 **/
	public function reward_history($user_id)
	{
		$sql = "
			SELECT aurl_rdate, aurl_location, aurl_type, 
				-- aurl_ref_info,
				case aurl_location
					when 'CS_reward' then (select CONCAT(ad_id, ' - ', title) from ad_ad_base where ad_id=aurl_ref_info limit 1)
					when 'CS_change' then (select CONCAT(ad_id, ' - ', title) from ad_ad_base where ad_id=aurl_ref_info limit 1)
					when 'CS' then (select CONCAT(ad_id, ' - ', title) from ad_ad_base where ad_id=aurl_ref_info limit 1)
					when 'appdown_confirm' then (select CONCAT(ad_id, ' - ', title) from ad_ad_base where ad_id=aurl_ref_info limit 1)
					when 'appdown_saving' then (select CONCAT(ad_id, ' - ', title) from ad_ad_base where ad_id=aurl_ref_info limit 1)
					when 'normal_ad' then (select CONCAT(ad_id, ' - ', title) from ad_ad_base where ad_id=aurl_ref_info limit 1)
					when 'appexec_saving' then (select CONCAT(ad_id, ' - ', title) from ad_ad_base where ad_id=aurl_ref_info limit 1)
					when 'mobage_appdown_saving' then (select CONCAT(ad_id, ' - ', title) from ad_ad_base where ad_id=aurl_ref_info limit 1)
					when 'kt_appdown_saving' then (select CONCAT(ad_id, ' - ', title) from ad_ad_base where ad_id=aurl_ref_info limit 1)

					when 'like_action' then (select CONCAT(ad_id, ' - ', title) from ad_ad_base where ad_id=aurl_ref_info limit 1)
					when 'userjoin_saving' then (select CONCAT(ad_id, ' - ', title) from ad_ad_base where ad_id=aurl_ref_info limit 1)
					
					when 'event' then (select CONCAT(ad_id, ' - ', title) from ad_ad_base where ad_id=aurl_ref_info limit 1)
					when 'entertainment' then '빙고! 스크래치'
					else aurl_ref_info
				end,
				aurl_tamount, aurl_amount
			FROM ad_user_remain_log 
			WHERE aurl_user_id=$user_id
			ORDER BY aurl_rdate DESC
		";
		$query = $this->db->query($sql);
		$arr = $query->result_array();
		return $arr;
	}
	
	/****	
		* 적립 처리 : 광고 X 애드라떼 회원 에 대한 적립.
	*****/
	public function reward($sname, $user_id, $ad_id)
	{

		$sql = "
			select * 
			from ad_user_remain_log 
			where aurl_user_id='$user_id' and aurl_ref_info='$ad_id'
		";
		$query = $this->db->query($sql);
		$cnt = $query->num_rows();
		if ( $cnt > 0 ){
			return array('result'=>false, 'msg' => '이미 적립받았습니다.');
		}
		
		$sql = "
			SELECT A.ad_id, A.app_id, A.ad_type, A.event_type, A.money_2, A.title, A.ad_type, B.abbr
			FROM ad_ad A
			left join (select * from field_type_item where ft_id=1) B
			on A.ad_type = B.value_i
			where ad_id = $ad_id
		";
		$query = $this->db->query($sql);
		$cnt = $query->num_rows();
		if ( $cnt != 1 ){
			return array('result'=>false, 'msg' => 'Invalid ad_id');
		}
		$row = $query->row();
		$money_2 = $row->money_2;
		$ad_type = $row->ad_type;
		
		
		$sql = "
			SELECT money_remain, money_accumulated 
			FROM ad_user where user_id = $user_id
		";
		$query = $this->db->query($sql);
		$cnt = $query->num_rows();
		if ( $cnt != 1 ){
			return array('result'=>false, 'msg' => 'Invalid user_id');
		}
		$row = $query->row();
		
		$cmt = '어드민에서 적립했습니다.';
		$money_accumulated = $row->money_accumulated;
		$money_remain = $row->money_remain;
		
		$sql = array();
		$sql['1'] = "
			UPDATE ad_user 
			SET 
				money_remain = money_remain+$money_2, 
				money_accumulated = money_accumulated + $money_2 
			WHERE user_id=$user_id
		";
		$sql['2'] = "
			INSERT INTO ad_user_remain_log
			SET
				aurl_user_id=$user_id,
				aurl_rdate=NOW(),
				aurl_location='CS_reward',
				aurl_ref_info='$ad_id',
				aurl_type='+',
				aurl_tamount=(SELECT money_remain FROM ad_user WHERE user_id='$user_id'),
				aurl_amount='$money_2'
		";
		$sql['3'] = "
			INSERT INTO admin_cs_log
			SET
				acl_user_id=$user_id,
				acl_commnet='$cmt',
				acl_ad_id='$ad_id',
				acl_cs_id='$sname',
				acl_ori_money_accumulated=$money_accumulated,
				acl_ori_money_remain=$money_remain,
				acl_money_accumulated=$money_accumulated+$money_2,
				acl_money_remain= $money_remain+$money_2,
				acl_amount=$money_2,
				acl_status='1',
				acl_rdate = NOW()
		";
		
		$this->db->trans_start();
		foreach( $sql as $s )
			$this->db->query($s);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			return array('result'=>false, 'msg' => '적립처리 실패되었습니다.', 'sql'=>$sql);
		} 
		
		return array('result'=>true, 'msg' => '적립 처리되었습니다.', 'sql'=>$sql);
		
		$result = $query->result_array();
	}
	
	/****	적립금 변경;
	 ** 적립 처리 : CS admin 에서 요청을 위한 적립.
	 **	Keyword: change
	*****/
	public function reward_by_cs( $user_id, $ad_id, $comment, $money_ch, $point_result, $point_state, $staff_name = '' )
	{
		$sqls = array();
		
		$ret = array( $ad_id, $comment, $money_ch, $point_result, $point_state );
		
		if ( $money_ch == '' )
		{
			return array('result'=>false, 'msg' => '금액이 없습니다.');
		}
		
		$sql = "SELECT money_accumulated, money_remain FROM ad_user WHERE user_id=$user_id";
		$query = $this->db->query($sql);
		if ( $query->num_rows() != 1 ){
			return array('result'=>false, 'msg' => 'Invalid User ID');
		}
		$previous = $query->row();
		$money_remain_cur = $previous->money_remain;
		$money_accumulated_cur = $previous->money_accumulated;
		
		// 적립금이 + 이면
		if ( $point_result == '+' ) 
		{
			if ( $point_state == 1 )
				$money_accumulated = $money_accumulated_cur + $money_ch;
			else 
				$money_accumulated = $money_accumulated_cur;
			
			$money_remain = $money_remain_cur + $money_ch;
		} 
		// 적립금이 - 이면
		else {
			if ( $point_state == 1 )
				$money_accumulated = $money_accumulated_cur - $money_ch;
			else 
				$money_accumulated = $money_accumulated_cur;

			$money_remain = $money_remain_cur - $money_ch;
		}
		
		if( $point_result=='+' )
			$btnStr	= "1";
		else
			$btnStr = "0";
		
		
		$sqls['1'] = "
			UPDATE ad_user 
			SET money_remain = $money_remain, money_accumulated = $money_accumulated 
			WHERE user_id=$user_id
		";
		$sqls['2'] = "
			INSERT INTO ad_user_remain_log
			SET
				aurl_user_id=$user_id,
				aurl_rdate=NOW(),
				aurl_location='CS_change',
				aurl_ref_info='$ad_id',
				aurl_type='$point_result',
				aurl_tamount=(SELECT money_remain FROM ad_user WHERE user_id='$user_id'),
				aurl_amount='$money_ch'
		";
		
		$sqls['3'] = "
			INSERT INTO admin_cs_log
			SET
				acl_user_id=$user_id,
				acl_commnet='$comment',
				acl_ori_money_accumulated=$money_accumulated_cur,
				acl_ori_money_remain=$money_remain_cur,
				acl_money_accumulated=$money_accumulated,
				acl_money_remain= $money_remain,
				acl_amount=$money_ch,
				acl_status=$btnStr,
				acl_cs_id='$staff_name',
				acl_rdate = NOW()
		";
		
		$this->db->trans_start();
		foreach( $sqls as $sql )
			$this->db->query($sql);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			return false;
		} 
		
		$sqls['previous'] = $previous;
		return $sqls;
		
		
		$ret = array( $ad_id, $comment, $money_ch, $point_result, $point_state );
		
	}
	
	/****
		* 중복된 기간: 2013.3.26 - 2013.4.2
	****/
	public function reward_old_history($user_id)
	{
		$otherdb = $this->load->database('old_master', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

		//$query = $otherdb->select('first_name, last_name')->get('person');

		$sql = "
			SELECT aurl_rdate, aurl_location, aurl_type, aurl_ref_info, aurl_tamount, aurl_amount
			FROM ad_user_remain_log_all 
			WHERE aurl_user_id=$user_id and aurl_rdate<'2013-03-26' and aurl_location != 'lattescreen'
			ORDER BY aurl_rdate DESC
		";
		$sql1 = "
			SELECT 
				aurl_rdate, aurl_location, aurl_type, 
				-- aurl_ref_info,
				case aurl_location
					when 'appdown_confirm' then (select CONCAT(ad_id, ' - ', title) from ad_ad_base where ad_id=aurl_ref_info limit 1)
					when 'appdown_saving' then (select CONCAT(ad_id, ' - ', title) from ad_ad_base where ad_id=aurl_ref_info limit 1)
					when 'normal_ad' then (select CONCAT(ad_id, ' - ', title) from ad_ad_base where ad_id=aurl_ref_info limit 1)
					when 'appexec_saving' then (select CONCAT(ad_id, ' - ', title) from ad_ad_base where ad_id=aurl_ref_info limit 1)
					when 'mobage_appdown_saving' then (select CONCAT(ad_id, ' - ', title) from ad_ad_base where ad_id=aurl_ref_info limit 1)
					when 'kt_appdown_saving' then (select CONCAT(ad_id, ' - ', title) from ad_ad_base where ad_id=aurl_ref_info limit 1)

					when 'like_action' then (select CONCAT(ad_id, ' - ', title) from ad_ad_base where ad_id=aurl_ref_info limit 1)
					when 'userjoin_saving' then (select CONCAT(ad_id, ' - ', title) from ad_ad_base where ad_id=aurl_ref_info limit 1)
					
					when 'event' then (select CONCAT(ad_id, ' - ', title) from ad_ad_base where ad_id=aurl_ref_info limit 1)
					when 'entertainment' then '빙고! 스크래치'
					else aurl_ref_info
				end,
				aurl_tamount, aurl_amount
			FROM ad_user_remain_log_all 
			WHERE aurl_user_id=1661096 and aurl_rdate<'2013-03-26' and aurl_location != 'lattescreen'
			ORDER BY aurl_rdate DESC;
		";
		$query = $otherdb->query($sql);
		$arr = $query->result_array();
		return $arr;
	}
	/**
	 **	
	 **/
	public function purchase_history($user_id)
	{
		$sql = "select nickname from ad_user where user_id=$user_id";
		$query = $this->db->query($sql);
		$row = $query->row();
		$nickname = $row->nickname;
		$member = "$user_id - $nickname";
		$sql = "
			SELECT
				'$member',
				'기프티쇼' as pcompany,
				a.pay_id as tr_id,
				a.goodsCode as goods_id,
				b.name as title,
				a.amount as price,
				a.buy_date,
				a.receiverCtn,
				case
					when a.app = 1 then '애드라떼'
					when a.app = 2 then '라떼스크린'
					else '그외'
				end as buy_from
			FROM (select * from ad_giftishow_log where user_id=$user_id) a 
			inner join ad_store as b 
			on a.goodsCode=b.goods_id
			WHERE a.error_code='0000'

			UNION
			SELECT
				'회원',
				'M12' as pcompany,
				a.tr_id as tr_id,
				a.goodsCode as goods_id,
				b.name as title,
				a.amount as price,
				a.buy_date,
				a.receiverCtn,
				case
					when a.app = 1 then '애드라떼'
					when a.app = 2 then '라떼스크린'
					else '그외'
				end as buy_from
			FROM (select * from ad_m12_log where user_id=$user_id) a 
			inner join ad_store as b 
			on a.goodsCode=b.goods_id
			WHERE a.error_code='0000'

			UNION
			SELECT
				'회원',
				'CJ쿠투' as pcompany,
				a.request_key as tr_id,
				a.goods_id as goods_id,
				a.goods_name as title,
				a.amount as price,
				a.buy_date,
				a.user_id as receiverCtn,
				case
					when a.app = 1 then '애드라떼'
					when a.app = 2 then '라떼스크린'
					else '그외'
				end as buy_from
			FROM ad_CJ_log as a
			WHERE a.result_code='0000' and a.user_id=$user_id

			UNION
			SELECT
				'회원',
				'DANAL' as pcompany,
				a.user_id as tr_id,
				a.goodsCode as goods_id,
				b.name as title,
				a.amount as price,
				a.buy_date,
				a.receiverCtn,
				case
					when a.app = 1 then '애드라떼'
					when a.app = 2 then '라떼스크린'
					else '그외'
				end as buy_from
			FROM (select * from ad_danal_log where user_id=$user_id) a 
			inner join ad_store as b 
			on a.goodsCode=b.goods_id
			WHERE a.error_code='0000'
			ORDER BY buy_date DESC
		";
		
		$query = $this->db->query($sql);
		$result = $query->result_array(); // return array
		
		return $result;
		
	}
	/**
	 **	
	 **/
	public function refund_history($user_id)
	{
		$sql = "
			select
				CONCAT('$user_id', ' - ', nickname, ' - ', email_address), 
				phone_number, name, account, bank, amount, completed, valid, date, complete_date
			from ad_refund 
			where user_id=$user_id 
			ORDER BY date DESC;
		";
		$query = $this->db->query($sql);
		$arr = $query->result_array();
		return $arr;
	}
	
	/** TODO: Not implemented 
	  *	애드라떼 회원 삭제하기
	**/
	public function update_almember($sname, $user_id, $fields, $comment)
	{
		$this->db->where( 'user_id', $user_id );
		$ret = $this->db->update('ad_user', $fields);
		
		$sql = "
			INSERT INTO admin_cs_log
			SET
				acl_user_id=$user_id,
				acl_commnet='$comment',
				acl_cs_id='$sname',
				acl_status='1',
				acl_rdate = NOW()
		";
		$this->db->query($sql);
		
		return array('msg'=>'업데이트되었습니다.', 'result'=>$ret);
	}
	
	/** TODO: Not implemented 
	  *	애드라떼 회원 삭제하기
	**/
	public function delete_almember($uid, $sname)
	{
		$sqls = array();
		$sqls['1'] = "
			UPDATE ad_user 
			SET 
				valid = 10, 
				nickname=CONCAT(nickname,'_*deleted','_',UNIX_TIMESTAMP()), 
				email_address = '', 
				phone_number = '', 
				device_id = '', 
				c2dm_appid = '', 
				device_key = '', 
				password = '', 
				self_introduction = '' 
			WHERE user_id = $uid
		";
		$sqls['2'] = "
			INSERT INTO admin_cs_log
			SET
				acl_user_id=$uid,
				acl_commnet='회원 정보를 삭제했습니다.',
				acl_cs_id='$sname',
				acl_status='1',
				acl_rdate = NOW()
		";

		$result = true;

		$this->db->trans_start();
		foreach( $sqls as $sql )
			$this->db->query($sql);
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)
		{
			$result = false;
		}
		
		return array('result'=>$result, 'sqls'=>$sqls);
		
		//$query = $this->db->query($sql);
		//$result = $query->result_array(); // return array
		
	}
	
	/****
		*	CS에서 처리된 작업 히스토리
	****/
	public function cs_history($uid)
	{
		$sql = "
			SELECT 
				acl_ad_id, 
				acl_cs_id, 
				(SELECT title FROM ad_ad WHERE ad_id = acl.acl_ad_id) AS title, 
				acl_commnet, 
				acl_ori_money_accumulated , 
				acl_ori_money_remain , 
				acl_money_accumulated, 
				acl_money_remain, 
				acl_amount, 
				acl_rdate
			FROM admin_cs_log AS acl
			WHERE acl.acl_user_id = $uid
			ORDER BY acl_rdate DESC
		";
		$query = $this->db->query($sql);
		$arr = $query->result_array();
		return $arr;
	}
	
	/****
		*	라떼 스토어에서 구매내역중 giftishow 히스토리
	****/
	public function store_giftishow($uid, $nickname)
	{
		$sql = "
			select 
				user_id, '$nickname' as nickname, ID as id, pay_id, buy_date as date,
				amount, goodsCode, error_code, B.name as title
			from ad_giftishow_log A
			left join ( 
				select goods_id, name 
				from ad_store
				group by goods_id ) as B
			on A.goodsCode = B.goods_id
			where A.user_id=$uid
		";
		$query = $this->db->query($sql);
		$arr = $query->result_array();
		return $arr;
	}
	
	/****
		*	라떼 스토어에서 구매내역중 cj쿠투 히스토리
	****/
	public function store_cj($uid)
	{
		$sql = "
			select 
				ID as id, request_key as pay_id, buy_date as date, amount as amount,
				A.goods_id as goodsCode, result_code as error_code, B.name as title
			from  ad_CJ_log A
			left join ( select goods_id, name from ad_store group by goods_id ) B
			on A.goods_id = B.goods_id
			where A.user_id=$uid
		";
		$query = $this->db->query($sql);
		$arr = $query->result_array();
		return $arr;
	}
	
	/****
		*	라떼 스토어에서 구매내역중 danal 히스토리
	****/
	public function store_danal($uid)
	{
		$sql = "
			select 
				ID as id, pay_id, buy_date as date, amount, 
				A.goodsCode as goodsCode, error_code as error_code, B.name as title
			from ad_danal_log A
			left join ( select goods_id, name from ad_store group by goods_id ) B 
			on A.goodsCode = B.goods_id
			where A.user_id=$uid
		";
		$query = $this->db->query($sql);
		$arr = $query->result_array();
		return $arr;
	}
	
	/****
		*	라떼 스토어에서 구매내역중 m12 히스토리
	****/
	public function store_m12($uid)
	{
		$sql = "
			select
				ID as id, tr_id as pay_id, buy_date as date, amount as amount,
				goodsCode as goodsCode, error_code as error_code, B.name as title
			from ad_m12_log A
			left join ( select goods_id, name from ad_store group by goods_id ) B
			on ( A.goodsCode = B.goods_id )
			where A.user_id=$uid
		";
		$query = $this->db->query($sql);
		$arr = $query->result_array();
		return $arr;
	}

	/****	
		* $uid: user_id, $page: which page, $howmany: number per page, 
	*****/
	public function inquiry_list($uid, $start = 0, $howmany = 10)
	{
		$sql = "
			SELECT 
				count(*) as cnt
			FROM ad_user_inquiry
		";
		$query = $this->db->query($sql);
		$row = $query->row();
		$cnt = $row->cnt;
		
		$sql = "
			SELECT 
				aui_id, aui_user_id as user_id, 
				case aui_os_type
					when 1 then 'IOS'
					when 2 then 'Android'
					else 'undefined'
				end as os,
				aui_category_new as category, 
				aui_message as message,
				aui_answer as answer, aui_status as status, aui_rdate as rdate, aui_duty as duty, nickname
			FROM ad_user_inquiry A
			LEFT JOIN ad_user B 
			ON A.aui_user_id = B.user_id 
			ORDER by aui_rdate desc
			LIMIT $start, $howmany
		";
		$query = $this->db->query($sql);
		$arr = $query->result_array();
		$ret = array('cnt'=> $cnt, 'contents' => $arr );
		return $ret;
	}
	/**
	 **	
	 **/
	public function inquiry_list_dev(
		$uid, $start = 0, $howmany = 10,
		$category = null, $os = null, $status = null, $app=null, $staff_name = null,
		$nickname = null, $inquiry_seg = null, 
		$rdate_start = null, $rdate_end = null, 
		$adate_start = null, $ardate_end = null
	)
	{
	
		$arr = array();

		if ($category) array_push($arr, "aui_category_new=$category"); 
		if ($os) array_push($arr, "aui_os_type=$os"); 

		if ($status != null && $status == 1) array_push($arr, "aui_status='$status'"); 
		else if ($status != null) array_push($arr, "(aui_status='0' or aui_status = '')");
		
		if ($app) array_push($arr, "aui_app=$app"); 
		if ($staff_name) array_push($arr, "aui_duty='$staff_name'"); 
		//if ($nickname) array_push($arr, "nickname='$nickname'"); 
		if ($rdate_start) array_push($arr, "aui_rdate > '$rdate_start'");
		if ($rdate_end) array_push($arr, "aui_rdate <= '$rdate_end 23:59:59'");
		if ($adate_start) array_push($arr, "aui_adate > '$adate_start'");
		if ($ardate_end) array_push($arr, "aui_adate <= '$ardate_end 23:59:59'");
		if ($inquiry_seg) {
			$inquiry_seg = urldecode($inquiry_seg);
			array_push($arr, "aui_message like '%$inquiry_seg%'");
		};
		
		if ($uid) {
			return $this->inquiry_list_user($uid, $start, $howmany, $category, $os , $status , $app, $staff_name , null , $inquiry_seg , $rdate_start , $rdate_end , $adate_start , $ardate_end);
		}
		else if ($nickname) {
			$nickname = urldecode($nickname);
			$sql = "SELECT nickname, user_id FROM ad_user WHERE nickname='$nickname'";
			$query = $this->db->query($sql);
			$cnt = $query->num_rows();
			if($cnt == 1) {
				$row = $query->row();
				$uid = $row->user_id;
				return $this->inquiry_list_user($uid, $start, $howmany, $category, $os , $status , $app, $staff_name , null , $inquiry_seg , $rdate_start , $rdate_end , $adate_start , $ardate_end);
			}
		}
		
		$where = "";
		if ( count($arr) > 0 )
			$where = "WHERE " . implode(' and ', $arr);
		$sql = "
			SELECT 
				count(*) as cnt
			FROM ad_user_inquiry A
			$where
		";

		$query = $this->db->query($sql);
		$row = $query->row();
		$cnt = $row->cnt;
		$sql = "
			SELECT 
				aui_id, aui_user_id as user_id, 
				case aui_os_type
					when 1 then 'IOS'
					when 2 then 'Android'
					else 'undefined'
				end as os,
				aui_category_new as category, 
				aui_message as message,
				aui_answer as answer, aui_status as status, aui_rdate as rdate, aui_duty as duty, nickname
			FROM ad_user_inquiry A
			LEFT JOIN ad_user B 
			ON A.aui_user_id = B.user_id 
			$where
			ORDER by aui_rdate desc
			LIMIT $start, $howmany
		";
		
		$query = $this->db->query($sql);
		$arr = $query->result_array();
		$ret = array('cnt'=> $cnt, 'contents' => $arr );
		return $ret;
	}
	
	public function inquiry_list_user(
		$uid, $start = 0, $howmany = 10,
		$category = null, $os = null, $status = null, $app=null, $staff_name = null,
		$nickname = null, $inquiry_seg = null, 
		$rdate_start = null, $rdate_end = null, 
		$adate_start = null, $ardate_end = null
	)
	{
		$inquiry_seg = urldecode($inquiry_seg);
		
		$where = "WHERE aui_user_id = $uid";
		if ($category) $where .= " and aui_category_new=$category";
		if ($os) $where .= " and aui_os_type=$os";
		
		if ($status != null && $status == 1) $where .= " and aui_status='$status'";
		else if ($status != null) $where .= " and (aui_status='0' or aui_status = '')";
		
		if ($app) $where .= " and aui_app=$app";
		if ($staff_name) $where .= " and aui_duty='$staff_name'";
		if ($rdate_start) $where .= " and aui_rdate > '$rdate_start'";
		if ($rdate_end) $where .= " and aui_rdate <= '$rdate_end 23:59:59'";
		if ($adate_start) $where .= " and aui_adate > '$adate_start'";
		if ($ardate_end) $where .= " and aui_adate <= '$ardate_end 23:59:59'";
		if ($inquiry_seg) $where .= " and aui_message like '%$inquiry_seg%'";
		
		$sql = "
			SELECT 
				count(*) as cnt
			FROM ad_user_inquiry
			$where
		";

		$query = $this->db->query($sql);
		$row = $query->row();
		$cnt = $row->cnt;
		$sql = "
			SELECT 
				aui_id, aui_user_id as user_id, 
				case aui_os_type
					when 1 then 'IOS'
					when 2 then 'Android'
					else 'undefined'
				end as os,
				aui_category_new as category, 
				aui_message as message,
				aui_answer as answer, aui_status as status, aui_rdate as rdate, aui_duty as duty, nickname
			FROM ad_user_inquiry A
			LEFT JOIN ad_user B 
			ON A.aui_user_id = B.user_id 
			$where
			ORDER by aui_rdate desc
			LIMIT $start, $howmany
		";
		
		$query = $this->db->query($sql);
		$arr = $query->result_array();
		$ret = array('cnt'=> $cnt, 'contents' => $arr );
		return $ret;
	}
	
	/****	
		* $uid: user_id, $page: which page, $howmany: number per page, 
	*****/
	public function phone_pay_list($uid, $page_num = 0, $howmany = 20)
	{
		$where = '';
		if ($uid) $where = "where adtf_user_id = $uid" ;
		
		$sql = "
			SELECT count(*) as cnt
			FROM ad_discount_tel_fee
			$where
		";
		$query = $this->db->query($sql);
		$row = $query->row();
		$cnt = $row->cnt;
		
		$sql = "
			SELECT
				adtf_id, adtf_user_id as user_id, adtf_carrier as carrier,
				adtf_phone as phone, adtf_amount as amount,	
				adtf_status as status,
				case
					when adtf_status='R' then '신청'
					when adtf_status='S' then '성공'
					when adtf_status='F' then '실패'
					when adtf_status='H' then '이월'
				end as status,
				adtf_rdate as rdate, adtf_pdate as pdate, app,
				nickname 
			FROM (select * from ad_discount_tel_fee $where) A
			LEFT JOIN ad_user B 
			ON A.adtf_user_id = B.user_id
			ORDER by adtf_rdate DESC
			LIMIT $page_num, $howmany
		";
		
		$query = $this->db->query($sql);
		$arr = $query->result_array();
		//return $arr;
		return array('total'=>$cnt, 'arr'=>$arr);
	}
	
	
	
}












