<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengampu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('Auth/access_blocked');
        }
        $this->load->model('Scheduler_Model');
    }
    public function index()
    {
        //rules form insert !!!
        $this->form_validation->set_rules('id_mata_kuliah', 'Id Matkul', 'required|trim');
        $this->form_validation->set_rules('id_dosen', 'Id Dosen', 'required|trim');
        $this->form_validation->set_rules('id_prodi', 'Id Prodi', 'required|trim');
        $this->form_validation->set_rules('id_semester', 'id Semester', 'required|trim');
        $this->form_validation->set_rules('golongan', 'Golongan', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            //form validasi gagal
            //notif gagal form belum...!
            $data['title'] = 'Data Pengampu';
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            //model get mata kuliah
            $data['pengampu'] = $this->Scheduler_Model->getAllPengampu();
            $data['MataKuliah'] = $this->Scheduler_Model->getAllMataKuliah();
            $data['dosen'] = $this->Scheduler_Model->getAllDosen();
            $data['prodi'] = $this->Scheduler_Model->getAllProdi();
            $data['semester'] = $this->Scheduler_Model->getAllSemester();
            $data['golongan'] = $this->Scheduler_Model->getAllGolongan();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_data_pengampu', $data);
            $this->load->view('templates/footer');
        }
    }

    public function edit_pengampu($id_pengampu)
    {
        //rules form edit !!!
        $this->form_validation->set_rules('id_dosen', 'Id Dosen', 'required|trim');
        $this->form_validation->set_rules('id_mata_kuliah', 'Id Mata Kuliah', 'required|trim');
        $this->form_validation->set_rules('id_prodi', 'Id Prodi', 'required|trim');
        $this->form_validation->set_rules('id_semester', 'Id Semester', 'required|trim');
        $this->form_validation->set_rules('id_golongan', 'Id Golongan', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            //notif gagal form belum...
            redirect('Pengampu');
        } else {
            //form validasi sukses
            //model edit matkul
            $this->Scheduler_Model->editPengampu($id_pengampu);

            //notif edit data sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data mata kuliah telah diupdate..</div>');
            redirect('Pengampu');
        }
    }
}
