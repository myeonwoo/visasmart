<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mongo_dev_db {

	public $conn;
	protected $db;
	protected $collection;
	protected $explain;

	/**
	 * Constructor
	 *
	 * Loads the calendar language file and sets the default time reference
	 */
	public function __construct($options=null) {
		$CI =& get_instance();
		$CI->config->load('mongodb');
		$mongodb = $CI->config->item('mongodb');

		$hosts = $mongodb['hostname']['master'];
		foreach($mongodb['hostname']['slaves'] as $slave) {
			$hosts .= ",".$slave;
		}
		$hosts .= ($mongodb['replicaset']) ? "/?replicaSet={$mongodb['replicaset']}" : "";

		$this->conn = new MongoClient("mongodb://".$hosts);
		if($options && $mongodb['replicaset'] && $options['conn_type'] == 'slave') $this->conn->setReadPreference(MongoClient::RP_SECONDARY, array());
	}

	public function __destruct() {
		$this->conn->close();
	}

	public function setDatabase($db) {
		//$this->db = $this->conn->selectDB($db); // O
		//$this->db = $this->conn->getDB($db); // X
		//$this->db = $this->conn->{$db}; // O

		$this->db = $this->conn->selectDB($db);
	}

	public function getDatabase() {
		return $this->db;
	}

	public function setCollection($c) {
		//$this->collection = $this->db->selectCollection($c); // O
		//$this->collection = $this->db->{$c}; // O

		$this->collection = $this->db->selectCollection($c);
	}

	public function getCollection() {
		return $this->collection;
	}

	public function setDbAndCol($db, $c) {
		$this->setDatabase($db);
		$this->setCollection($c);
	}

	public function insert(array $var) {
		$this->collection->insert($var);
	}

	public function inserts(array $var) {
		$this->collection->batchInsert($var);
	}

	public function get($query=null,$fields=null,$sort=null,$skip=null,$limit=null,$hint=null,$debug=null) {
		$cursor = ($fields) ? $this->collection->find($query,$fields) : $this->collection->find($query);
		$cursor = ($sort) ? $cursor->sort($sort) : $cursor;
		$cursor = ($skip) ? $cursor->skip($skip) : $cursor;
		$cursor = ($limit) ? $cursor->limit($limit) : $cursor;
		$cursor = ($hint) ? $cursor->hint($hint) : $cursor;

		//return $cursor;
		$i=0; $retArr=array();
		while( $cursor->hasNext() ) {
			$retArr[$i] = $cursor->getNext();
			$i++;
		}

		if($debug) $this->explain = $cursor->explain();
		return $retArr;
	}

	public function getExplain() {
		return $this->explain;
	}

	public function drop() {
		$this->collection->drop();
	}

	public function update($where,$document,$options=array()) {
		$this->collection->update($where,$document,$options);
	}

	public function getCount($query=null) {
		$count = ($query) ? $this->collection->find($query)->count() : $this->collection->find()->count();

		return $count;
	}

	public function delete($f, $options=array()) {
		$c = $this->collection->remove($f, $options);
		return $c;
	}

	public function ensureIndex($args) {
		return $this->collection->ensureIndex($args);
	}

	public function close() {
		$this->conn->close();
	}

}

// END Mongo_db class

/* End of file Mongo_db.php */
/* Location: ./system/libraries/Mongo_db.php */