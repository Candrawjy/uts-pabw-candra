<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_M extends CI_Model {

    public function getDataUser()
    {
        $this->db->order_by('user.created_at','DESC');
        $query = $this->db->get('user');
        return $query;
    }

    public function add($post)
    {
        $params['id_role'] = $post['id_role'];
        $params['nama_user'] = $post['nama_user'];
        $params['email_user'] = $post['email_user'];
        $params['password'] = md5($post['password']);
        $params['nohp_user'] = $post['nohp_user'];
        $params['is_active'] = 1;

        $this->db->insert('user', $params);
    }

    public function edit($post)
    {
        // $params['nama_user'] = $post['nama_user'];

        if (!empty($post['nama_user'])) {
            $params['nama_user'] = $post['nama_user'];
        }

        if (!empty($post['id_role'])) {
            $params['id_role'] = $post['id_role'];
        }

        if ($post['is_active'] == 0) {
            $params['is_active'] = 0;
        } else if ($post['is_active'] == 1) {
            $params['is_active'] = 1;
        }

        if (!empty($post['email_user'])) {
            $params['email_user'] = $post['email_user'];
        }
        if (!empty($post['nohp_user'])) {
            $params['nohp_user'] = $post['nohp_user'];
        }
        if (!empty($post['password'])) {
            $params['password'] = md5($post['password']);
        }

        $this->db->where('id_user', $post['id_user']);
        $this->db->update('user', $params);
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function import_data_pengguna($data)
    {
        return $this->db->insert_batch('user', $data);
    }
   
}