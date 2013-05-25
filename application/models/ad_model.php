<?php if( !defined('BASEPATH')) exit('No direct script access allowed.');

class Ad_Model extends CI_Model
{
	/**
		* user id : 1623412
	**/
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
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












