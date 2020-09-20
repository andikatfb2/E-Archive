<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modeldokumen extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function get_jenis_dokumen($table)
    {
        $query = $this->db->get($table);

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
    }

 public function get_dokumen($table)
    {
        $query = $this->db->get($table);

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
    }


    public function update_interfaces($table, $data)
    {
        $where = "id = 1";

        return $this->db->update($table, $data, $where);
    }

}
