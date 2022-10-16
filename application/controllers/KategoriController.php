<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('Kategori_M');
		if ($this->session->userdata('id_role') == NULL) {
			redirect('login');
		}
	}

	public function set_upload_options($newName)
	{
		$config = [
			'upload_path' 	=> './uploads/kategori/',
			'allowed_types' => 'jpg|png|jpeg',
			'max_size'      => 10280,
			'file_name'		=> $newName,
			'overwrite'     => FALSE,
		];

		return $config;
	}

	public function list_data_kategori()
	{
		if ($this->session->userdata('id_role') != '1' && $this->session->userdata('id_role') != '3') {
            $this->session->set_flashdata('error', 'Anda tidak memiliki hak akses!');
			echo "<script> history.go(-1); </script>";
        } else {
            $data['title'] = "List Data Kategori";
            $data['kategori'] = $this->Kategori_M->getDataKategori()->result();

			$this->load->view('admin-layout/partials/header', $data);
			$this->load->view('admin-layout/partials/navbar');
			$this->load->view('admin-layout/kategori/list-data');
			$this->load->view('admin-layout/partials/footer');
        }
	}

	public function add_data_kategori()
	{
		if ($this->session->userdata('id_role') == '') {
			redirect('login');
		} else {
			if ($this->session->userdata('id_role') != '1') {
				$this->session->set_flashdata('error', 'Anda tidak memiliki hak akses!');
				echo "<script> history.go(-1); </script>";
			} else {
				$id = $this->session->userdata('id_user');
				$data['id'] = $id;
				$this->form_validation->set_rules('nama_jeniskategori', 'Nama Kategori', 'required|trim');
				$this->form_validation->set_rules('target', 'Target', 'required|trim');

				if (empty($_FILES['userfile']['name'])) {
					$this->form_validation->set_rules('userfile', 'Thumbnail', 'required');
				}

				$this->form_validation->set_message('required', '%s masih kosong, harap diisi');

				$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

				if ($this->form_validation->run() == FALSE) {
					$data['title'] = "Tambah Data Kategori";
					$data['user'] = $this->db->from('user')->where('id_role', '2')->get()->result();
					$data['kategori'] = $this->db->get('jenis_kategori')->result();

					$this->load->view('admin-layout/partials/header', $data);
					$this->load->view('admin-layout/partials/navbar');
					$this->load->view('admin-layout/kategori/add-data');
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

					$title = trim(strtolower($this->input->post('nama_jeniskategori')));
					$out = explode(" ",$title);
					$slug = implode("-",$out);

					$data = array(
						'nama_jeniskategori' => $this->input->post('nama_jeniskategori'),
						'target' => $this->input->post('target'),
						'slug' => $slug,

						'thumbnail_kategori' => $dataInfo[0]['file_name'],
					);

					$this->Kategori_M->add($data);

					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');
						redirect('kelola-kategori');
					} else {
						$this->session->set_flashdata('success', 'Data Gagal Ditambahkan');
						redirect('kelola-kategori');
					}
				}
			}
		}
	}

	public function edit_data_kategori($id)
	{
		$user_id = $this->session->userdata('id_user');
		if ($this->session->userdata('id_role') != '1') {
			$this->session->set_flashdata('error', 'Anda tidak memiliki hak akses!');
			echo "<script> history.go(-1); </script>";
		} else {

			if ($this->input->post('id_jeniskategori')) {
				$id_jeniskategori = $this->input->post('id_jeniskategori');
			}

			if ($this->input->post('nama_jeniskategori')) {
				$this->form_validation->set_rules('nama_jeniskategori', 'Kategori', 'required|trim');
			}

			if ($this->input->post('target')) {
				$this->form_validation->set_rules('target', 'Target', 'required|trim');
			}

			$this->form_validation->set_message('required', '%s masih kosong, harap diisi');
			$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

			if ($this->form_validation->run() == FALSE) {
				$data['title'] = "Edit Data Kategori";
				$data['kategori'] = $this->db->get_where('jenis_kategori', ['id_jeniskategori' => $id])->row_array();
				
				$this->load->view('admin-layout/partials/header', $data);
				$this->load->view('admin-layout/partials/navbar');
				$this->load->view('admin-layout/kategori/edit-data');
				$this->load->view('admin-layout/partials/footer');
			} else {
				$thumbnail_kategori = $_FILES['thumbnail_kategori']['name'] == "" ? "" : explode('.', $_FILES['thumbnail_kategori']['name']);
				$thumbnail_kategori = $thumbnail_kategori == '' ? $this->input->post('tmp_thumbnail_kategori') : str_replace(' ', '-', $thumbnail_kategori[0]) . "_" . $user_id . '.' . $thumbnail_kategori[1];

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
							if ($key == 'thumbnail_kategori') {
								if ($this->input->post('tmp_thumbnail_kategori') != "") {
									unlink(FCPATH . 'uploads/kategori/' . $this->input->post('tmp_thumbnail'));
								}
							}
						}
					}
				}

				$title = trim(strtolower($this->input->post('nama_jeniskategori')));
				$out = explode(" ",$title);
				$slug = implode("-",$out);

				$data = [
					'nama_jeniskategori' => $this->input->post('nama_jeniskategori'),
					'target' => $this->input->post('target'),
					'slug' => $slug,

					'thumbnail_kategori' => $thumbnail_kategori,
				];

				$where = $this->input->post('id_jeniskategori');
				$this->Kategori_M->edit($where, $data);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('success', 'Data Berhasil Diubah');
					redirect('kelola-kategori');
				} else {
					$this->session->set_flashdata('success', 'Tidak ada perubahan');
					redirect('kelola-kategori');
				}
			}
		}
	}

	public function delete_data_kategori($id)
	{
		if ($this->session->userdata('id_role') != '1') {
			$this->session->set_flashdata('error', 'Anda tidak memiliki hak akses!');
			echo "<script> history.go(-1); </script>";
		} else {
			$where = array('id_jeniskategori' => $id);
			$getdata = $this->db->select('thumbnail_kategori')->get_where('jenis_kategori', ['id_jeniskategori' => $id])->result_array();

			foreach ($getdata as $gd) {
				if ($gd['thumbnail_kategori'] != NULL || $gd['thumbnail_kategori'] != '') {
					unlink(FCPATH . 'uploads/kategori/' . $gd['thumbnail_kategori']);
				}
			}
			$this->Kategori_M->delete($where, 'jenis_kategori');
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Berhasil Dihapus');
				redirect('kelola-kategori');
			} else {
				$this->session->set_flashdata('error', 'Gagal Menghapus Data');
				redirect('kelola-kategori');
			}
		}
	}

}