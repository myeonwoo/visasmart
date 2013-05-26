<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Article
 *
 * This is an Article of a few basic user interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package		CodeIgniter
 * @subpackage	Rest Server
 * @category	Controller
 * @author		Phil Sturgeon
 * @link		http://philsturgeon.co.uk/code/
*/

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class Article extends REST_Controller
{
    function test_get(){
        $id = $this->get('id');
        $ret = array('id'=>$id);
        $this->response($ret, 200);
    }
    function create_post(){
        $fields = array();
        $fields['type'] = $this->post('type');
        $fields['title'] = $this->post('title');
        $fields['content'] = $this->post('content');

        $this->load->model('article_model');
        $this->article_model->insert_article($fields);

        $this->response($fields, 200);
    }

    public function update_post()
    {
        $fields = array();
        $id = $this->post('id');
        $fields['type'] = $this->post('type');
        $fields['title'] = $this->post('title');
        $fields['content'] = $this->post('content');

        $this->load->model('article_model');
        $ret = $this->article_model->update($id, $fields);

        $fields['ret'] = $ret;
        $this->response($fields, 200);
    }

	
}