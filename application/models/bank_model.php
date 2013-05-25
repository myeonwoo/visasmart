<?php if( !defined('BASEPATH')) exit('No direct script access allowed.');

class Bank_Model extends CI_Model
{
  function Demo()
  {
    parent::Model();
  }
  
  function test(){
    $sql = "select * from ad_user limit 10";
    $query = $this->db->query($sql);
    
	return $query->result_array();
  }
  
  function test1(){
  
    $query = $this->db->query('select count(*) as cnt from ad_user');

    $row = $query->row();
    return $row->cnt;
  }
  
  function user_count($nickname = null){
    $sql = "select count(*) as cnt from ad_user";
    
    if ($nickname) {
      $sql .= " where nickname='$nickname'";
    }
    
    $query = $this->db->query($sql);
    
    return intval($query->row()->cnt);
  }
  
  function db_user_info($nickname){
    $sql = "select user_id from ad_user where nickname = '$nickname'";
    $query = $this->db->query($sql);
    $count = $query->num_rows();
    $user_id = $query->row()->user_id;
    return array( 'id' => $user_id, 'count'=>$count);
  }
  
  function current_amount($nickname){
    $sql = "select money_accumulated, money_remain from ad_user where nickname='$nickname'";
    $query = $this->db->query($sql);
    $row = $query->row();
    
    return array( 'remain' => $row->money_remain, 'accumulated' => $row->money_accumulated );
  }
  
  /** TODO: Implement insert refund **/
  function refund($nickname, $amount, $event_num){
  
    // TEST
    $sql = "select count(*) as cnt from ad_user";
    $query = $this->db->query($sql);
    $row = $query->row();
    return $row->cnt;
    return $nickname;
    
    // TODO: Check if there is $nickname
    
    // TODO: Insert 
    $sql = "select count(*) as cnt from ad_user where nickname = $nickname";
    $query = $this->db->query($sql);
    $row = $query->row();
    
  }
  

}









