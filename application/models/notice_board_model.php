<?php if( !defined('BASEPATH')) exit('No direct script access allowed.');

class Notice_board_Model extends CI_Model
{
	function change_valid()
	{
		$sql = "UPDATE ad_board SET valid = $valid WHERE nid = $nid and type = '$type' and nid = $app";

		return $sql;
	}

	public function update_notice_board($app, $type, $nid, $fields)
	{
		$sql = "
			UPDATE ad_board 
			SET contents = contents
			WHERE nid = $nid and type = '$type' and app = $app
		";

		$data = array(
           'title' => $title,
           'name' => $name,
           'date' => $date
        );

		$this->db->where('app', $app);
		$this->db->where('type', $type);
		$this->db->where('nid', $nid);

		$result = $this->db->update('ad_board', $fields);
		$cnt = $this->db->affected_rows();

		$msg = " 정상적으로 수정되었습니다";
		if($cnt < 1)
			$msg = "수정되지 않았습니다.";
		elseif ($cnt > 1) {
			$msg = "비정상적으로 수정되었습니다. ($cnt rows 수정)";
		}
		
		return array('msg'=>$msg, 'sql'=>$sql, 'set'=>$fields, 'nid'=>$nid, 'app'=>$app, 'type'=>$type);


		
		$sql = "
			UPDATE ad_board 
			SET contents = contents
			WHERE nid = $nid and type = '$type' and app = $app
		";

		return array('msg'=>"수정되었습니다.", 'db_ret'=>$sql);
	}

	public function insert_notice_board($app, $type, $fields)
	{
		$type = $fields['type'];
		$title = $fields['title'];
		$contents = $fields['contents'];
		$description = $fields['description'];
		$urgent_sdate = $fields['urgent_sdate'];
		$urgent_edate = $fields['urgent_edate'];
		$valid = $fields['valid'];
		$sql = "
			INSERT INTO ad_board (type, title, contents, description, urgent_edate, urgent_sdate, valid)
			VALUES ('$type', '$title', '$contents', '$description', '$urgent_sdate', '$urgent_edate', '$valid')
		";
		$this->db->query($sql);
		$nid = $this->db->insert_id();
		return array('msg'=>'insert 되었습니다.', 'nid'=>$nid, 'app'=>$app, 'type'=>$type, 'set'=>$fields, 'sql'=>$sql);
		
		$result = $this->db->insert('ad_board', $fields); 
		$nid = $this->db->insert_id();

		return array('msg'=>'insert 되었습니다.', 'nid'=>$nid, 'set'=>$fields, 'sql'=>$sql);
	}
}