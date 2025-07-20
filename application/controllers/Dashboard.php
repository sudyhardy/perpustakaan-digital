<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Book_model');
        $this->load->model('User_model');
        
        // Check if user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }

    public function index() {
        // Get dashboard statistics
        $data['total_books'] = $this->Book_model->count_books();
        $data['recent_books'] = $this->Book_model->get_books(5, 0); // Get 5 recent books
        $data['user_info'] = $this->session->userdata();
        
        // Get books by category for statistics
        $categories = array('Novel', 'Biografi', 'Teknologi', 'Pendidikan');
        $data['category_stats'] = array();
        
        foreach ($categories as $category) {
            $this->db->like('category', $category);
            $data['category_stats'][$category] = $this->db->count_all_results('books');
            $this->db->reset_query(); // Reset for next query
        }
        
        // Calculate some basic stats
        $data['total_categories'] = count(array_filter($data['category_stats']));
        $data['most_popular_category'] = array_keys($data['category_stats'], max($data['category_stats']))[0];
        
        // Load views
        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }
}
?>
