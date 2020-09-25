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
    }

    public function index()
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
