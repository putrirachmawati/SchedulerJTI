<?php

class Scheduler_Model extends CI_Model
{
    //------------------------------ DOSEN ------------------------------
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


    //----------------------------- PENGAMPU -----------------------------
    public function getAllPengampu()
    {
        return $this->db->get('tb_pengampu')->result_array();
    }

    public function insertPengampu()
    {
        $data = [
            "id_dosen" => $this->input->post('id_dosen', true),
            "id_mata_kuliah" => $this->input->post('id_mata_kuliah', true),
            "id_prodi" => $this->input->post('id_prodi', true),
            "id_semester" => $this->input->post('id_semester', true),
            "id_golongan" => $this->input->post('id_golongan', true)
        ];
        $this->db->insert('tb_pengampu');
    }


    //--------------------------- MATA KULIAH ---------------------------
    public function getAllMataKuliah()
    {
        return $this->db->get('tb_mata_kuliah')->result_array();
    }

    public function insertMataKuliah()
    {
        $data = [
            "id_prodi" => $this->input->post('id_prodi', true),
            "kode_mata_kuliah" => $this->input->post('kode_mata_kuliah', true),
            "nama_mata_kuliah" => $this->input->post('nama_mata_kuliah', true),
            "semester" => $this->input->post('semester', true),
            "jenis_mata_kuliah" => $this->input->post('jenis_mata_kuliah', true)
        ];
        $this->db->insert('tb_mata_kuliah', $data);
    }

    public function editMataKuliah($id_mata_kuliah)
    {
        $data = [
            "id_prodi" => $this->input->post('id_prodi'),
            "kode_mata_kuliah" => $this->input->post('kode_mata_kuliah', true),
            "nama_mata_kuliah" => $this->input->post('nama_mata_kuliah', true),
            "semester" => $this->input->post('semester'),
            "jenis_mata_kuliah" => $this->input->post('jenis_mata_kuliah')
        ];

        $this->db->where('id_mata_kuliah', $id_mata_kuliah);
        $this->db->update('tb_mata_kuliah', $data);
    }

    public function deleteMataKuliah($id_mata_kuliah)
    {
        $this->db->where('id_mata_kuliah', $id_mata_kuliah);
        $this->db->delete('tb_mata_kuliah');
    }


    //------------------------- PROGRAM STUDI ---------------------------
    public function getAllProdi()
    {
        return $this->db->get('tb_prodi')->result_array();
    }


    //---------------------------- GOLONGAN ------------------------------
    public function getAllGolongan()
    {
        return $this->db->get('tb_golongan')->result_array();
    }

    //----------------------- TAHUN AKADEMIK ----------------------------
    public function getAllTahunAkademik()
    {
        return $this->db->get('tb_tahun_akademik')->result_array();
    }


    //-------------------------- SEMESTER -------------------------------
    public function getAllSemester()
    {
        return $this->db->get('tb_semester')->result_array();
    }


    //------------------------------ RUANG ------------------------------
    public function getAllRuang()
    {
        return $this->db->get('tb_ruang')->result_array();
    }

    public function insertRuang()
    {
        $data = [
            "nama_ruang" => $this->input->post('nama_ruang', true),
            "kapasitas" => $this->input->post('kapasitas', true),
            "jenis_ruang" => $this->input->post('jenis_ruang', true),
        ];
        $this->db->insert('tb_ruang', $data);
    }


    public function editRuang($id_ruang)
    {
        $data = [
            "nama_ruang" => $this->input->post('nama_ruang', true),
            "kapasitas" => $this->input->post('kapasitas', true),
            "jenis_ruang" => $this->input->post('jenis_ruang', true)
        ];

        $this->db->where('id_ruang', $id_ruang);
        $this->db->update('tb_ruang', $data);
    }


    public function deleteRuang($id_ruang)
    {
        $this->db->where('id_ruang', $id_ruang);
        $this->db->delete('tb_ruang');
    }


    //---------------------------- HARI ---------------------------------
    public function getAllHari()
    {
        return $this->db->get('tb_hari')->result_array();
    }


    //----------------------------- JAM ----------------------------------
    public function getAllJAM()
    {
        return $this->db->get('tb_jam')->result_array();
    }
}
