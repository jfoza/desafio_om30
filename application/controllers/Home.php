<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'scripts' => array(
				'js/home/home.js',
			),
		);

		$this->load->view('layout/header', $data);
		$this->load->view('home/index');
		$this->load->view('layout/footer');
	}
}
