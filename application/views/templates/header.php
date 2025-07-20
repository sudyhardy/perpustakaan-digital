<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Buku Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<style>
    .bg-gradient-primary {
        background: linear-gradient(45deg, #4e73df, #224abe);
    }
    
    .border-left-primary {
        border-left: 0.25rem solid #4e73df !important;
    }
    
    .border-left-success {
        border-left: 0.25rem solid #1cc88a !important;
    }
    
    .border-left-info {
        border-left: 0.25rem solid #36b9cc !important;
    }
    
    .border-left-warning {
        border-left: 0.25rem solid #f6c23e !important;
    }
    
    .text-gray-800 {
        color: #5a5c69 !important;
    }
    
    .text-xs {
        font-size: 0.7rem;
    }
    
    .shadow {
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15) !important;
    }
    
    .card-header {
        background-color: #f8f9fc;
        border-bottom: 1px solid #e3e6f0;
    }
    
    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.025);
    }
    
    .progress {
        background-color: #f1f3f4;
    }
    
    .btn-outline-primary:hover,
    .btn-outline-success:hover,
    .btn-outline-info:hover,
    .btn-outline-secondary:hover {
        transform: translateY(-1px);
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }
    
    .quick-action-btn {
        transition: all 0.2s ease-in-out;
    }
    
    .avatar {
        display: inline-block;
    }
    
    .font-weight-bold {
        font-weight: 700 !important;
    }
    
    .no-gutters {
        margin-right: 0;
        margin-left: 0;
    }
    
    .no-gutters > .col,
    .no-gutters > [class*="col-"] {
        padding-right: 0;
        padding-left: 0;
    }
</style>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <i class="fas fa-book"></i> Perpustakaan Digital
            </a>
            
            <?php if ($this->session->userdata('logged_in')): ?>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="<?= base_url('index.php/dashboard') ?>">Dashboard</a>
                <a class="nav-link" href="<?= base_url('index.php/books') ?>">Kelola Buku</a>
                <span class="navbar-text me-3">
                    Welcome, <?= $this->session->userdata('username') ?>
                </span>
                <a class="nav-link" href="<?= base_url('index.php/auth/logout') ?>">Logout</a>
            </div>
            <?php endif; ?>
        </div>
    </nav>
    
    <div class="container mt-4">
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <?= $this->session->flashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <?= $this->session->flashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
