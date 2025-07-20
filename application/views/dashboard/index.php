<!-- Welcome Section -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card bg-gradient-primary text-white">
            <div class="card-body py-5">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h2 class="mb-2">
                            <i class="fas fa-tachometer-alt me-2"></i>
                            Dashboard Perpustakaan Digital
                        </h2>
                        <p class="lead mb-0">
                            Selamat datang kembali, <strong><?= $user_info['username'] ?></strong>!
                        </p>
                        <p class="mb-0 opacity-75">
                            Kelola koleksi buku digital Anda dengan mudah dan efisien
                        </p>
                    </div>
                    <div class="col-md-4 text-end">
                        <i class="fas fa-book-open fa-4x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Buku
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= number_format($total_books) ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Kategori Aktif
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $total_categories ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-tags fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Kategori Populer
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $most_popular_category ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-star fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Status Sistem
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <span class="badge bg-success">Online</span>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-server fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions Section -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-bolt me-2"></i>Quick Actions
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="<?= base_url('index.php/books') ?>" class="btn btn-outline-primary w-100 py-3">
                            <i class="fas fa-list fa-2x d-block mb-2"></i>
                            <strong>Lihat Semua Buku</strong>
                            <small class="d-block text-muted">Kelola koleksi buku</small>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="<?= base_url('index.php/books/create') ?>" class="btn btn-outline-success w-100 py-3">
                            <i class="fas fa-plus-circle fa-2x d-block mb-2"></i>
                            <strong>Tambah Buku</strong>
                            <small class="d-block text-muted">Buku baru ke koleksi</small>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="<?= base_url('index.php/books/search') ?>" class="btn btn-outline-info w-100 py-3">
                            <i class="fas fa-search fa-2x d-block mb-2"></i>
                            <strong>Cari Buku</strong>
                            <small class="d-block text-muted">Temukan buku tertentu</small>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="<?= base_url('index.php/test') ?>" class="btn btn-outline-secondary w-100 py-3">
                            <i class="fas fa-tools fa-2x d-block mb-2"></i>
                            <strong>Test Database</strong>
                            <small class="d-block text-muted">Diagnostic tools</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">
    <!-- Recent Books Card -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-book-reader me-2"></i>Buku Terbaru
                </h6>
                <a href="<?= base_url('index.php/books') ?>" class="btn btn-sm btn-primary">
                    Lihat Semua
                </a>
            </div>
            <div class="card-body">
                <?php if (!empty($recent_books)): ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Kategori</th>
                                    <th>Tahun</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recent_books as $book): ?>
                                <tr>
                                    <td>
                                        <strong><?= htmlspecialchars($book->title) ?></strong>
                                        <?php if (!empty($book->isbn)): ?>
                                        <br><small class="text-muted">ISBN: <?= $book->isbn ?></small>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= htmlspecialchars($book->author) ?></td>
                                    <td>
                                        <span class="badge bg-secondary">
                                            <?= htmlspecialchars($book->category) ?>
                                        </span>
                                    </td>
                                    <td><?= $book->publication_year ?></td>
                                    <td>
                                        <a href="<?= base_url('index.php/books/edit/' . $book->id) ?>" 
                                           class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="text-center py-5">
                        <i class="fas fa-book fa-3x text-muted mb-3"></i>
                        <h5>Belum Ada Buku</h5>
                        <p class="text-muted">Tambahkan buku pertama untuk memulai perpustakaan digital Anda.</p>
                        <a href="<?= base_url('index.php/books/create') ?>" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Buku Pertama
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Statistics by Category -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-chart-pie me-2"></i>Statistik Kategori
                </h6>
            </div>
            <div class="card-body">
                <?php if (array_sum($category_stats) > 0): ?>
                    <?php foreach ($category_stats as $category => $count): ?>
                        <?php if ($count > 0): ?>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="fw-bold"><?= $category ?></span>
                                    <span class="badge bg-primary"><?= $count ?></span>
                                </div>
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar bg-primary" role="progressbar" 
                                         style="width: <?= ($count / $total_books) * 100 ?>%"
                                         aria-valuenow="<?= $count ?>" 
                                         aria-valuemin="0" 
                                         aria-valuemax="<?= $total_books ?>">
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="text-center py-4">
                        <i class="fas fa-chart-bar fa-2x text-muted mb-2"></i>
                        <p class="text-muted">Belum ada data statistik</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- User Info Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-user me-2"></i>Informasi Pengguna
                </h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <div class="avatar mb-3">
                        <i class="fas fa-user-circle fa-4x text-primary"></i>
                    </div>
                    <h5 class="mb-1"><?= $user_info['username'] ?></h5>
                    <p class="text-muted"><?= $user_info['email'] ?></p>
                    <span class="badge bg-<?= $user_info['role'] == 'admin' ? 'danger' : 'primary' ?> mb-3">
                        <?= ucfirst($user_info['role']) ?>
                    </span>
                    
                    <hr>
                    
                    <div class="row text-center">
                        <div class="col-6">
                            <strong class="d-block"><?= $total_books ?></strong>
                            <small class="text-muted">Total Buku</small>
                        </div>
                        <div class="col-6">
                            <strong class="d-block"><?= count($recent_books) ?></strong>
                            <small class="text-muted">Buku Terbaru</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
