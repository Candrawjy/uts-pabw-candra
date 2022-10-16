<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_M extends CI_Model
{
	public function getDataKategori()
    {
        $this->db->select('jenis_kategori.*');
        $this->db->from('jenis_kategori');
        $this->db->order_by('jenis_kategori.created_at','DESC');
        $query = $this->db->get();
        return $query;
    }

    public function add($data)
    {
        $this->db->insert('jenis_kategori', $data);
    }

    public function edit($where, $data)
    {
        $this->db->where('id_jeniskategori', $where);
        $this->db->update('jenis_kategori', $data);
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}