<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UmkmJasaController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('UmkmJasa_M');
		if ($this->session->userdata('id_role') == NULL) {
			redirect('login');
		}
	}

	public function set_upload_options($newName)
	{
		$config = [
			'upload_path' 	=> './uploads/thumbnail/',
			'allowed_types' => 'jpg|png|jpeg',
			'max_size'      => 10280,
			'file_name'		=> $newName,
			'overwrite'     => FALSE,
		];

		return $config;
	}

	public function list_data_umkm()
	{
		if ($this->session->userdata('id_role') != '1' && $this->session->userdata('id_role') != '3') {
			$this->session->set_flashdata('error', 'Anda tidak memiliki hak akses!');
			echo "<script> history.go(-1); </script>";
		} else {
			$data['title'] = "List Data UMKM";
			$data['umkm'] = $this->UmkmJasa_M->getDataUmkm()->result();

			$this->load->view('admin-layout/partials/header', $data);
			$this->load->view('admin-layout/partials/navbar');
			$this->load->view('admin-layout/umkm/list-data');
			$this->load->view('admin-layout/partials/footer');
		}
	}

	public function add_data_umkm()
	{
		if ($this->session->userdata('id_role') == '') {
			redirect('login');
		} else {
			if ($this->session->userdata('id_role') != '1' && $this->session->userdata('id_role') != '3') {
				$this->session->set_flashdata('error', 'Anda tidak memiliki hak akses!');
				echo "<script> history.go(-1); </script>";
			} else {
				$id = $this->session->userdata('id_user');
				$data['id'] = $id;
				$this->form_validation->set_rules('id_user', 'Nama Pemilik', 'required|trim');
				$this->form_validation->set_rules('nama_umkmjasa', 'Nama UMKM', 'required|trim');
				$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
				$this->form_validation->set_rules('jam_operasional', 'Jam Operasional', 'required|trim');
				$this->form_validation->set_rules('nohp_umkmjasa', 'No Handphone', 'required|trim');
				$this->form_validation->set_rules('kota', 'Lokasi', 'required|trim');
				$this->form_validation->set_rules('lokasi', 'Link Google Maps', 'required|trim');
				$this->form_validation->set_rules('id_jeniskategori', 'Kategori Utama', 'required|trim');

				if (empty($_FILES['userfile']['name'])) {
					$this->form_validation->set_rules('userfile', 'Thumbnail', 'required');
				}

				$this->form_validation->set_message('required', '%s masih kosong, harap diisi');

				$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

				if ($this->form_validation->run() == FALSE) {
					$data['title'] = "Tambah Data UMKM";
					$data['kategori'] = $this->db->get('jenis_kategori')->result();

					if ($this->session->userdata('id_role') == '3') {
						$data['user'] = $this->db->from('user')->where('id_user', $this->session->userdata('id_user'))->get()->result();
					} else {
						$data['user'] = $this->db->from('user')->where('id_role', '3')->get()->result();
					}

					$this->load->view('admin-layout/partials/header', $data);
					$this->load->view('admin-layout/partials/navbar');
					$this->load->view('admin-layout/umkm/add-data');
					$this->load->view('admin-layout/partials/footer');
				} else {
					$dataInfo = [];
					$files = $_FILES;
					$filesCount = count($_FILES['userfile']['name']);
					for ($i = 0; $i < $filesCount; $i++) {
						if ($files['userfile']['name'][$i] != '') {
							$_FILES['userfile']['name'] = $files['userfile']['name'][$i];
							$_FILES['userfile']['type'] = $files['userfile']['type'][$i];
							$_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
							$_FILES['userfile']['error'] = $files['userfile']['error'][$i];
							$_FILES['userfile']['size'] = $files['userfile']['size'][$i];

						// Rename
							$oldName = explode('.', $_FILES['userfile']['name']);
							$newName =  str_replace(' ', '-', $oldName[0]) . "_" . $id . '.' . $oldName[1];

							$this->upload->initialize($this->set_upload_options($newName));
							$this->upload->do_upload('userfile');

							$dataInfo[] = $this->upload->data();
						}
					}

					$title = trim(strtolower($this->input->post('nama_umkmjasa')));
					$out = explode(" ",$title);
					$slug = implode("-",$out);

					$data = array(
						'id_user' => $this->input->post('id_user'),
						'nama_umkmjasa' => $this->input->post('nama_umkmjasa'),
						'deskripsi' => $this->input->post('deskripsi'),
						'jam_operasional' => $this->input->post('jam_operasional'),
						'nohp_umkmjasa' => $this->input->post('nohp_umkmjasa'),
						'kota' => $this->input->post('kota'),
						'lokasi' => $this->input->post('lokasi'),
						'id_jeniskategori' => $this->input->post('id_jeniskategori'),
						'jenis' => $this->input->post('jenis'),
						'slug' => $slug,

						'thumbnail' => $dataInfo[0]['file_name'],
					);

					$this->UmkmJasa_M->add($data);

					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');
						redirect('kelola-umkm');
					} else {
						$this->session->set_flashdata('success', 'Data Gagal Ditambahkan');
						redirect('kelola-umkm');
					}
				}
			}
		}
	}

	public function edit_data_umkm($id)
	{
		$user_id = $this->session->userdata('id_user');
		if ($this->session->userdata('id_role') != '1' && $this->session->userdata('id_role') != '3') {
			$this->session->set_flashdata('error', 'Anda tidak memiliki hak akses!');
			echo "<script> history.go(-1); </script>";
		} else {

			if ($this->input->post('id_umkm_jasa')) {
				$id_umkm_jasa = $this->input->post('id_umkm_jasa');
			}

			if ($this->input->post('id_user')) {
				$this->form_validation->set_rules('id_user', 'Nama Pemilik', 'required|trim');
			}

			if ($this->input->post('nama_umkmjasa')) {
				$this->form_validation->set_rules('nama_umkmjasa', 'Nama UMKM', 'required|trim');
			}

			if ($this->input->post('deskripsi')) {
				$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
			}

			if ($this->input->post('jam_operasional')) {
				$this->form_validation->set_rules('jam_operasional', 'Jam Operasional', 'required|trim');
			}

			if ($this->input->post('nohp_umkmjasa')) {
				$this->form_validation->set_rules('nohp_umkmjasa', 'No Handphone', 'required|trim');
			}

			if ($this->input->post('kota')) {
				$this->form_validation->set_rules('kota', 'Lokasi', 'required|trim');
			}

			if ($this->input->post('lokasi')) {
				$this->form_validation->set_rules('lokasi', 'Link Google Maps', 'required|trim');
			}

			if ($this->input->post('id_jeniskategori')) {
				$this->form_validation->set_rules('id_jeniskategori', 'Kategori Utama', 'required|trim');
			}

			$this->form_validation->set_message('required', '%s masih kosong, harap diisi');
			$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

			if ($this->form_validation->run() == FALSE) {
				$data['title'] = "Edit Data UMKM";
				$data['umkm_jasa'] = $this->db->get_where('umkm_jasa', ['id_umkm_jasa' => $id])->row_array();
				$data['kategori'] = $this->db->get('jenis_kategori')->result();
				if ($this->session->userdata('id_role') == '3') {
					$data['user'] = $this->db->from('user')->where('id_user', $this->session->userdata('id_user'))->get()->result();
				} else {
					$data['user'] = $this->db->from('user')->where('id_role', '3')->get()->result();
				}
				
				$this->load->view('admin-layout/partials/header', $data);
				$this->load->view('admin-layout/partials/navbar');
				$this->load->view('admin-layout/umkm/edit-data');
				$this->load->view('admin-layout/partials/footer');
			} else {
				$thumbnail = $_FILES['thumbnail']['name'] == "" ? "" : explode('.', $_FILES['thumbnail']['name']);
				$thumbnail = $thumbnail == '' ? $this->input->post('tmp_thumbnail') : str_replace(' ', '-', $thumbnail[0]) . "_" . $user_id . '.' . $thumbnail[1];

				foreach ($_FILES as $key => $value) {
					$oldName = explode('.', $_FILES[$key]['name']);
					if (!empty($value['tmp_name'])) {
						$newName =  str_replace(' ', '-', $oldName[0]) . "_" . $user_id . '.' . $oldName[1];

						$this->upload->initialize($this->set_upload_options($newName));
						// $this->upload->do_upload($key);

						if (!$this->upload->do_upload($key)) {
							echo $this->upload->display_errors();
							die();
						} else {
							$this->upload->data($key);
							if ($key == 'thumbnail') {
								if ($this->input->post('tmp_thumbnail') != "") {
									unlink(FCPATH . 'uploads/thumbnail/' . $this->input->post('tmp_thumbnail'));
								}
							}
						}
					}
				}

				$title = trim(strtolower($this->input->post('nama_umkmjasa')));
				$out = explode(" ",$title);
				$slug = implode("-",$out);

				$data = [
					'id_user' => $this->input->post('id_user'),
					'nama_umkmjasa' => $this->input->post('nama_umkmjasa'),
					'deskripsi' => $this->input->post('deskripsi'),
					'jam_operasional' => $this->input->post('jam_operasional'),
					'nohp_umkmjasa' => $this->input->post('nohp_umkmjasa'),
					'kota' => $this->input->post('kota'),
					'lokasi' => $this->input->post('lokasi'),
					'id_jeniskategori' => $this->input->post('id_jeniskategori'),
					'jenis' => $this->input->post('jenis'),
					'slug' => $slug,

					'thumbnail' => $thumbnail,
				];

				$where = $this->input->post('id_umkm_jasa');
				$this->UmkmJasa_M->edit($where, $data);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('success', 'Data Berhasil Diubah');
					redirect('kelola-umkm');
				} else {
					$this->session->set_flashdata('success', 'Tidak ada perubahan');
					redirect('kelola-umkm');
				}
			}
		}
	}

	public function delete_data_umkm($id)
	{
		if ($this->session->userdata('id_role') != '1' && $this->session->userdata('id_role') != '3') {
			$this->session->set_flashdata('error', 'Anda tidak memiliki hak akses!');
			echo "<script> history.go(-1); </script>";
		} else {
			$where = array('id_umkm_jasa' => $id);
			$getdata = $this->db->select('thumbnail')->get_where('umkm_jasa', ['id_umkm_jasa' => $id])->result_array();

			foreach ($getdata as $gd) {
				if ($gd['thumbnail'] != NULL || $gd['thumbnail'] != '') {
					unlink(FCPATH . 'uploads/thumbnail/' . $gd['thumbnail']);
				}
			}
			$this->UmkmJasa_M->delete($where, 'umkm_jasa');
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Berhasil Dihapus');
				redirect('kelola-umkm');
			} else {
				$this->session->set_flashdata('error', 'Gagal Menghapus Data');
				redirect('kelola-umkm');
			}
		}
	}

	public function list_data_jasa()
	{
		if ($this->session->userdata('id_role') != '1' && $this->session->userdata('id_role') != '3') {
			$this->session->set_flashdata('error', 'Anda tidak memiliki hak akses!');
			echo "<script> history.go(-1); </script>";
		} else {
			$data['title'] = "List Data Jasa Kreatif";
			$data['jasa'] = $this->UmkmJasa_M->getDataJasa()->result();

			$this->load->view('admin-layout/partials/header', $data);
			$this->load->view('admin-layout/partials/navbar');
			$this->load->view('admin-layout/jasa/list-data');
			$this->load->view('admin-layout/partials/footer');
		}
	}

	public function add_data_jasa()
	{
		if ($this->session->userdata('id_role') == '') {
			redirect('login');
		} else {
			if ($this->session->userdata('id_role') != '1' && $this->session->userdata('id_role') != '3') {
				$this->session->set_flashdata('error', 'Anda tidak memiliki hak akses!');
				echo "<script> history.go(-1); </script>";
			} else {
				$id = $this->session->userdata('id_user');
				$data['id'] = $id;
				$this->form_validation->set_rules('id_user', 'Nama Pemilik', 'required|trim');
				$this->form_validation->set_rules('nama_umkmjasa', 'Nama Jasa Kreatif', 'required|trim');
				$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
				$this->form_validation->set_rules('jam_operasional', 'Jam Operasional', 'required|trim');
				$this->form_validation->set_rules('nohp_umkmjasa', 'No Handphone', 'required|trim');
				$this->form_validation->set_rules('kota', 'Lokasi', 'required|trim');
				$this->form_validation->set_rules('lokasi', 'Link Google Maps', 'required|trim');
				$this->form_validation->set_rules('id_jeniskategori', 'Kategori Utama', 'required|trim');

				if (empty($_FILES['userfile']['name'])) {
					$this->form_validation->set_rules('userfile', 'Thumbnail', 'required');
				}

				$this->form_validation->set_message('required', '%s masih kosong, harap diisi');

				$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

				if ($this->form_validation->run() == FALSE) {
					$data['title'] = "Tambah Data Jasa Kreatif";
					$data['kategori'] = $this->db->get('jenis_kategori')->result();
					if ($this->session->userdata('id_role') == '3') {
						$data['user'] = $this->db->from('user')->where('id_user', $this->session->userdata('id_user'))->get()->result();
					} else {
						$data['user'] = $this->db->from('user')->where('id_role', '3')->get()->result();
					}

					$this->load->view('admin-layout/partials/header', $data);
					$this->load->view('admin-layout/partials/navbar');
					$this->load->view('admin-layout/jasa/add-data');
					$this->load->view('admin-layout/partials/footer');
				} else {
					$dataInfo = [];
					$files = $_FILES;
					$filesCount = count($_FILES['userfile']['name']);
					for ($i = 0; $i < $filesCount; $i++) {
						if ($files['userfile']['name'][$i] != '') {
							$_FILES['userfile']['name'] = $files['userfile']['name'][$i];
							$_FILES['userfile']['type'] = $files['userfile']['type'][$i];
							$_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
							$_FILES['userfile']['error'] = $files['userfile']['error'][$i];
							$_FILES['userfile']['size'] = $files['userfile']['size'][$i];

						// Rename
							$oldName = explode('.', $_FILES['userfile']['name']);
							$newName =  str_replace(' ', '-', $oldName[0]) . "_" . $id . '.' . $oldName[1];

							$this->upload->initialize($this->set_upload_options($newName));
							$this->upload->do_upload('userfile');

							$dataInfo[] = $this->upload->data();
						}
					}

					$title = trim(strtolower($this->input->post('nama_umkmjasa')));
					$out = explode(" ",$title);
					$slug = implode("-",$out);

					$data = array(
						'id_user' => $this->input->post('id_user'),
						'nama_umkmjasa' => $this->input->post('nama_umkmjasa'),
						'deskripsi' => $this->input->post('deskripsi'),
						'jam_operasional' => $this->input->post('jam_operasional'),
						'nohp_umkmjasa' => $this->input->post('nohp_umkmjasa'),
						'kota' => $this->input->post('kota'),
						'lokasi' => $this->input->post('lokasi'),
						'id_jeniskategori' => $this->input->post('id_jeniskategori'),
						'jenis' => $this->input->post('jenis'),
						'slug' => $slug,

						'thumbnail' => $dataInfo[0]['file_name'],
					);

					$this->UmkmJasa_M->add($data);

					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');
						redirect('kelola-jasa');
					} else {
						$this->session->set_flashdata('success', 'Data Gagal Ditambahkan');
						redirect('kelola-jasa');
					}
				}
			}
		}
	}

	public function edit_data_jasa($id)
	{
		$user_id = $this->session->userdata('id_user');
		if ($this->session->userdata('id_role') != '1' && $this->session->userdata('id_role') != '3') {
			$this->session->set_flashdata('error', 'Anda tidak memiliki hak akses!');
			echo "<script> history.go(-1); </script>";
		} else {

			if ($this->input->post('id_umkm_jasa')) {
				$id_umkm_jasa = $this->input->post('id_umkm_jasa');
			}

			if ($this->input->post('id_user')) {
				$this->form_validation->set_rules('id_user', 'Nama Pemilik', 'required|trim');
			}

			if ($this->input->post('nama_umkmjasa')) {
				$this->form_validation->set_rules('nama_umkmjasa', 'Nama UMKM', 'required|trim');
			}

			if ($this->input->post('deskripsi')) {
				$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
			}

			if ($this->input->post('jam_operasional')) {
				$this->form_validation->set_rules('jam_operasional', 'Jam Operasional', 'required|trim');
			}

			if ($this->input->post('nohp_umkmjasa')) {
				$this->form_validation->set_rules('nohp_umkmjasa', 'No Handphone', 'required|trim');
			}

			if ($this->input->post('kota')) {
				$this->form_validation->set_rules('kota', 'Lokasi', 'required|trim');
			}

			if ($this->input->post('lokasi')) {
				$this->form_validation->set_rules('lokasi', 'Link Google Maps', 'required|trim');
			}

			if ($this->input->post('id_jeniskategori')) {
				$this->form_validation->set_rules('id_jeniskategori', 'Kategori Utama', 'required|trim');
			}

			$this->form_validation->set_message('required', '%s masih kosong, harap diisi');
			$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

			if ($this->form_validation->run() == FALSE) {
				$data['title'] = "Edit Data Jasa Kreatif";
				$data['umkm_jasa'] = $this->db->get_where('umkm_jasa', ['id_umkm_jasa' => $id])->row_array();
				$data['kategori'] = $this->db->get('jenis_kategori')->result();
				if ($this->session->userdata('id_role') == '3') {
					$data['user'] = $this->db->from('user')->where('id_user', $this->session->userdata('id_user'))->get()->result();
				} else {
					$data['user'] = $this->db->from('user')->where('id_role', '3')->get()->result();
				}
				
				$this->load->view('admin-layout/partials/header', $data);
				$this->load->view('admin-layout/partials/navbar');
				$this->load->view('admin-layout/jasa/edit-data');
				$this->load->view('admin-layout/partials/footer');
			} else {
				$thumbnail = $_FILES['thumbnail']['name'] == "" ? "" : explode('.', $_FILES['thumbnail']['name']);
				$thumbnail = $thumbnail == '' ? $this->input->post('tmp_thumbnail') : str_replace(' ', '-', $thumbnail[0]) . "_" . $user_id . '.' . $thumbnail[1];

				foreach ($_FILES as $key => $value) {
					$oldName = explode('.', $_FILES[$key]['name']);
					if (!empty($value['tmp_name'])) {
						$newName =  str_replace(' ', '-', $oldName[0]) . "_" . $user_id . '.' . $oldName[1];

						$this->upload->initialize($this->set_upload_options($newName));
						// $this->upload->do_upload($key);

						if (!$this->upload->do_upload($key)) {
							echo $this->upload->display_errors();
							die();
						} else {
							$this->upload->data($key);
							if ($key == 'thumbnail') {
								if ($this->input->post('tmp_thumbnail') != "") {
									unlink(FCPATH . 'uploads/thumbnail/' . $this->input->post('tmp_thumbnail'));
								}
							}
						}
					}
				}

				$title = trim(strtolower($this->input->post('nama_umkmjasa')));
				$out = explode(" ",$title);
				$slug = implode("-",$out);

				$data = [
					'id_user' => $this->input->post('id_user'),
					'nama_umkmjasa' => $this->input->post('nama_umkmjasa'),
					'deskripsi' => $this->input->post('deskripsi'),
					'jam_operasional' => $this->input->post('jam_operasional'),
					'nohp_umkmjasa' => $this->input->post('nohp_umkmjasa'),
					'kota' => $this->input->post('kota'),
					'lokasi' => $this->input->post('lokasi'),
					'id_jeniskategori' => $this->input->post('id_jeniskategori'),
					'jenis' => $this->input->post('jenis'),
					'slug' => $slug,

					'thumbnail' => $thumbnail,
				];

				$where = $this->input->post('id_umkm_jasa');
				$this->UmkmJasa_M->edit($where, $data);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('success', 'Data Berhasil Diubah');
					redirect('kelola-jasa');
				} else {
					$this->session->set_flashdata('success', 'Tidak ada perubahan');
					redirect('kelola-jasa');
				}
			}
		}
	}

	public function delete_data_jasa($id)
	{
		if ($this->session->userdata('id_role') != '1' && $this->session->userdata('id_role') != '3') {
			$this->session->set_flashdata('error', 'Anda tidak memiliki hak akses!');
			echo "<script> history.go(-1); </script>";
		} else {
			$where = array('id_umkm_jasa' => $id);
			$getdata = $this->db->select('thumbnail')->get_where('umkm_jasa', ['id_umkm_jasa' => $id])->result_array();

			foreach ($getdata as $gd) {
				if ($gd['thumbnail'] != NULL || $gd['thumbnail'] != '') {
					unlink(FCPATH . 'uploads/thumbnail/' . $gd['thumbnail']);
				}
			}
			$this->UmkmJasa_M->delete($where, 'umkm_jasa');
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Berhasil Dihapus');
				redirect('kelola-jasa');
			} else {
				$this->session->set_flashdata('error', 'Gagal Menghapus Data');
				redirect('kelola-jasa');
			}
		}
	}

}
