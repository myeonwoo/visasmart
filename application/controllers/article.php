<?php

class Article extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->setting();
	}

	function index()
	{
		$this->load->view('header');
		$this->load->view('usa_first');
		$this->load->view('footer');
	}

	function setting()
	{
		$this->data = array(
			'controller'=> $this->controller
		);

		$schema = array(
			'id' => 'integer'
		);
		$args = $this->uri->uri_to_assoc(3, $schema);
		extract($args, EXTR_OVERWRITE);

		/** Set variables for missed **/
		if ( !isset($id) || $id == '') $this->id = null; else $this->id = $id;
	}

	public function show()
	{
		$data = &$this->data;
		$id = $this->id;
		$this->load->model('article_model');

		if ($id) {
			$data['article'] = $this->article_model->get($id);
		} else {
			$data['article'] = $id;
		}
		$this->load->view('header');
		$this->load->view('article', $data);
		$this->load->view('footer');
	}

	public function edit()
	{
		$data = &$this->data;
		$id = $this->id;
		$this->load->model('article_model');

		if ($id){
			$data['id'] = $id;
			$data['content'] = $this->article_model->get($id);
		} else {
			$data['id'] = 'null';
			$data['content'] = $id;
		}
		$this->load->view('header');
		$this->load->view('article_edit', $data);
		$this->load->view('footer');
	}
}