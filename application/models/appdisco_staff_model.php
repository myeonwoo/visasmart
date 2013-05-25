<?php if( !defined('BASEPATH')) exit('No direct script access allowed.');
class Appdisco_staff_model extends CI_Model{
	
	function validate()
	{
		$salt = 'dkflsafklsdmn34e!!';
		$this->db->where('email', $this->input->post('username'));
		$this->db->where('passwd', md5( $salt. $this->input->post('password')) );
		$this->db->where('activate', 'Y');
		$query = $this->db->get('appdisco_user');
		
		if($query->num_rows == 1)
		{
			return $query->result();
		}
		return false;
	}
  
	function valid_staff()
	{
		$this->db->where('activate', 'Y');
		$query = $this->db->get('appdisco_user');
		
		return $query->result_array();
	}
	
	public function get_list($sid=null)
	{
		$where = "";
		if ($sid)
			$where = "WHERE A.uid=$sid";
		
		$sql = "
			select 
				A.uid, A.email, A.uname, A.role, A.auth as auth_level,
				B.name as rname, C.name as auth, 
				A.activate, FROM_UNIXTIME(A.created) as created
			from (select * from appdisco_user order by uid desc) A
			left join (select * from field_type_item where ft_id=7) B
			on A.role=B.value_i
			left join (select * from field_type_item where ft_id=8) C
			on A.auth=C.value_i
			$where
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function get_roles()
	{
		$sql = "select value_i, name from field_type_item where ft_id=7 and valid=1";
		$query = $this->db->query($sql);
		$arr = $query->result_array();
		return $arr;
	}
	
	/** 리턴 auth 레벨 리스트 **/
	public function get_auth()
	{
		$sql = "select value_i, name from field_type_item where ft_id=8 and valid=1";
		$query = $this->db->query($sql);
		$arr = $query->result_array();
		return $arr;
	}
	
	public function get_appdisco_user_by_username()
	{
		$username = $this->input->post('username');
		
		$this->db->where('email', $username );
		$query = $this->db->get('appdisco_user');
		
		if($query->num_rows == 1)
		{
			return $query->row();
		}
		return false;
	}
	
	public function get_staff()
	{
		$sql = "
			select A.*, B.name as rname
			from (select * from appdisco_user order by uid desc) A
			left join (select * from field_type_item where ft_id=7) B
			on A.role=B.value_i
		";
	}
	
	public function subscribe_cs_history($sname, $user_id, $comment)
	{
		$sql = "
			INSERT INTO admin_cs_log
			SET
				acl_cs_id='$sname',
				acl_user_id=$user_id,
				acl_commnet='$comment',
				acl_rdate = NOW()
		";
		
		return $this->db->query($sql);
	}
	
	public function get_cs_admin_user_assoc($field)
	{
		$sql = "select uid, $field as f from appdisco_user where role=2";
		$query = $this->db->query($sql);
		$res = $query->result_array();
		
		$ret = array();
		foreach( $res as $row )
			$ret[$row['uid']] = $row['f'];
			//array_push( $ret, array( $row['f'] => $row['f']) );
			
		return $ret;
	}
	
	public function get_appdisco_user($user_id=null)
	{
		if ( $user_id == null )
		{
			$sql = "select * from appdisco_user";
			$query = $this->db->query($sql);
			return $query->result_array();
		} else {
			$sql = "select * from appdisco_user where uid=$user_id";
			$query = $this->db->query($sql);
			$row = $query->row();
			return $row;
		}
	}
	
	/**
	 **	업데이트 애드라떼 유저 정보
	**/
	public function update_user($sname, $user_id, $fields, $comment)
	{
		$data = array(
			'aui_answer' => "$answer",
			'aui_status' => '1',
			'aui_duty' => "$sname",
			'aui_adate' => "$now",
		);
		$this->db->where( 'user_id', $uid );
		$ret = $this->db->update('ad_user', $fields);
		
		$sql = "
			INSERT INTO admin_cs_log
			SET
				acl_cs_id='$sname',
				acl_user_id=$user_id,
				acl_commnet='$comment',
				acl_rdate = NOW()
		";
		if( isset($comment)){
			$comment = trim($comment);
			if ( strlen($comment) > 0 )
				$this->db->query($sql);
		}
		return array('msg'=>'업데이트되었습니다.', 'result'=>$ret);
		
	}
	
	/**
	 **	업데이트 앱디스코 staff 유저 정보
	**/
	public function update_appdisco_user($sid, $auth, $email, $name, $role, $passwd)
	{
		$salt = 'dkflsafklsdmn34e!!';
		
		$fields = array(
			'auth' => "$auth",
			'email' => "$email",
			'uname' => "$name",
			'role' => "$role",
		);
		if ( strlen($passwd) > 0 )
			$fields['passwd'] = md5( $salt.$passwd );
		
		$this->db->where( 'uid', $sid );
		$ret = $this->db->update('appdisco_user', $fields);
		
		return array('msg'=>'업데이트되었습니다.', 'result'=>$ret);
		
	}
	
	/**
	 **	업데이트 앱디스코 staff 사용으로 변경
	**/
	public function activate_appdisco_user($sid)
	{
		$fields = array(
			'activate' => "Y",
		);
		//return $fields;
		$this->db->where( 'uid', $sid );
		$ret = $this->db->update('appdisco_user', $fields);
		
		return array('msg'=>'계정이 사용으로 변경 되었습니다.', 'result'=>$ret);
		
	}
	
	/**
	 **	업데이트 앱디스코 staff 계정 중지
	**/
	public function unactivate_appdisco_user($sid)
	{
		$fields = array(
			'activate' => "N",
		);
		//return $fields;
		$this->db->where( 'uid', $sid );
		$ret = $this->db->update('appdisco_user', $fields);
		
		return array('msg'=>'계정이 중지 되었습니다.', 'result'=>$ret);
		
	}
	
	public function create_appdisco_user($fields)
	{
		if ( isset($fields['passwd']) )
		{
			$salt = 'dkflsafklsdmn34e!!';
			$this->db->where('email', $this->input->post('username'));
			$fields['passwd'] = md5( $salt. $this->input->post('password'));
		}
		
		$struc = array();
		$row = array();
		foreach ( $fields as $key => $value )
		{
			array_push( $struc, $key);
			array_push( $row, $value);
		}
		
		$struc = implode( ',', $struc );
		$row = implode( "','", $row );
		$now = time();
		$sql = "insert into appdisco_user ($struc, created) value('$row', '$now')";
		
		$this->db->trans_start();
		$this->db->query($sql);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			return false;
		} 

		return true;
	}

	
}






