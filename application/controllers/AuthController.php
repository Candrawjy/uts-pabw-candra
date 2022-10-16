<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('User_M');
	}

	public function login()
	{
		$this->form_validation->set_rules('email_user', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

		$this->form_validation->set_message('required', '%s masih kosong, harap diisi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
		$this->form_validation->set_message('max_length', '{field} maksimal 8 karakter');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			if ($this->session->userdata('id_role') != null) {
				$this->session->set_flashdata('error', 'Anda telah login, silahkan logout terlebih dahulu!');
				echo "<script> history.go(-1); </script>";
			} else {
				$data['title'] = "Login";

				$this->load->view('auth/login', $data);
			}
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email_user = $this->input->post('email_user', TRUE);
		$password = md5($this->input->post('password', TRUE));

		$user = $this->db->get_where('user', ['email_user' => $email_user])->row_array();
		if ($user) {
			if ($user['is_active'] == 1) {
				if ($user['password'] == $password) {
					$this->session->set_userdata($user);
					$this->session->set_flashdata('success', 'Selamat datang!');
					redirect('dashboard');
				} else {
					$this->session->set_flashdata('error', 'Password yang Anda masukkan salah!');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('error', 'Email Anda belum teraktivasi!');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('error', 'Email yang Anda masukkan tidak terdaftar!');
			redirect('login');
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('nama_user', 'Nama', 'required');
		$this->form_validation->set_rules('email_user', 'Email', 'required|is_unique[user.email_user]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]', array('matches' => '%s tidak sesuai dengan password'));
		$this->form_validation->set_rules('nohp_user', 'No Handphone', 'required');

		$this->form_validation->set_message('required', '%s masih kosong, harap diisi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
		$this->form_validation->set_message('max_length', '{field} maksimal 8 karakter');
		$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			if ($this->session->userdata('id_role') != null) {
				$this->session->set_flashdata('error', 'Anda telah login, silahkan logout terlebih dahulu!');
				echo "<script> history.go(-1); </script>";
			} else {
				$data['title'] = "Register";

				$this->load->view('auth/register', $data);
			}
		} else {
			$email_user = $this->input->post('email_user');
			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email_user' => $email_user,
				'token' => $token,
				'created_at' => time(),
			];

			$this->db->insert('user_token', $user_token);

			$post = $this->input->post(null, TRUE);
			$this->User_M->add($post);

			$this->_sendEmail($token, 'verify');

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Berhasil register, silakan cek email atau email spam Anda!');
				redirect('login');
			}
		}
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'poodiesipb@gmail.com',
			'smtp_pass' => 'SVP0odi3s!',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'UTF-8',
			'newline' => "\r\n",
			'wordwrap' => TRUE
		];

		$this->load->library('email', $config);

		$this->email->from('poodiesipb@gmail.com', 'Poodies');
		$this->email->to($this->input->post('email_user'));
		$this->email->set_mailtype('html');

		$data = array(
			'nama_user' => $this->input->post('nama_user'),
			'email_user' => $this->input->post('email_user'),
			'token' => $token,
			'title' => "Reset Password"
		);

		if ($type == 'verify') {
			$this->email->subject('Verifikasi Akun Anda');
			$this->email->message($this->load->view('auth/verif-email', $data, true));
		} else if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message($this->load->view('auth/reset-pass-email', $data, true));
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email_user = $this->input->get('email_user');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email_user' => $email_user])->row_array();
		if($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				if(time() - $user_token['created_at'] < (60*60*24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email_user', $email_user);
					$this->db->update('user');

					$this->db->delete('user_token', ['email_user' => $email_user]);

					$this->session->set_flashdata('success', 'Email '.$email_user.' berhasil diaktivasi! Silakan login!');
					redirect('login');
				} else {
					$this->db->delete('user', ['email_user' => $email_user]);
					$this->db->delete('user_token', ['email_user' => $email_user]);

					$this->session->set_flashdata('error', 'Gagal aktivasi, token telah kedaluarsa!');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('error', 'Gagal aktivasi, token invalid!');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('error', 'Gagal aktivasi, email Anda tidak terdaftar!');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email_user');
		$this->session->unset_userdata('id_role');
		session_destroy();
		redirect('/');
	}

}
