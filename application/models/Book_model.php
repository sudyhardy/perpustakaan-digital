<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Get all books with pagination and search
    public function get_books($limit = 10, $offset = 0, $search = '') {
        // Ensure offset is never negative
        $offset = max(0, (int)$offset);
        $limit = max(1, (int)$limit);
        
        if (!empty($search)) {
            $this->db->like('title', $search);
            $this->db->or_like('author', $search);
            $this->db->or_like('category', $search);
        }
        
        $this->db->limit($limit, $offset);
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('books');
        return $query->result();
    }

    // Count total books for pagination
    public function count_books($search = '') {
        if (!empty($search)) {
            $this->db->like('title', $search);
            $this->db->or_like('author', $search);
            $this->db->or_like('category', $search);
        }
        return $this->db->count_all_results('books');
    }

    // Get single book
    public function get_book($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('books');
        return $query->row();
    }

    // Create new book
    public function create_book($data) {
        return $this->db->insert('books', $data);
    }

    // Update book
    public function update_book($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('books', $data);
    }

    // Delete book
    public function delete_book($id) {
        $this->db->where('id', $id);
        return $this->db->delete('books');
    }
}
?>
