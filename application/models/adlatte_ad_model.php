<?php if( !defined('BASEPATH')) exit('No direct script access allowed.');
class Adlatte_ad_model extends CI_Model{
	
	public function ad_info($ad_id)
	{
		// title, ad_type, money_1
		$sql = "SELECT * FROM ad_ad WHERE ad_id=$ad_id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}