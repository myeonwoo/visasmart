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
}