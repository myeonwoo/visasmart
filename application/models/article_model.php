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

	public function update($id, $fields)
	{
		$content = $fields['content'];
		$sql = "
		UPDATE article 
		SET content = $content
		WHERE id = $id";


		$this->db->where( 'id', $id );
		$ret = $this->db->update('article', $fields);
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

	
}












