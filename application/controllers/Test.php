<?php
class Test extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Book_model');
    }
    
    public function index() {
        echo "<h1>Database Connection Test</h1>";
        
        // Test getting books
        $books = $this->Book_model->get_books();
        
        echo "<h2>Books in Database:</h2>";
        echo "<ul>";
        foreach ($books as $book) {
            echo "<li><strong>" . $book->title . "</strong> by " . $book->author . " (" . $book->publication_year . ")</li>";
        }
        echo "</ul>";
        
        echo "<p>Total books: " . $this->Book_model->count_books() . "</p>";
        echo "<p><strong>✅ Database connection and model working perfectly!</strong></p>";
    }
}
?>
