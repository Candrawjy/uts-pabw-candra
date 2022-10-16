<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class RatingController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('Rating_M');
		if ($this->session->userdata('id_role') == NULL) {
			redirect('login');
		}
	}

	public function list_data_rating()
	{
		$data['title'] = "List Data Rating";
		$data['rating'] = $this->Rating_M->getDataRating()->result();
		$data['rating_diterima'] = $this->db->from("rating")->where('status', '1')->get()->num_rows();

		$this->load->view('admin-layout/partials/header', $data);
		$this->load->view('admin-layout/partials/navbar');
		$this->load->view('admin-layout/rating/list-data');
		$this->load->view('admin-layout/partials/footer');
	}

	public function edit_data_rating($id)
	{
		if ($this->session->userdata('id_role') != '1' && $this->session->userdata('id_role') != '3') {
			$this->session->set_flashdata('error', 'Anda tidak memiliki hak akses!');
			echo "<script> history.go(-1); </script>";
		} else {

			if ($this->input->post('status')) {
				$this->form_validation->set_rules('status', 'Status', 'required');
			}

			$this->form_validation->set_message('required', '%s masih kosong, harap diisi');

			$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

			if ($this->form_validation->run() == FALSE) {
				$data['title'] = "Edit Data Rating";
				$data['rating'] = $this->db->get_where('rating', ['id_rating' => $id])->row_array();

				$this->load->view('admin-layout/partials/header', $data);
				$this->load->view('admin-layout/partials/navbar');
				$this->load->view('admin-layout/rating/edit-data');
				$this->load->view('admin-layout/partials/footer');
			} else {
				$post = $this->input->post(null, TRUE);
				$this->Rating_M->edit($post);

				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('success', 'Data Berhasil Diedit');
					redirect('rating');
				} else {
					$this->session->set_flashdata('success', 'Tidak ada perubahan');
					redirect('rating');
				}
			}
		}
	}

	public function delete_data_rating($id)
	{
		if ($this->session->userdata('id_role') != '1' && $this->session->userdata('id_role') != '3') {
			$this->session->set_flashdata('error', 'Anda tidak memiliki hak akses!');
			echo "<script> history.go(-1); </script>";
		} else {
			$where = array('id_rating' => $id);
			$this->Rating_M->delete($where, 'rating');
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Berhasil Dihapus');
				redirect('rating');
			} else {
				$this->session->set_flashdata('error', 'Gagal Menghapus Data');
				redirect('rating');
			}
		}
	}

	public function download_format_import_rating()
	{
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="format_import_rating.xlsx"');

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'ID UMKM/Jasa');
		$sheet->setCellValue('B1', 'ID Penilai');
		$sheet->setCellValue('C1', 'Jumlah Rating (1-10)');
		$sheet->setCellValue('D1', 'Judul');
		$sheet->setCellValue('E1', 'Deskripsi');

		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
	}

	public function view_import_data_rating()
	{
		$data['title'] = "Import Data Rating";

		$this->load->view('admin-layout/partials/header', $data);
		$this->load->view('admin-layout/partials/navbar');
		$this->load->view('admin-layout/rating/import-data');
		$this->load->view('admin-layout/partials/footer');
	}

	public function import_data_rating()
	{
		$upload_file = $_FILES['upload_file']['name'];
		$extension = pathinfo($upload_file, PATHINFO_EXTENSION);

		if (empty($_FILES['upload_file']['name'])) {
			$this->session->set_flashdata('error', 'Data Import Kosong');
			redirect('rating/import');
		} else if($extension != 'csv' && $extension != 'xls' && $extension != 'xlsx' && $extension != 'CSV' && $extension != 'XLS' && $extension != 'XLSX') {
			$this->session->set_flashdata('error', 'Format File Tidak Didukung');
			redirect('rating/import');
		} else {
			if ($extension == 'csv') {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} else if($extension == 'xls') {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
			$sheetdata = $spreadsheet->getActiveSheet()->toArray();

			// echo '<pre>';
			// print_r($sheetdata);

			$sheetcount = count($sheetdata);
			if ($sheetcount > 0) {
				for ($i=0; $i < $sheetcount; $i++) { 
					$id_umkm_jasa = $sheetdata[$i][0];
					$id_user = $sheetdata[$i][1];
					$jml_rating = $sheetdata[$i][2];
					$judul = $sheetdata[$i][3];
					$deskripsi = $sheetdata[$i][4];

					$data[] = array(
						'id_umkm_jasa' => $id_umkm_jasa,
						'id_user' => $id_user,
						'jml_rating' => $jml_rating,
						'judul' => $judul,
						'deskripsi' => $deskripsi,
					);
				}
				$this->Rating_M->import_data_rating($data);

				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('success', 'Data Berhasil Diimport');
					redirect('rating');
				} else {
					$this->session->set_flashdata('success', 'Gagal Mengimport Data');
					redirect('rating');
				}
			}
		}
	}

	public function export_data_rating()
	{
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="data_rating.xlsx"');

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Nama UMKM/Jasa');
		$sheet->setCellValue('C1', 'Nama Penilai');
		$sheet->setCellValue('D1', 'Rating (1-10)');
		$sheet->setCellValue('E1', 'Judul');
		$sheet->setCellValue('F1', 'Deskripsi');

		$listrating = $this->Rating_M->getDataRating()->result();
		$list = 2;
		$no = 1;
		foreach ($listrating as $rating) {
			$sheet->setCellValue('A'.$list,$no++);
			$sheet->setCellValue('B'.$list,$rating->nama_umkmjasa);
			$sheet->setCellValue('C'.$list,$rating->nama_user);
			$sheet->setCellValue('D'.$list,$rating->jml_rating);
			$sheet->setCellValue('E'.$list,$rating->judul);
			$sheet->setCellValue('F'.$list,$rating->deskripsi);
			$list++;
		}

		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
	}
}