<?php

class Dev extends CI_Controller {

	function index()
	{
		$this->load->view('header');
		$this->load->view('first');
		$this->load->view('footer');
	}


}