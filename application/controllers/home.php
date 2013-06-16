<?php

class Home extends CI_Controller {

	function index()
	{
		$this->load->view('header');
		$this->load->view('main/home');
		//$this->load->view('footer');
	}

	function main()
	{
		$this->load->view('header');
		$this->load->view('main/home');
		$this->load->view('footer');	
	}

	function aboutus()
	{
		$this->load->view('header');
		$this->load->view('aboutus');
		$this->load->view('footer');
	}

}