<?php if( !defined('BASEPATH')) exit('No direct script access allowed.');

class Mongo_Model extends CI_Model
{
	/**
		* user id : 1623412
	**/
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	public function test()
	{
		$user_id = '1661096';
		
		$where = array('user_id'=> $user_id);
		$fields = array('action_type','saving_type','time');
		
		$this->load->library('mongo_db');
		$this->mongo_db->setDatabase('ad_view');
		
		$retArr=array();
		$ad_list = array(1925, 1926, 1927, 1928, 1929, 1930);
		if ( false ) 
		{
			foreach ( $ad_list as $ad_id ) 
			{
				$this->mongo_db->setCollection($ad_id);
				$result = $this->mongo_db->get($where, $fields);
				//$result = $this->mongo_db->getCollection()->find($where, $fields);
				
				$retArr = array_merge($retArr, $result);
				//array_push($retArr, array('sec'=>$sec, 'ad_id'=> $ad_id, 'action_type'=>$row['action_type'], 'saving_type'=>$row['saving_type'], 'time'=>$time) );
			}
			
			return $retArr;
		} 
		else if(true)
		{
			foreach ( $ad_list as $ad_id ) 
			{
				$this->mongo_db->setCollection($ad_id);
				$cursor = $this->mongo_db->find($where, $fields);
				while( $cursor->hasNext() ) 
				{
					$row = $cursor->getNext();
					$sec = $row['time']->sec;
					$time = date('Y-m-d H:i:s A', $sec);
					array_push($retArr, array('sec'=>$sec, 'ad_id'=> $ad_id, 'action_type'=>$row['action_type'], 'saving_type'=>$row['saving_type'], 'time'=>$time) );
				}
			}
			
			return $retArr;
			
			
			$collection = $this->mongo_db->setCollection('1925');
			$cursor = $collection
			->find(
				array('user_id'=> $user_id), 
				array('action_type','saving_type','time'))
			->sort(array('time'=>-1));
			
			while( $cursor->hasNext() ) 
			{
				$row = $cursor->getNext();
				$sec = $row['time']->sec;
				$time = date('Y-m-d H:i:s A', $sec);
				array_push($retArr, array('sec'=>$sec, 'ad_id'=> $ad_id, 'action_type'=>$row['action_type'], 'saving_type'=>$row['saving_type'], 'time'=>$time) );
			}
			
			return $retArr;
		}
		


		$this->mongo_db->setDbAndCol('ad_view', '1169');
		$ret = $this->mongo_db->getCount();
		/*
		->where_gte('age', 18)
		->where_in('country', array(
			'England',
			'Scotland',
			'Wales',
			'Ireland'
		))
		->where(array(
			'likes_whisky' => TRUE
		))
		->get('people');
		*/
		//$this->load->model('member_model');
		
		return $ret;
	}
	
	public function test2()
	{
		$user_id = '1661096';
		
		$where = array('user_id'=> $user_id);
		$fields = array('action_type','saving_type','time');
		
		$this->load->library('mongo_db');
		$db = $this->mongo_db->setDatabase('ad_view');
		$list = $db->listCollections();
		
		foreach ($list as $collection) 
		{
			echo "collection: $collection " . $collection->getName() . "<br />";	
		}
		
		return '';
		
		
	}

}