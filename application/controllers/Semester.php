<?php

class Semester extends CI_Controller
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
        $this->form_validation->set_rules('id_tahun_akademik', 'Tahun Akademik', 'required|trim');
        $this->form_validation->set_rules('nama_semester', 'Semester', 'required|trim');

        if ($this->form_validation->run() == False) {
            //form validasi gagal
            //notif gagal form belum...!
            $data['title'] = 'Data Semester';
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            //model get semester
            $data['semester'] = $this->Scheduler_Model->getAllSemester();
            $data['TahunAkademik'] = $this->Scheduler_Model->getAllTahunAkademik();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_data_semester', $data);
            $this->load->view('templates/footer');
        } else {
            //form validasi sukses
            //model insert semester
            $this->Scheduler_Model->insertSemester();

            //notif insert data sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data semester telah ditambahkan..</div>');
            redirect('Semester');
        }
    }

    public function edit_semester($id_semester)
    {
        //rules form edit !!!
        $this->form_validation->set_rules('id_tahun_akademik', 'Tahun Akademik', 'required|trim');
        $this->form_validation->set_rules('nama_semester', 'Nama Semester', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            //notif gagal form belum...
            redirect('Semester');
        } else {
            //form validasi sukses
            //model edit semester
            $this->Scheduler_Model->editSemester($id_semester);

            //notif edit data sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data semester telah diupdate..</div>');
            redirect('Semester');
        }
    }

    public function delete_semester($id_semester)
    {
        $this->Scheduler_Model->deleteSemester($id_semester);

        //notif delete sukses
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data semester berhasil dihapus..</div>');
        redirect('Semester');
    }
}
