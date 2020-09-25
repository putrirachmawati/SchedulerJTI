<?php

class Scheduler_Model extends CI_Model
{
    //Tabel Dosen
    public function getAllDosen()
    {
        return $this->db->get('tb_dosen')->result_array();
    }

    public function insertDosen()
    {
        $data = [
            "nama_dosen" => $this->input->post('nama_dosen', true),
            "nip" => $this->input->post('nip', true),
        ];
        $this->db->insert('tb_dosen', $data);
    }

    public function editDosen($id_dosen)
    {
        $data = [
            "nama_dosen" => $this->input->post('nama_dosen', true),
            "nip" => $this->input->post('nip', true)
        ];

        $this->db->where('id_dosen', $id_dosen);
        $this->db->update('tb_dosen', $data);
    }

    public function deleteDosen($id_dosen)
    {
        $this->db->where('id_dosen', $id_dosen);
        $this->db->delete('tb_dosen');
    }
}
