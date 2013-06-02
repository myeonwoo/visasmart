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
		$this->load->view('home');
		$this->load->view('footer');
	}

	function setting()
	{
		$this->data = array(
			'name' => 'usa/article',
		);
	}

	function view()
	{
		$data = &$this->data;

		/** Define parameters **/
		$schema = array(
			'id' => 'integer',
		);
		$args = $this->uri->uri_to_assoc(4, $schema);
		extract($args, EXTR_OVERWRITE);

		/** Set variables for missing **/
		if ( !isset($id) || $id=='' ) $id = null;

		if($id){
			$data = &$this->data;
			$this->load->model('article_model');
			$data['content'] = $this->article_model->get_content($id);

			$this->load->view('header');
			$this->load->view('usa/article_view', $data);
			$this->load->view('footer');
		} else {
			show_error('no params', 500);
		}
	}

	function view_dev()
	{
		$data = &$this->data;

		/** Define parameters **/
		$schema = array(
			'id' => 'integer',
		);
		$args = $this->uri->uri_to_assoc(4, $schema);
		extract($args, EXTR_OVERWRITE);

		/** Set variables for missing **/
		if ( !isset($id) || $id=='' ) $id = null;

		if($id){
			$data = &$this->data;
			$this->load->model('article_model');
			$data['content'] = $this->article_model->get_content($id);

			$this->load->view('template/header_dev');
			$this->load->view('usa/article_view_dev', $data);
			$this->load->view('template/footer_dev');
		} else {
			show_error('no params', 500);
		}
	}

	function edit()
	{
		$data = &$this->data;
		/** Define parameters **/
		$schema = array(
			'id' => 'integer',
		);
		$args = $this->uri->uri_to_assoc(4, $schema);
		extract($args, EXTR_OVERWRITE);

		/** Set variables for missing **/
		if ( !isset($id) || $id=='' ) $id = null;

		if($id) {
			$this->load->model('article_model');
			$data['content'] = $this->article_model->get_content($id);
			$data['id'] = $id;

			$this->load->view('header');
			$this->load->view('usa/page1_edit', $data);
			$this->load->view('footer');
		} else {
			show_error('no params', 500);
		}
	}

}














