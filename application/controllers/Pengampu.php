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

        //load model
        $this->load->model('Scheduler_Model');
    }

    public function index()
    {
        //rules form insert !!!
        $this->form_validation->set_rules('id_dosen', 'Dosen', 'required|trim');
        $this->form_validation->set_rules('id_mata_kuliah', 'Matkul', 'required|trim');
        $this->form_validation->set_rules('id_prodi', 'Prodi', 'required|trim');
        $this->form_validation->set_rules('id_semester', 'Semester', 'required|trim');
        $this->form_validation->set_rules('id_golongan', 'Golongan', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            //form validasi gagal
            //notif gagal form belum...!
            $data['title'] = 'Data Pengampu';
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            //model get pengampu
            $data['pengampu'] = $this->Scheduler_Model->getAllPengampu();
            $data['dos'] = $this->Scheduler_Model->getAllDosen();
            $data['MataKuliah'] = $this->Scheduler_Model->getAllMataKuliah();
            $data['prod'] = $this->Scheduler_Model->getAllProdi();
            $data['sem'] = $this->Scheduler_Model->getAllSemester();
            $data['gol'] = $this->Scheduler_Model->getAllGolongan();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_data_pengampu', $data);
            $this->load->view('templates/footer');
        } else {
            //form validasi sukses
            //model insert pengampu
            $this->Scheduler_Model->insertPengampu();

            //notif insert data sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data pengampu telah ditambahkan..</div>');
            redirect('Pengampu');
        }
    }

    public function edit_pengampu($id_pengampu)
    {
        //rules form edit !!!
        $this->form_validation->set_rules('id_dosen', 'Dosen', 'required|trim');
        $this->form_validation->set_rules('id_mata_kuliah', 'Mata Kuliah', 'required|trim');
        $this->form_validation->set_rules('id_prodi', 'Prodi', 'required|trim');
        $this->form_validation->set_rules('id_semester', 'Semester', 'required|trim');
        $this->form_validation->set_rules('id_golongan', 'Golongan', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            //notif gagal form belum...
            redirect('Pengampu');
        } else {
            //form validasi sukses
            //model edit pengampu
            $this->Scheduler_Model->editPengampu($id_pengampu);

            //notif edit data sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data pengampu telah diupdate..</div>');
            redirect('Pengampu');
        }
    }

    public function delete_pengampu($id_pengampu)
    {
        //model delete ruang
        $this->Scheduler_Model->deletePengampu($id_pengampu);

        //notif delete sukses
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data pengampu berhasil dihapus..</div>');
        redirect('Pengampu');
    }
}
