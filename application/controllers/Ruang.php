<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruang extends CI_Controller
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
        $this->form_validation->set_rules('nama_ruang', 'Nama Ruang', 'required|trim');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|trim');
        $this->form_validation->set_rules('jenis_ruang', 'Jenis Ruang', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            //form validasi gagal
            //notif gagal form belum...!
            $data['title'] = 'Data Ruang';
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            //model get ruang
            $data['ruang'] = $this->Scheduler_Model->getAllRuang();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_data_ruang', $data);
            $this->load->view('templates/footer');
        } else {
            //form validasi sukses
            //model insert ruang
            $this->Scheduler_Model->insertRuang();

            //notif insert data sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data ruang telah ditambahkan..</div>');
            redirect('Ruang');
        }
    }

    public function edit_ruang($id_ruang)
    {
        //rules form edit !!!
        $this->form_validation->set_rules('nama_ruang', 'Nama Ruang', 'required|trim');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|trim');
        $this->form_validation->set_rules('jenis_ruang', 'Jenis Ruang', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            //notif gagal form belum...
            redirect('Ruang');
        } else {
            //form validasi sukses
            //model edit ruang
            $this->Scheduler_Model->editRuang($id_ruang);

            //notif edit data sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data ruang telah diupdate..</div>');
            redirect('Ruang');
        }
    }

    public function delete_ruang($id_ruang)
    {
        //model delete ruang
        $this->Scheduler_Model->deleteRuang($id_ruang);

        //notif delete sukses
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data ruang berhasil dihapus..</div>');
        redirect('Ruang');
    }
}
