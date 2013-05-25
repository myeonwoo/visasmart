<?php if( !defined('BASEPATH')) exit('No direct script access allowed.');
class Inquiry_Model extends CI_Model
{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	public function answer($answer, $sname, $aui_id)
	{
		$now = date('Y-m-d H:i:s');
		
		$data = array(
			'aui_answer' => "$answer",
			'aui_status' => '1',
			'aui_duty' => "$sname",
			'aui_adate' => "$now",
		);
		$this->db->where( 'aui_id', $aui_id );
		$ret = $this->db->update('ad_user_inquiry', $data);
		
		return $ret;
		
		$sql = "
			update ad_user_inquiry 
			set 
				aui_answer = '$answer', 
				aui_status = '1',
				aui_duty='$sname', 
				aui_adate = '$now'
			where aui_id = $aui_id
		";
		$query = $this->db->query($sql);
		return $query;
		
	}
	
	public function total()
	{
		$sql = "
			select count(*) as cnt from ad_user_inquiry
		";
		
		$query = $this->db->query($sql);
		$row = $query->row();
		return $row->cnt;
	}
	
}