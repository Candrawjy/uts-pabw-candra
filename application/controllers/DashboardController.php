<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_M');
		if ($this->session->userdata('id_role') == NULL) {
			redirect('login');
		}
	}

	public function index()
	{
		$data['title'] = "Dashboard";

		$data['rating_diterima'] = $this->db->from("rating")->where('status', '1')->get()->num_rows();
		$data['jumlah_pengguna'] = $this->db->from("user")->where('id_role !=', '1')->get()->num_rows();
		$data['rating'] = $this->db->from("rating")->get()->num_rows();
		$data['umkm'] = $this->db->from("umkm_jasa")->where('jenis', '1')->get()->num_rows();
		$data['jasa'] = $this->db->from("umkm_jasa")->where('jenis', '2')->get()->num_rows();
		$data['bookmark'] = $this->db->from("wishlist")->get()->num_rows();

		$this->load->view('admin-layout/partials/header', $data);
		$this->load->view('admin-layout/partials/navbar');
		$this->load->view('admin-layout/dashboard');
		$this->load->view('admin-layout/partials/footer');
	}

	public function wishlist()
	{
		$data['title'] = "Wishlist Saya";
		$data['wishlist'] = $this->Dashboard_M->listwishlist()->result();

		$this->load->view('admin-layout/partials/header', $data);
		$this->load->view('admin-layout/partials/navbar');
		$this->load->view('admin-layout/wishlist');
		$this->load->view('admin-layout/partials/footer');
	}

	public function profil()
	{
		$data['title'] = "Profil Saya";

		$this->load->view('admin-layout/partials/header', $data);
		$this->load->view('admin-layout/partials/navbar');
		$this->load->view('admin-layout/profil');
		$this->load->view('admin-layout/partials/footer');
	}

}
