<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_M extends CI_Model
{
    public function listwishlist()
    {   

        $this->db->select('user.*, umkm_jasa.*, wishlist.*, jenis_kategori.*');
        $this->db->from('wishlist');
        $this->db->join('user', 'user.id_user = wishlist.id_user');
        $this->db->join('umkm_jasa', 'umkm_jasa.id_umkm_jasa = wishlist.id_umkm_jasa');
        $this->db->join('jenis_kategori', 'jenis_kategori.id_jeniskategori = umkm_jasa.id_jeniskategori');
        $this->db->order_by('wishlist.created_at','DESC');
        if ($this->session->userdata('id_role') != '1') {
        $this->db->where('wishlist.id_user', $this->session->userdata('id_user'));
        }
        $query = $this->db->get();
        return $query;
    }

}