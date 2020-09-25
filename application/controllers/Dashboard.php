<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //Session Login
        if (!$this->session->userdata('email')) {
            redirect('Auth/access_blocked');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';

        //ambil data session login
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('v_dashboard', $data);
        $this->load->view('templates/footer');
    }
}
