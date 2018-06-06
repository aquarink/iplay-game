<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('form_validation');
        $this->load->model('Admin_Model');
        
        $this->checkSessLogin();
    }
    
    public function checkSessLogin() {
        $checkLoginSession = $this->session->userdata('id_admin');
        if ($checkLoginSession != NULL) {
            redirect('dashboard');
        }
    }

    public function index() {
        $this->load->view('Login');
    }

    public function signin() {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Login');
        } else {
            $username = strtolower($this->input->post('username'));
            $password = md5($this->input->post('password'));

            $data['query'] = $this->Admin_Model->userCheck($username, $password);

            if (count($data['query']) > 0) {
                $this->session->set_userdata('id_admin', $data['query'][0]->id_user);
                $this->session->set_userdata('name', $data['query'][0]->user_name);
                $this->session->set_userdata('level', $data['query'][0]->level);

                redirect('dashboard');
            } else {
                redirect('login');
            }
        }
    }

}
