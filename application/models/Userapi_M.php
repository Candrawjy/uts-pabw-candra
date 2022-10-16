<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userapi_M extends CI_Model
{
    public function getDataUmkm()
    {
        $this->db->select('user.*, jenis_kategori.*, umkm_jasa.*');
        $this->db->from('umkm_jasa');
        $this->db->join('user', 'user.id_user = umkm_jasa.id_user');
        $this->db->join('jenis_kategori', 'jenis_kategori.id_jeniskategori = umkm_jasa.id_jeniskategori');
        $this->db->where('umkm_jasa.jenis', '1');
        $this->db->order_by('umkm_jasa.created_at','DESC');
        // $this->db->limit(10, 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function getDataJasa()
    {
        $this->db->select('user.*, jenis_kategori.*, umkm_jasa.*');
        $this->db->from('umkm_jasa');
        $this->db->join('user', 'user.id_user = umkm_jasa.id_user');
        $this->db->join('jenis_kategori', 'jenis_kategori.id_jeniskategori = umkm_jasa.id_jeniskategori');
        $this->db->where('umkm_jasa.jenis', '2');
        $this->db->order_by('umkm_jasa.created_at','DESC');
        // $this->db->limit(10, 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function getDataKategoriUmkm()
    {
        $this->db->select('jenis_kategori.*');
        $this->db->from('jenis_kategori');
        $this->db->where('jenis_kategori.target', 'UMKM');
        $this->db->order_by('jenis_kategori.created_at','DESC');
        $query = $this->db->get();
        return $query;
    }

    public function getDataKategoriJasa()
    {
        $this->db->select('jenis_kategori.*');
        $this->db->from('jenis_kategori');
        $this->db->where('jenis_kategori.target', 'Jasa Kreatif');
        $this->db->order_by('jenis_kategori.created_at','DESC');
        $query = $this->db->get();
        return $query;
    }

    public function wishlistadd($post)
    {
        $params['id_user'] = $post['id_user'];
        $params['id_umkm_jasa'] = $post['id_umkm_jasa'];

        $this->db->insert('wishlist', $params);
    }

    public function wishlistremove($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function search(){
        $cari = $this->input->GET('keyword', TRUE);
        $data = $this->db->query("SELECT * from umkm_jasa where nama_umkmjasa like '%$cari%' ");
        
        return $data->result();
    }

    public function review($post)
    {
        $id = $this->session->userdata('id_user');

        $params['id_user'] = $id;
        $params['id_umkm_jasa'] = $post['id_umkm_jasa'];
        $params['jml_rating'] = $post['jml_rating'];
        $params['judul'] = $post['judul'];
        $params['deskripsi'] = $post['deskripsi'];

        $this->db->insert('rating', $params);
    }

}