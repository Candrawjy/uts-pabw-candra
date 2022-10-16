<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Landing_M');
	}

	public function index()
	{
		$data['title'] = "Beranda";
		$data['produk'] = $this->Landing_M->getDataProduk()->result();
		$data['jasa'] = $this->Landing_M->getDataJasa()->result();

		$this->load->view('user-layout/partials/header', $data);
		$this->load->view('user-layout/partials/navbar-landing');
		$this->load->view('user-layout/landing-page');
		$this->load->view('user-layout/partials/footer');
	}

	public function berita()
	{
		$data['title'] = "Berita";

		$this->load->view('user-layout/partials/header', $data);
		$this->load->view('user-layout/partials/navbar-landing');
		$this->load->view('user-layout/berita');
		$this->load->view('user-layout/partials/footer');
	}

	public function bantuan()
	{
		$data['title'] = "Bantuan";

		$this->load->view('user-layout/partials/header', $data);
		$this->load->view('user-layout/partials/navbar-landing');
		$this->load->view('user-layout/bantuan');
		$this->load->view('user-layout/partials/footer');
	}

	public function kontak_kami()
	{
		$data['title'] = "Kontak Kami";

		$this->load->view('user-layout/partials/header', $data);
		$this->load->view('user-layout/partials/navbar-landing');
		$this->load->view('user-layout/kontak');
		$this->load->view('user-layout/partials/footer');
	}

	public function tentang_kami()
	{
		$data['title'] = "Tentang Kami";

		$this->load->view('user-layout/partials/header', $data);
		$this->load->view('user-layout/partials/navbar-landing');
		$this->load->view('user-layout/tentang');
		$this->load->view('user-layout/partials/footer');
	}

}
