<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UmkmJasa_M extends CI_Model
{
	public function getDataUmkm()
    {
        $this->db->select('user.*, jenis_kategori.*, umkm_jasa.*');
        $this->db->from('umkm_jasa');
        $this->db->join('user', 'user.id_user = umkm_jasa.id_user');
        $this->db->join('jenis_kategori', 'jenis_kategori.id_jeniskategori = umkm_jasa.id_jeniskategori');
        $this->db->where('umkm_jasa.jenis', '1');
        $this->db->order_by('umkm_jasa.created_at','DESC');
        if($this->session->userdata('id_role') == '3') {
        $this->db->where('umkm_jasa.id_user', $this->session->userdata('id_user'));
        }
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
        if($this->session->userdata('id_role') == '3') {
        $this->db->where('umkm_jasa.id_user', $this->session->userdata('id_user'));
        }
        $query = $this->db->get();
        return $query;
    }

	public function add($data)
	{
		$this->db->insert('umkm_jasa', $data);
	}

	public function edit($where, $data)
	{
		$this->db->where('id_umkm_jasa', $where);
		$this->db->update('umkm_jasa', $data);
	}

	public function delete($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}