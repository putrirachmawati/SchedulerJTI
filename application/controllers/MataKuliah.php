<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matakuliah extends CI_Controller
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
        $this->form_validation->set_rules('id_prodi', 'Id Program Studi', 'required|trim');
        $this->form_validation->set_rules('kode_mata_kuliah', 'Kode Mata Kuliah', 'required|trim');
        $this->form_validation->set_rules('nama_mata_kuliah', 'Nama Mata Kuliah', 'required|trim');
        $this->form_validation->set_rules('semester', 'Semester', 'required|trim');
        $this->form_validation->set_rules('jenis_mata_kuliah', 'Jenis Mata Kuliah', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            //form validasi gagal
            //notif gagal form belum...!
            $data['title'] = 'Data Mata Kuliah';
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            //model get mata kuliah
            $data['prodi'] = $this->Scheduler_Model->getAllProdi();
            $data['MataKuliah'] = $this->Scheduler_Model->getAllMataKuliah();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_data_mata_kuliah', $data);
            $this->load->view('templates/footer');
        } else {
            //form validasi sukses
            //model insert ruang
            $this->Scheduler_Model->insertMataKuliah();

            //notif insert data sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data mata kuliah telah ditambahkan..</div>');
            redirect('MataKuliah');
        }
    }

    public function edit_mata_kuliah($id_mata_kuliah)
    {
        //rules form edit !!!
        $this->form_validation->set_rules('id_prodi', 'Id Program Studi', 'required|trim');
        $this->form_validation->set_rules('kode_mata_kuliah', 'Kode Mata Kuliah', 'required|trim');
        $this->form_validation->set_rules('nama_mata_kuliah', 'Nama Mata Kuliah', 'required|trim');
        $this->form_validation->set_rules('semester', 'Semester', 'required|trim');
        $this->form_validation->set_rules('jenis_mata_kuliah', 'Jenis Mata Kuliah', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            //notif gagal form belum...
            redirect('MataKuliah');
        } else {
            //form validasi sukses
            //model edit matkul
            $this->Scheduler_Model->editMataKuliah($id_mata_kuliah);

            //notif edit data sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data mata kuliah telah diupdate..</div>');
            redirect('MataKuliah');
        }
    }

    public function delete_mata_kuliah($id_mata_kuliah)
    {
        //model delete ruang
        $this->Scheduler_Model->deleteMataKuliah($id_mata_kuliah);

        //notif delete sukses
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data mata kuliah berhasil dihapus..</div>');
        redirect('MataKuliah');
    }
}
