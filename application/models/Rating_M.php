<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rating_M extends CI_Model
{
	public function getDataRating()
    {
        $this->db->select('umkm_jasa.*, user.*, rating.*');
        $this->db->from('rating');
        $this->db->join('umkm_jasa', 'umkm_jasa.id_umkm_jasa = rating.id_umkm_jasa');
        $this->db->join('user', 'user.id_user = rating.id_user');
        $this->db->order_by('rating.created_at','DESC');
        if($this->session->userdata('id_role') == '2') {
        $this->db->where('rating.id_user', $this->session->userdata('id_user'));
        } else if($this->session->userdata('id_role') == '3') {
        $this->db->where('umkm_jasa.id_user', $this->session->userdata('id_user'));
        }
        $query = $this->db->get();
        return $query;
    }

    public function getSumDataRating()
    {
        $this->db->select('umkm_jasa.*, user.*, rating.*');
        $this->db->select_sum('rating.jml_rating');
        $this->db->from('rating');
        $this->db->join('umkm_jasa', 'umkm_jasa.id_umkm_jasa = rating.id_umkm_jasa');
        $this->db->join('user', 'user.id_user = rating.id_user');
        $this->db->group_by('rating.id_umkm_jasa');
        $this->db->order_by('rating.created_at','DESC');
        $query = $this->db->get();
        return $query;
    }

    public function edit($post)
    {
        if ($post['status'] == 0) {
            $params['status'] = 0;
        } else if ($post['status'] == 1) {
            $params['status'] = 1;
        } else if ($post['status'] == 2) {
            $params['status'] = 2;
        }

        $this->db->where('id_rating', $post['id_rating']);
        $this->db->update('rating', $params);
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function import_data_rating($data)
    {
        return $this->db->insert_batch('rating', $data);
    }

}