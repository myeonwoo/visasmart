<?php

class Usa extends CI_Controller {

	function index()
	{
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}

	function first()
	{
		$this->load->view('header');
		$this->load->view('first');
		$this->load->view('footer');
	}

}