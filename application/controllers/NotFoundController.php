<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotFoundController extends CI_Controller {

	public function index()
	{
		$data['title'] = "404";

		$this->load->view('user-layout/partials/header', $data);
		$this->load->view('user-layout/partials/navbar');
		$this->load->view('errors/404');
	}

}
