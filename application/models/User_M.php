<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_M extends CI_Model {

	public function cek_user($data) {
		$query = $this->db->get_where('user', $data);
		return $query;
	}

	public function get($id = null)
	{
		$this->db->from('user');
		if ($id != null) {
			$this->db->where('id_user', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params['id_role'] = $post['id_role'];
		$params['nama_user'] = $post['nama_user'];
		$params['email_user'] = $post['email_user'];
		$params['password'] = md5($post['password']);
		$params['nohp_user'] = $post['nohp_user'];

		$this->db->insert('user', $params);
	}

	public function del($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('user');
	}

	public function edit($post)
	{
		$params['nama_user'] = $post['nama_user'];
		$params['email_user'] = $post['email_user'];
		if (!empty($post['password'])) {
			$params['password'] = md5($post['password']);
		}
		$params['nohp_user'] = $post['nohp_user'];
		$params['id_role'] = $post['id_role'];

		$this->db->where('id_user', $post['id_user']);
		$this->db->update('user', $params);
	}
}