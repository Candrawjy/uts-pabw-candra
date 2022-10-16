<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing_M extends CI_Model
{
    public function getDataProduk()
    {
        $this->db->select('umkm_jasa.*, jenis_kategori.*, produk.*, produk.deskripsi as deskripsi_produk, umkm_jasa.slug as slug_umkm');
        $this->db->from('produk');
        $this->db->join('umkm_jasa', 'umkm_jasa.id_umkm_jasa = produk.id_umkm_jasa');
        $this->db->join('jenis_kategori', 'jenis_kategori.id_jeniskategori = produk.id_jeniskategori');
        $this->db->where('umkm_jasa.jenis', '1');
        $this->db->order_by('produk.created_at','DESC');
        $this->db->limit(10, 'ASC');
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
        $this->db->limit(10, 'ASC');
        $query = $this->db->get();
        return $query;
    }

}