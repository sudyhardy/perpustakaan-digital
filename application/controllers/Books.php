<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Book_model');
        $this->load->library('pagination');
        
        // Check if user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }

    public function index() {
        // Pagination configuration
        $config['base_url'] = base_url('index.php/books/index');
        $config['total_rows'] = $this->Book_model->count_books();
        $config['per_page'] = 10;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'per_page';
        $config['enable_query_strings'] = TRUE;
        
        // Pagination styling
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        // Get current page
        $page = $this->input->get('per_page');
        $page = $page ? $page : 1;
        
        // Calculate offset (ensure it's never negative)
        $offset = max(0, ($page - 1) * $config['per_page']);
        
        // Get books for current page
        $data['books'] = $this->Book_model->get_books($config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['total_books'] = $config['total_rows'];
        
        // Load views
        $this->load->view('templates/header', $data);
        $this->load->view('books/index', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('title', 'Judul', 'required');
            $this->form_validation->set_rules('author', 'Penulis', 'required');
            
            if ($this->form_validation->run()) {
                $data = array(
                    'title' => $this->input->post('title'),
                    'author' => $this->input->post('author'),
                    'isbn' => $this->input->post('isbn'),
                    'publisher' => $this->input->post('publisher'),
                    'publication_year' => $this->input->post('publication_year'),
                    'category' => $this->input->post('category'),
                    'description' => $this->input->post('description')
                );
                
                if ($this->Book_model->create_book($data)) {
                    $this->session->set_flashdata('success', 'Buku berhasil ditambahkan');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambahkan buku');
                }
                redirect('books');
            }
        }
        
        $this->load->view('templates/header');
        $this->load->view('books/create');
        $this->load->view('templates/footer');
    }

    public function edit($id) {
        $data['book'] = $this->Book_model->get_book($id);
        
        if (empty($data['book'])) {
            show_404();
        }
        
        if ($this->input->post()) {
            $this->form_validation->set_rules('title', 'Judul', 'required');
            $this->form_validation->set_rules('author', 'Penulis', 'required');
            
            if ($this->form_validation->run()) {
                $update_data = array(
                    'title' => $this->input->post('title'),
                    'author' => $this->input->post('author'),
                    'isbn' => $this->input->post('isbn'),
                    'publisher' => $this->input->post('publisher'),
                    'publication_year' => $this->input->post('publication_year'),
                    'category' => $this->input->post('category'),
                    'description' => $this->input->post('description')
                );
                
                if ($this->Book_model->update_book($id, $update_data)) {
                    $this->session->set_flashdata('success', 'Buku berhasil diperbarui');
                } else {
                    $this->session->set_flashdata('error', 'Gagal memperbarui buku');
                }
                redirect('books');
            }
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('books/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id) {
        if ($this->Book_model->delete_book($id)) {
            $this->session->set_flashdata('success', 'Buku berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus buku');
        }
        redirect('books');
    }

    public function search() {
        $search = $this->input->get('q');
        
        // Pagination for search
        $config['base_url'] = base_url('index.php/books/search');
        $config['total_rows'] = $this->Book_model->count_books($search);
        $config['per_page'] = 10;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'per_page';
        $config['reuse_query_string'] = TRUE;
        
        $this->pagination->initialize($config);
        
        $page = $this->input->get('per_page') ? $this->input->get('per_page') : 1;
        $offset = max(0, ($page - 1) * $config['per_page']);
        
        $data['books'] = $this->Book_model->get_books($config['per_page'], $offset, $search);
        $data['search_term'] = $search;
        $data['pagination'] = $this->pagination->create_links();
        $data['total_results'] = $config['total_rows'];
        
        $this->load->view('templates/header', $data);
        $this->load->view('books/search_results', $data);
        $this->load->view('templates/footer');
    }
}
?>
