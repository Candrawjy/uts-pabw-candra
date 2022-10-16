<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdukController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('Produk_M');
		if ($this->session->userdata('id_role') == NULL) {
			redirect('login');
		}
	}

	public function set_upload_options($newName)
	{
		$config = [
			'upload_path' 	=> './uploads/produk/',
			'allowed_types' => 'jpg|png|jpeg',
			'max_size'      => 10280,
			'file_name'		=> $newName,
			'overwrite'     => FALSE,
		];

		return $config;
	}

	public function list_data_produk()
	{
		if ($this->session->userdata('id_role') != '1' && $this->session->userdata('id_role') != '3') {
            $this->session->set_flashdata('error', 'Anda tidak memiliki hak akses!');
			echo "<script> history.go(-1); </script>";
        } else {
            $data['title'] = "List Data Produk";
            $data['produk'] = $this->Produk_M->getDataProduk()->result();

			$this->load->view('admin-layout/partials/header', $data);
			$this->load->view('admin-layout/partials/navbar');
			$this->load->view('admin-layout/produk/list-data');
			$this->load->view('admin-layout/partials/footer');
        }
	}

	public function add_data_produk()
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
				$this->form_validation->set_rules('id_umkm_jasa', 'Nama UMKM', 'required|trim');
				$this->form_validation->set_rules('id_jeniskategori', 'Kategori', 'required|trim');
				$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
				$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
				$this->form_validation->set_rules('harga', 'Harga', 'required|trim');

				if (empty($_FILES['userfile']['name'])) {
					$this->form_validation->set_rules('userfile', 'Foto Produk', 'required');
				}

				$this->form_validation->set_message('required', '%s masih kosong, harap diisi');

				$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

				if ($this->form_validation->run() == FALSE) {
					$data['title'] = "Tambah Data Produk";

					if ($this->session->userdata('id_role') == '3') {
						$data['umkm'] = $this->db->select('*')->from('umkm_jasa')->where('id_user', $this->session->userdata('id_user'))->get()->result();
						$data['kategori'] = $this->db->get('jenis_kategori')->result();
					} else {
						$data['umkm'] = $this->db->get('umkm_jasa')->result();
						$data['kategori'] = $this->db->get('jenis_kategori')->result();
					}

					$this->load->view('admin-layout/partials/header', $data);
					$this->load->view('admin-layout/partials/navbar');
					$this->load->view('admin-layout/produk/add-data');
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

					$data = array(
						'id_umkm_jasa' => $this->input->post('id_umkm_jasa'),
						'id_jeniskategori' => $this->input->post('id_jeniskategori'),
						'nama_produk' => $this->input->post('nama_produk'),
						'deskripsi' => $this->input->post('deskripsi'),
						'harga' => $this->input->post('harga'),

						'foto' => $dataInfo[0]['file_name'],
					);

					$this->Produk_M->add($data);

					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');
						redirect('kelola-produk');
					} else {
						$this->session->set_flashdata('success', 'Data Gagal Ditambahkan');
						redirect('kelola-produk');
					}
				}
			}
		}
	}

	public function edit_data_produk($id)
	{
		$user_id = $this->session->userdata('id_user');
		if ($this->session->userdata('id_role') != '1' && $this->session->userdata('id_role') != '3') {
			$this->session->set_flashdata('error', 'Anda tidak memiliki hak akses!');
			echo "<script> history.go(-1); </script>";
		} else {

			if ($this->input->post('id_produk')) {
				$id_produk = $this->input->post('id_produk');
			}

			if ($this->input->post('id_umkm_jasa')) {
				$this->form_validation->set_rules('id_umkm_jasa', 'Nama UMKM', 'required|trim');
			}

			if ($this->input->post('id_jeniskategori')) {
				$this->form_validation->set_rules('id_jeniskategori', 'Kategori', 'required|trim');
			}

			if ($this->input->post('nama_produk')) {
				$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
			}

			if ($this->input->post('deskripsi')) {
				$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
			}

			if ($this->input->post('harga')) {
				$this->form_validation->set_rules('harga', 'Harga', 'required|trim');
			}

			$this->form_validation->set_message('required', '%s masih kosong, harap diisi');
			$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

			if ($this->form_validation->run() == FALSE) {
				$data['title'] = "Edit Data Produk";
				$data['produk'] = $this->db->get_where('produk', ['id_produk' => $id])->row_array();
				// $data['umkm'] = $this->db->get('umkm_jasa')->result();
				// $data['kategori'] = $this->db->get('jenis_kategori')->result();
				if ($this->session->userdata('id_role') == '3') {
					$data['umkm'] = $this->db->select('*')->from('umkm_jasa')->where('id_user', $this->session->userdata('id_user'))->get()->result();
					$data['kategori'] = $this->db->get('jenis_kategori')->result();
				} else {
					$data['umkm'] = $this->db->get('umkm_jasa')->result();
					$data['kategori'] = $this->db->get('jenis_kategori')->result();
				}
				
				$this->load->view('admin-layout/partials/header', $data);
				$this->load->view('admin-layout/partials/navbar');
				$this->load->view('admin-layout/produk/edit-data');
				$this->load->view('admin-layout/partials/footer');
			} else {
				$foto = $_FILES['foto']['name'] == "" ? "" : explode('.', $_FILES['foto']['name']);
				$foto = $foto == '' ? $this->input->post('tmp_foto') : str_replace(' ', '-', $foto[0]) . "_" . $user_id . '.' . $foto[1];

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
							if ($key == 'foto') {
								if ($this->input->post('tmp_foto') != "") {
									unlink(FCPATH . 'uploads/produk/' . $this->input->post('tmp_foto'));
								}
							}
						}
					}
				}

				$data = [
					'id_umkm_jasa' => $this->input->post('id_umkm_jasa'),
					'id_jeniskategori' => $this->input->post('id_jeniskategori'),
					'nama_produk' => $this->input->post('nama_produk'),
					'deskripsi' => $this->input->post('deskripsi'),
					'harga' => $this->input->post('harga'),

					'foto' => $foto,
				];

				$where = $this->input->post('id_produk');
				$this->Produk_M->edit($where, $data);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('success', 'Data Berhasil Diubah');
					redirect('kelola-produk');
				} else {
					$this->session->set_flashdata('success', 'Tidak ada perubahan');
					redirect('kelola-produk');
				}
			}
		}
	}

	public function delete_data_produk($id)
	{
		if ($this->session->userdata('id_role') != '1' && $this->session->userdata('id_role') != '3') {
			$this->session->set_flashdata('error', 'Anda tidak memiliki hak akses!');
			echo "<script> history.go(-1); </script>";
		} else {
			$where = array('id_produk' => $id);
			$getdata = $this->db->select('foto')->get_where('produk', ['id_produk' => $id])->result_array();

			foreach ($getdata as $gd) {
				if ($gd['foto'] != NULL || $gd['foto'] != '') {
					unlink(FCPATH . 'uploads/produk/' . $gd['foto']);
				}
			}
			$this->Produk_M->delete($where, 'produk');
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Berhasil Dihapus');
				redirect('kelola-produk');
			} else {
				$this->session->set_flashdata('error', 'Gagal Menghapus Data');
				redirect('kelola-produk');
			}
		}
	}

}
