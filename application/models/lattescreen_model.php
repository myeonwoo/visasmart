<?php if( !defined('BASEPATH')) exit('No direct script access allowed.');

class Lattescreen_Model extends CI_Model
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
		*	라떼 스크린 내역 리턴
		*	유저 ID 에 광고별에 따른 리스트
	****/
	public function history_grouped($user_id, $date=null)
	{
		if ($date) {
			$sdate = $date;
			$edate = $date . ' 23:59:59';
		
		} else {
			$sdate = date("Y-m-d");
			//$sdate = strtotime ( '-1 day' , strtotime ( $edate ) ) ;
			//$sdate = date ( 'Y-m-d' , $sdate );
			$edate = date("Y-m-d H:i:s");
		}
		
		$ad_ad_column = array(
			'app_id','ad_type','ad_title','valid','saving_interval','saving_count_per_hour','unlock_money','event_money','total_uv','limit_uv',
		);
		$redis_s = new Redis();
		$redis_s->connect('10.0.1.69', 6379, 10);
		
		$retArr = array();

		$sql = "
			select A.ad_id, B.title as title
			from (select distinct adt_ad_id as ad_id from ad_ad_timer where adt_sdate between '2013-04-08' and '2013-04-09' and valid=1) A
			left join ad_ad_base B
			on A.ad_id=B.ad_id
			where B.ad_type=12
		";
		$sql = "
			select A.ad_id, B.title as title
			from (select distinct adt_ad_id as ad_id from ad_ad_timer where valid=1 and adt_ad_id in (1925, 1926, 1927, 1928, 1929, 1930)) A
			left join ad_ad_base B
			on A.ad_id=B.ad_id
			where B.ad_type=12
		";
		$sql = "
			select A.ad_id, A.time, B.ad_type, B.title as title, B.description, B.name, B.abbr
			from (
				select adt_ad_id as ad_id, adt_sdate as time
				from ad_ad_timer where valid=1 and adt_ad_id in (1925, 1926, 1927, 1928, 1929, 1930) and adt_sdate>'2013-03-01'
			) A
			left join (
				select A.ad_id, A.ad_type, A.title, B.description, B.name, B.abbr
				from (select * from ad_ad_base where ad_type in (12,13)) A
				left join (select * from field_type_item where ft_id=1) B
				on A.ad_type=B.value_i)
			B
			on A.ad_id=B.ad_id
		";
		$sql = "
			select A.ad_id, A.time, B.ad_type, B.title as title, B.description, B.name, B.abbr
			from (
				select adt_ad_id as ad_id, adt_sdate as time
				from ad_ad_timer where valid=1 and adt_sdate >= '$sdate' and adt_sdate <= '$edate'
			) A
			inner join (
				select A.ad_id, A.ad_type, A.title, B.description, B.name, B.abbr
				from (select * from ad_ad_base) A
				left join (select * from field_type_item where ft_id=1) B
				on A.ad_type=B.value_i)
			B
			on A.ad_id=B.ad_id
			where ad_type in (12,13)
		";
		
		$query = $this->db->query($sql);
		$ad_list = $query->result_array(); // return array
		
		$where = array('user_id'=> $user_id);
		$fields = array('action_type','saving_type','time');

		// Get Mongo DB
		$this->load->library('mongo_db');
		$db = $this->mongo_db->setDatabase('ad_view');
		
		foreach ( $ad_list as $ad )
		{
			$ad_id = $ad['ad_id'];
			
			$ad_key = "ad_ad:{$ad_id}";
			$row = $redis_s->hMGet($ad_key, $ad_ad_column);
			$amount = $row['unlock_money'] . ' / ' . $row['event_money'] . ' 원';
			
			$title = $ad['title'];
			$time = $ad['time'];
			$description = $ad['description'];
			
			$collection = $db->selectCollection($ad_id);
			// $list = $collection->findOne($where, $fields);
			
			$row = $collection->findOne($where, $fields);
			
			//$sec = $row['time']->sec;
			//$time = date('Y-m-d H:i:s', $sec);
			//$time = date('Y-m-d H', $sec);
			
			if($row)
			{
				$insert = array(
					'ad_id'=> $ad_id, 
					'ad_type'=>$description, 
					'title'=>$title, 
					'amount'=> $amount, 
					'time'=>$time,
				);
				array_push($retArr, $insert );
			}
		}
		
		// Our Call to Sort the Data
		usort($retArr, 'descByTime');
		return $retArr;
	}
	
	/**** 
		*	라떼 스크린 내역 리턴 (CPT)
		*	user_id 와 광고 ID에 따른 리스트
	****/
	public function history($user_id, $ad_id)
	{
		$retArr=array();
		$sql = "select title from ad_ad_base where ad_id=$ad_id";
		$query = $this->db->query($sql);
		
		$title = 'undefined';
		if ( $query->num_rows() == 1 ) {
			$row = $query->row();
			$title = $row->title;
		}
		
		$ad_list = array(
			array('ad_id'=>$ad_id, 'title'=>$title)
		);
		
		$where = array('user_id'=> $user_id);
		$fields = array('action_type','saving_type','time');
		
		// Get Mongo DB
		$this->load->library('mongo_db');
		$mongoDb = $this->mongo_db->setDatabase('ad_view');
		foreach ( $ad_list as $ad ) 
		{
			$ad_id = $ad['ad_id'];
			$title = $ad['title'];
			
			$this->mongo_db->setCollection($ad_id);
			$cursor = $this->mongo_db->find($where, $fields)->sort(array('_id'=>-1));
				
			if ( $cursor->count() < 1 )
				continue;
				
			while( $cursor->hasNext() ) 
			{
				$row = $cursor->getNext();
				//$sec = $row['time']->sec;
				$sec = $row['time']['sec'];
				$time = date('Y-m-d H:i:s', $sec);
				array_push($retArr, array('ad_id'=> $ad_id, 'title'=>$title, 'action_type'=>$row['action_type'], 'saving_type'=>$row['saving_type'], 'time'=>$time) );
			}
		}
		
		// Our Call to Sort the Data
		usort($retArr, 'descByTime');
		return $retArr;
	}
	
	/****	
		*	라떼 스크린 내역 리턴 (CPI)
		*	user_id 와 광고 ID에 따른 리스트
	****/
	public function history_cpi($user_id, $num_per_page, $start)
	{
		$retArr = array();
		
		$sql = "select concat('nickname:', nickname, ', phone:', phone_number, ', email:', email_address) as info from ad_user where user_id=$user_id";
		$query = $this->db->query($sql);
		$row = $query->row();
		$retArr['user_info'] = $row->info;
		
		$sql = "
			select count(*)
			from (
				select 
					ad_id, ad_title, 
					case check_type
						when 1 then '보너스 적립 가능한 상태'
						when 2 then '보너스 적립 받은 상태'
						when 3 then '어플을 삭제한 상태' 
						else '그외' end as status,
					CONCAT(saving_money, ' - ', bonus_money, ' 원') as reward,
					case when saving_date is null then '' else saving_date end as saving_date,
					case when bonus_saving_date is null then '' else bonus_saving_date end as bonus_saving_date,
					case when app_delete_date is null then '' else app_delete_date end as app_delete_date,
					'' as action
				from lattescreen_cpi_user_history where user_id=3797034) A
			inner join (select * from ad_appinstall_userinfo where user_id=3797034)  C
			on A.ad_id=C.ad_id
		";
		$query = $this->db->query($sql);
		$row = $query->row();
		$retArr['cnt'] = $row->cnt;
		
		$sql = "
			SELECT ad_id, ad_title, status, reward, install_date, saving_date, bonus_saving_date, app_delete_date, action
			FROM (
				select A.*, C.install_date
				from (
					select 
						ad_id, ad_title, 
						case check_type
							when 1 then '보너스 적립 가능한 상태'
							when 2 then '보너스 적립 받은 상태'
							when 3 then '어플을 삭제한 상태' 
							else '그외' end as status,
						CONCAT(saving_money, ' - ', bonus_money, ' 원') as reward,
						case when saving_date is null then '' else saving_date end as saving_date,
						case when bonus_saving_date is null then '' else bonus_saving_date end as bonus_saving_date,
						case when app_delete_date is null then '' else app_delete_date end as app_delete_date,
						'' as action
					from lattescreen_cpi_user_history where user_id=$user_id) A
				inner join (select * from ad_appinstall_userinfo where user_id=$user_id)  C
				on A.ad_id=C.ad_id) A
			limit $start, $num_per_page
		";
		$sql = "
			select 
				C.ad_id, 
				--D.app_name as ad_title,
				(select title from ad_ad_base where ad_id=C.ad_id) as ad_title,
				case 
					when D.check_type=1 then '보너스 적립 가능한 상태'
					when D.check_type=2 then '보너스 적립 받은 상태'
					when D.check_type=3 then '어플을 삭제한 상태'
					when D.check_type is null then '인스톨 시도만한 상태'
					else '그외' end as status,
				CONCAT(D.saving_money, ' - ', D.bonus_money, ' 원') as reward,
				C.install_date, 
				case when C.saving_date is null then '' else C.saving_date end as saving_date,
				case when D.bonus_saving_date is null then '' else D.bonus_saving_date end as bonus_saving_date,
				case when D.app_delete_date is null then '' else D.app_delete_date end as app_delete_date,
				'' as action
			from (
				select B.*
				from (select ad_id from ad_timeboard where ad_type_form='CPT20I') A
				inner join (select * from ad_appinstall_userinfo where user_id=$user_id)  B
				on A.ad_id=B.ad_id) C
			left join (select * from lattescreen_cpi_user_history where user_id=$user_id) D
			on C.ad_id=D.ad_id
		";
		$query = $this->db->query($sql);
		$retArr['contents'] = $query->result_array(); // return array
		
		return $retArr;
	}
	
	public function test()
	{
		return 'hi';
		
		$user_id = '1661096';
		
		$where = array('user_id'=> $user_id);
		$fields = array('action_type','saving_type','time');
		
		$this->load->library('mongo_db');
		
		return $this->mongo_db->listCollections();
		
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

}
/** End Lattescreen_Model **/

/****
	*	array 역순으로 정렬 위한 비교 method
****/
function descBySec($a, $b){
	if ($a['sec'] == $b['sec']) { 
		return 0; 
	}
	return ($a['sec'] > $b['sec']) ? -1 : 1;
}
function descByTime($a, $b){
	if ($a['time'] == $b['time']) { 
		return 0; 
	}
	return ($a['time'] > $b['time']) ? -1 : 1;
}