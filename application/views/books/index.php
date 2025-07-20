<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Kelola Buku Digital</h2>
            <a href="<?= base_url('index.php/books/create') ?>" class="btn btn-success">
                <i class="fas fa-plus"></i> Tambah Buku
            </a>
        </div>
        
        <!-- Search Form -->
        <div class="card mb-4">
            <div class="card-body">
                <?= form_open('books/search', ['method' => 'GET', 'class' => 'row g-3']) ?>
                    <div class="col-md-8">
                        <input type="text" name="q" class="form-control" 
                               placeholder="Cari berdasarkan judul, penulis, atau kategori..." 
                               value="<?= $this->input->get('q') ?>">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Cari
                        </button>
                        <a href="<?= base_url('index.php/books') ?>" class="btn btn-outline-secondary">Reset</a>
                    </div>
                <?= form_close() ?>
            </div>
        </div>
        
        <!-- Books Table -->
        <div class="card">
            <div class="card-body">
                <?php if (!empty($books)): ?>
                    <p class="text-muted">Total: <?= $total_books ?> buku</p>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Kategori</th>
                                    <th>Tahun</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($books as $index => $book): ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= htmlspecialchars($book->title) ?></td>
                                    <td><?= htmlspecialchars($book->author) ?></td>
                                    <td><?= htmlspecialchars($book->category) ?></td>
                                    <td><?= $book->publication_year ?></td>
                                    <td>
                                        <a href="<?= base_url('index.php/books/edit/' . $book->id) ?>" 
                                           class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="<?= base_url('index.php/books/delete/' . $book->id) ?>" 
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Yakin ingin menghapus buku ini?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <?= $pagination ?>
                <?php else: ?>
                    <div class="text-center py-5">
                        <i class="fas fa-book fa-3x text-muted mb-3"></i>
                        <h4>Belum Ada Buku</h4>
                        <p class="text-muted">Mulai dengan menambahkan buku pertama ke perpustakaan digital Anda.</p>
                        <a href="<?= base_url('index.php/books/create') ?>" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Buku Pertama
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
