<?php

class Usa extends CI_Controller {

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
			'name' => 'usa',
		);
	}

	function first()
	{
		$this->load->view('header');
		$this->load->view('usa_first');
		$this->load->view('footer');
	}

	function first_edit()
	{
		$this->load->view('header');
		$this->load->view('usa_first_edit');
		$this->load->view('footer');
	}

	function blank()
	{
		$this->load->view('header');
		$this->load->view('blank.php');
		$this->load->view('footer');
	}

	function article()
	{
		$data = &$this->data;

		/** Define parameters **/
		$schema = array(
			'id' => 'integer',
		);
		$args = $this->uri->uri_to_assoc(3, $schema);
		extract($args, EXTR_OVERWRITE);

		/** Set variables for missing **/
		if ( !isset($id) || $id=='' ) $id = null;

		
		$this->load->view('header');
		$this->load->view('usa/page1');
		$this->load->view('footer');
	}

	function edit()
	{
		$data = &$this->data;
		/** Define parameters **/
		$schema = array(
			'id' => 'integer',
		);
		$args = $this->uri->uri_to_assoc(3, $schema);
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














