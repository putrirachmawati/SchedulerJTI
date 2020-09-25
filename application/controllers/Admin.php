<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if (!$this->session->userdata('email')) {
            redirect('Auth/access_blocked');
        }
        $this->load->model('Scheduler_Model');
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('v_dashboard', $data);
        $this->load->view('templates/footer');
    }

    //Halaman Profil
    public function profile()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('v_profile', $data);
        $this->load->view('templates/footer');
    }

    public function edit_profile()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_profile_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email');
            $name = $this->input->post('name');

            //upload if there is an image
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/img/profile';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2048;
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('Admin/profile');
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('tb_user');

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Your profile has been updated</div>');
            redirect('Admin/profile');
        }
    }

    // Halaman Data Dosen
    public function data_dosen()
    {
        //Rules
        $this->form_validation->set_rules('nama_dosen', 'Nama Dosen', 'required|trim');
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');

        if ($this->form_validation->run() == False) {
            $data['title'] = 'Data Dosen';
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            //model get dosen
            $data['dosen'] = $this->Scheduler_Model->getAllDosen();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_data_dosen', $data);
            $this->load->view('templates/footer');
        } else {

            //model insert dosen
            $this->Scheduler_Model->insertDosen();

            // Notif Sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Dosen telah ditambahkan..</div>');
            redirect('Admin/data_dosen');
        }
    }

    public function edit_dosen($id_dosen)
    {
        //Rules
        $this->form_validation->set_rules('nama_dosen', 'Nama Dosen', 'required|trim');
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');

        if ($this->form_validation->run() == False) {

            //notif gagal
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Data Dosen gagal diupdate..</div>');
            redirect('Admin/data_dosen');
        } else {

            //model edit dosen
            $this->Scheduler_Model->editDosen($id_dosen);

            // Notif Sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Dosen telah diupdate..</div>');
            redirect('Admin/data_dosen');
        }
    }

    public function delete_dosen($id_dosen)
    {
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data dosen berhasil dihapus..</div>');
        $this->Scheduler_Model->deleteDosen($id_dosen);
        redirect('Admin/data_dosen');
    }

    // Halaman Mata Kuliah
    public function data_mata_kuliah()
    {
        $data['title'] = 'Data Mata Kuliah';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('v_data_mata_kuliah', $data);
        $this->load->view('templates/footer');
    }

    // Halaman Ruang
    public function data_ruang()
    {
        $data['title'] = 'Data Ruang';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('v_data_ruang', $data);
        $this->load->view('templates/footer');
    }
}
