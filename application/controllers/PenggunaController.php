<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PenggunaController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengguna_M');
        if ($this->session->userdata('id_role') == '') {
            redirect('login');
        } else if ($this->session->userdata('id_role') != '1') {
            $this->session->set_flashdata('error', 'Anda tidak memiliki hak akses!');
            echo "<script> history.go(-1); </script>";
        }
    }

    function email_user_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM user WHERE email_user = '$post[email_user]' AND id_user != '$post[id_user]' ");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('email_user_check', '{field} ini sudah dipakai, silakan ganti');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function list_data_pengguna()
    {
        $data['title'] = 'List Data Pengguna';
        $data['pengguna'] = $this->Pengguna_M->getDataUser()->result();
        $data['jumlah_pengguna'] = $this->db->from("user")->where('id_role !=', '1')->get()->num_rows();

        $this->load->view('admin-layout/partials/header', $data);
        $this->load->view('admin-layout/partials/navbar');
        $this->load->view('admin-layout/pengguna/list-data');
        $this->load->view('admin-layout/partials/footer');
    }

    public function add_data_pengguna()
    {

        $this->form_validation->set_rules('id_role', 'Peran', 'required');
        $this->form_validation->set_rules('nama_user', 'Nama', 'required');
        $this->form_validation->set_rules('email_user', 'Email', 'required|is_unique[user.email_user]');
        $this->form_validation->set_rules('nohp_user', 'No Handphone', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]', array('matches' => '%s tidak sesuai dengan password'));

        $this->form_validation->set_message('required', '%s masih kosong, harap diisi');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_message('max_length', '{field} maksimal 8 karakter');
        $this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan ganti');

        $this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Tambah Data User";

            $this->load->view('admin-layout/partials/header', $data);
            $this->load->view('admin-layout/partials/navbar');
            $this->load->view('admin-layout/pengguna/add-data');
            $this->load->view('admin-layout/partials/footer');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->Pengguna_M->add($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');
                redirect('kelola-pengguna');
            } else {
                $this->session->set_flashdata('success', 'Data Gagal Ditambahkan');
                redirect('kelola-pengguna');
            }
        }
    }

    public function edit_data_pengguna($id)
    {
        $this->form_validation->set_rules('nama_user', 'Nama', 'required');

        if ($this->input->post('id_role')) {
            $this->form_validation->set_rules('id_role', 'Peran', 'required');
        }

        if ($this->input->post('is_active')) {
            $this->form_validation->set_rules('is_active', 'Status', 'required');
        }

        if ($this->input->post('email_user')) {
            $this->form_validation->set_rules('email_user', 'Email', 'required|callback_email_user_check');
        }

        if ($this->input->post('nohp_user')) {
            $this->form_validation->set_rules('nohp_user', 'No Handphone', 'required');
        }

        if ($this->input->post('password')) {
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]', array('matches' => '%s tidak sesuai dengan password'));
        }

        if ($this->input->post('passconf')) {
            $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]', array('matches' => '%s tidak sesuai dengan password'));
        }

        $this->form_validation->set_message('required', '%s masih kosong, harap diisi');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_message('max_length', '{field} maksimal 8 karakter');
        $this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan ganti');

        $this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Edit Data Pengguna";
            $data['pengguna'] = $this->db->get_where('user', ['id_user' => $id])->row_array();
            
            $this->load->view('admin-layout/partials/header', $data);
            $this->load->view('admin-layout/partials/navbar');
            $this->load->view('admin-layout/pengguna/edit-data');
            $this->load->view('admin-layout/partials/footer');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->Pengguna_M->edit($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil Diedit');
                redirect('kelola-pengguna');
            } else {
                $this->session->set_flashdata('success', 'Tidak ada perubahan');
                redirect('kelola-pengguna');
            }
        }
    }

    public function delete_data_pengguna($id)
    {
        $where = array('id_user' => $id);
        $this->Pengguna_M->delete($where, 'user');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            redirect('kelola-pengguna');
        } else {
            $this->session->set_flashdata('success', 'Seluruh Data Berhasil Dihapus');
            redirect('kelola-pengguna');
        }
    }

    public function download_format_import_pengguna()
    {
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="format_import_pengguna.xlsx"');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Peran (1=Admin/2=User/3=Partner)');
        $sheet->setCellValue('B1', 'Nama Lengkap');
        $sheet->setCellValue('C1', 'Alamat Email');
        $sheet->setCellValue('D1', 'Password');
        $sheet->setCellValue('E1', 'No Handphone');

        $writer = new Xlsx($spreadsheet);
        $writer->save("php://output");
    }

    public function view_import_data_pengguna()
    {
        $data['title'] = "Import Data Pengguna";

        $this->load->view('admin-layout/partials/header', $data);
        $this->load->view('admin-layout/partials/navbar');
        $this->load->view('admin-layout/pengguna/import-data');
        $this->load->view('admin-layout/partials/footer');
    }

    public function import_data_pengguna()
    {
        $upload_file = $_FILES['upload_file']['name'];
        $extension = pathinfo($upload_file, PATHINFO_EXTENSION);

        if (empty($_FILES['upload_file']['name'])) {
            $this->session->set_flashdata('error', 'Data Import Kosong');
            redirect('kelola-pengguna/import');
        } else if($extension != 'csv' && $extension != 'xls' && $extension != 'xlsx' && $extension != 'CSV' && $extension != 'XLS' && $extension != 'XLSX') {
            $this->session->set_flashdata('error', 'Format File Tidak Didukung');
            redirect('kelola-pengguna/import');
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
                for ($i=1; $i < $sheetcount; $i++) { 
                    $id_role = $sheetdata[$i][0];
                    $nama_user = $sheetdata[$i][1];
                    $email_user = $sheetdata[$i][2];
                    $password = $sheetdata[$i][3];
                    $nohp_user = $sheetdata[$i][4];

                    $data[] = array(
                        'id_role' => $id_role,
                        'nama_user' => $nama_user,
                        'email_user' => $email_user,
                        'password' => md5($password),
                        'nohp_user' => $nohp_user,
                        'is_active' => '1',
                    );
                }
                $this->Pengguna_M->import_data_pengguna($data);

                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Diimport');
                    redirect('kelola-pengguna');
                } else {
                    $this->session->set_flashdata('success', 'Gagal Mengimport Data');
                    redirect('kelola-pengguna');
                }
            }
        }
    }

    public function export_data_pengguna()
    {
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="data_pengguna.xlsx"');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No.');
        $sheet->setCellValue('B1', 'Nama Lengkap');
        $sheet->setCellValue('C1', 'Alamat Email');
        $sheet->setCellValue('D1', 'No Handphone');
        $sheet->setCellValue('E1', 'Peran (1=Admin/2=User/3=Partner)');
        $sheet->setCellValue('F1', 'Status (0=Belum Verifikasi/1=Terverifikasi)');

        $listuser = $this->Pengguna_M->getDataUser()->result();
        $list = 2;
        $no = 1;
        foreach ($listuser as $user) {
            $sheet->setCellValue('A'.$list,$no++);
            $sheet->setCellValue('B'.$list,$user->nama_user);
            $sheet->setCellValue('C'.$list,$user->email_user);
            $sheet->setCellValue('D'.$list,$user->nohp_user);
            $sheet->setCellValue('E'.$list,$user->id_role);
            $sheet->setCellValue('F'.$list,$user->is_active);
            $list++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save("php://output");
    }
    
}