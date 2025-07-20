<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm mt-5">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">
                            <i class="fas fa-book"></i> Perpustakaan Digital
                        </h3>
                        
                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?= $this->session->flashdata('error') ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success">
                                <?= $this->session->flashdata('success') ?>
                            </div>
                        <?php endif; ?>
                        
                        <?= form_open('auth/login') ?>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" required>
                                <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required>
                                <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        <?= form_close() ?>
                        
                        <div class="text-center mt-3">
                            <small>Default login: <strong>admin</strong> / <strong>password</strong></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
