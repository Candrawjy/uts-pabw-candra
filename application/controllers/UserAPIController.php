<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserAPIController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Userapi_M');
	}

	public function list_umkm()
	{
		$data['title'] = "UMKM";
		$data['umkm'] = $this->Userapi_M->getDataUmkm()->result();
		$data['kategori'] = $this->Userapi_M->getDataKategoriUmkm()->result();

		$this->load->view('user-layout/partials/header', $data);
		$this->load->view('user-layout/partials/navbar');
		$this->load->view('user-layout/umkm/list-umkm');
		$this->load->view('user-layout/partials/footer');
	}

	public function detail_umkm($slug)
	{
		$data['title'] = "Detail UMKM";
		$data['umkm_jasa'] = $this->db->get_where('umkm_jasa', ['slug' => $slug])->row_array();

		$this->load->view('user-layout/partials/header', $data);
		$this->load->view('user-layout/partials/navbar');
		$this->load->view('user-layout/umkm/detail-umkm');
		$this->load->view('user-layout/partials/footer');
	}

	public function list_jasa()
	{
		$data['title'] = "Jasa Kreatif";
		$data['jasa'] = $this->Userapi_M->getDataJasa()->result();
		$data['kategori'] = $this->Userapi_M->getDataKategoriJasa()->result();

		$this->load->view('user-layout/partials/header', $data);
		$this->load->view('user-layout/partials/navbar');
		$this->load->view('user-layout/jasa/list-jasa');
		$this->load->view('user-layout/partials/footer');
	}

	public function detail_jasa($slug)
	{
		$data['title'] = "Detail Jasa Kreatif";
		$data['umkm_jasa'] = $this->db->get_where('umkm_jasa', ['slug' => $slug])->row_array();

		$this->load->view('user-layout/partials/header', $data);
		$this->load->view('user-layout/partials/navbar');
		$this->load->view('user-layout/jasa/detail-jasa');
		$this->load->view('user-layout/partials/footer');
	}

	public function search()
	{
		$data['title'] = "Cari UMKM dan Jasa Kreatif";
		$data['search'] = $this->Userapi_M->search();

		$this->load->view('user-layout/partials/header', $data);
		$this->load->view('user-layout/partials/navbar-landing');
		$this->load->view('user-layout/search');
		$this->load->view('user-layout/partials/footer');
	}

	public function wishlistadd()
	{
		if ($this->session->userdata('id_role') == NULL) {
			redirect('login');
		} else {
			$id_user = $this->input->post('id_user');
			$id_umkm_jasa = $this->input->post('id_umkm_jasa');
			$post = $this->input->post(null, TRUE);
			$this->Userapi_M->wishlistadd($post);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Wishlist Ditambahkan');
				echo "<script> history.go(-1); </script>";
			} else {
				$this->session->set_flashdata('error', 'Gagal Menambahkan Wishlist');
				echo "<script> history.go(-1); </script>";
			}
		}
	}

	public function wishlistremove($id)
	{
		if ($this->session->userdata('id_role') == NULL) {
			redirect('login');
		} else {
			$where = array('id_wishlist' => $id);
			$this->Userapi_M->wishlistremove($where, 'wishlist');
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Wishlist Dihapus');
				echo "<script> history.go(-1); </script>";
			} else {
				$this->session->set_flashdata('error', 'Gagal Menghapus Wishlist');
				echo "<script> history.go(-1); </script>";
			}
		}
	}

	public function review($slug)
	{
		$this->form_validation->set_rules('id_umkm_jasa', 'UMKM', 'required');
		$this->form_validation->set_rules('jml_rating', 'Rating', 'required');
		$this->form_validation->set_rules('judul', 'Judul Penilaian', 'required');
		$this->form_validation->set_rules('deskripsi', 'Penilaian Anda', 'required');

		$this->form_validation->set_message('required', '%s masih kosong, harap diisi');

		$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Review";
			$data['umkm_jasa'] = $this->db->get_where('umkm_jasa', ['slug' => $slug])->row_array();

			$this->load->view('user-layout/partials/header', $data);
			$this->load->view('user-layout/partials/navbar');
			$this->load->view('user-layout/rating');
			$this->load->view('user-layout/partials/footer');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->Userapi_M->review($post);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Berhasil Memberikan Penilaian dan Sedang Direview');
				redirect('/');
			} else {
				$this->session->set_flashdata('success', 'Gagal Memberikan Penilaian, Coba lagi');
				redirect('/');
			}
		}
	}

}
