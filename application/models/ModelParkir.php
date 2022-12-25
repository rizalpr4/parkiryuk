<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelParkir extends CI_Model
{
    public function getParkirmasuk()
    {
        return $this->db->get('tbl_masuk');
    }

    public function tambah_parkir($data = null)
    {
        $this->db->insert('tbl_masuk', $data);
    }

    public function parkirmasukWhere($where)
    {
        return $this->db->get_where('tbl_masuk', $where);
    }

    public function update_parkirmasuk($data = null, $where = null)
    {
        $this->db->update('tbl_masuk', $data, $where);
    }

    public function hapusparkir($where = null)
    {
        $this->db->delete('tbl_masuk', $where);
    }
}
