<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //session Login
        if (!$this->session->userdata('email')) {
            redirect('Auth/access_blocked');
        }

        //load model
        $this->load->model('Scheduler_Model');
    }

    public function index()
    {
        //rules form insert !!!
        $this->form_validation->set_rules('nama_dosen', 'Nama Dosen', 'required|trim');
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');

        if ($this->form_validation->run() == False) {
            //form validasi gagal
            //notif gagal form belum...!
            $data['title'] = 'Data Dosen';

            //ambil data session login
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            //model get dosen
            $data['dosen'] = $this->Scheduler_Model->getAllDosen();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_data_dosen', $data);
            $this->load->view('templates/footer');
        } else {
            //form validasi sukses
            //model insert dosen
            $this->Scheduler_Model->insertDosen();

            //notif insert data sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Dosen telah ditambahkan..</div>');
            redirect('Dosen');
        }
    }

    public function edit_dosen($id_dosen)
    {
        //rules form edit !!!
        $this->form_validation->set_rules('nama_dosen', 'Nama Dosen', 'required|trim');
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');

        if ($this->form_validation->run() == False) {
            //notif gagal form belum...
            redirect('Dosen');
        } else {

            //model edit dosen
            $this->Scheduler_Model->editDosen($id_dosen);

            //notif edit data sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Dosen telah diupdate..</div>');
            redirect('Dosen');
        }
    }

    public function delete_dosen($id_dosen)
    {
        //model delete dosen
        $this->Scheduler_Model->deleteDosen($id_dosen);

        //notif delete sukses
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data dosen berhasil dihapus..</div>');
        redirect('Dosen');
    }
}
