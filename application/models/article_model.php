<?php if( !defined('BASEPATH')) exit('No direct script access allowed.');

class Article_Model extends CI_Model
{
	/**
		* user id : 1623412
	**/
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	public function insert_article($fields)
	{
		$type = $fields['type'];
		$title = $fields['title'];
		$content = $fields['content'];
		$created = date('Y-m-d H:i:s');
		$sql = "
			INSERT INTO article (type, title, content, created)
			VALUES ('$type', '$title', '$content', '$created')
		";
		$this->db->query($sql);
		$id = $this->db->insert_id();
		return array('msg'=>'글 생성 되었습니다.', 'id'=>$id, 'set'=>$fields, 'sql'=>$sql);

	}

	public function get($id)
	{
		$sql = "
			select content from article where id=$id
		";
		$query = $this->db->query($sql);
		$cnt = $query->num_rows();
		if( $cnt == 1 ){
			$row = $query->row();
			return $row->content;
		} else {
			return '';
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

	function get_ad($ad_id)
	{
		
		$sql = "SELECT title, ad_type, money_1 FROM ad_ad WHERE ad_id=$ad_id";
		$query = $this->db->query($sql);

		if ( $query->num_rows() == 1 ) {
			//$row = $query->result_array();
			$ret = array( 'valid'=> true, 'value' => $query->row() );
		} else {
			$ret = array( 'valid'=> false, 'value' => '' );
		}
		return $ret;
	}
	
	function info($uid)
	{
		$sql = "select * from ad_user where user_id=$uid";
		$query = $this->db->query($sql);
		$row = $query->row();
		return $row;
	}
	
}












