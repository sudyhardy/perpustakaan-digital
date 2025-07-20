<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->login();
    }

    public function login() {
        // If already logged in, redirect to dashboard
        if ($this->session->userdata('user_id')) {
            redirect('dashboard');
        }
        
        if ($this->input->post()) {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            if ($this->form_validation->run()) {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                
                $user = $this->User_model->login($username, $password);
                
                if ($user) {
                    $session_data = array(
                        'user_id' => $user->id,
                        'username' => $user->username,
                        'email' => $user->email,
                        'role' => $user->role,
                        'logged_in' => TRUE
                    );
                    
                    $this->session->set_userdata($session_data);
                    $this->session->set_flashdata('success', 'Login berhasil!');
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('error', 'Username atau password salah');
                }
            }
        }
        
        $this->load->view('auth/login');
    }

    public function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('success', 'Anda telah berhasil logout');
        redirect('auth/login');
    }
}
