<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_M extends CI_Model
{
    public function getDataProduk()
    {
        $this->db->select('umkm_jasa.*, jenis_kategori.*, produk.*, produk.deskripsi as deskripsi_produk');
        $this->db->from('produk');
        $this->db->join('umkm_jasa', 'umkm_jasa.id_umkm_jasa = produk.id_umkm_jasa');
        $this->db->join('jenis_kategori', 'jenis_kategori.id_jeniskategori = produk.id_jeniskategori');
        $this->db->order_by('produk.created_at','DESC');
        if($this->session->userdata('id_role') == '3') {
        $this->db->where('umkm_jasa.id_user', $this->session->userdata('id_user'));
        }
        $query = $this->db->get();
        return $query;
    }

	public function add($data)
	{
		$this->db->insert('produk', $data);
	}

	public function edit($where, $data)
	{
		$this->db->where('id_produk', $where);
		$this->db->update('produk', $data);
	}

	public function delete($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}