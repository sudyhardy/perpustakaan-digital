<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-search me-2"></i>Hasil Pencarian
                    <?php if (!empty($search_term)): ?>
                        untuk "<strong><?= htmlspecialchars($search_term) ?></strong>"
                    <?php endif; ?>
                </h6>
            </div>
            <div class="card-body">
                <!-- Search Form -->
                <div class="card bg-light mb-4">
                    <div class="card-body">
                        <?= form_open('books/search', ['method' => 'GET', 'class' => 'row g-3']) ?>
                            <div class="col-md-8">
                                <input type="text" name="q" class="form-control" 
                                       placeholder="Cari berdasarkan judul, penulis, atau kategori..." 
                                       value="<?= htmlspecialchars($search_term) ?>">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i> Cari
                                </button>
                                <a href="<?= base_url('index.php/books') ?>" class="btn btn-outline-secondary">
                                    <i class="fas fa-times"></i> Reset
                                </a>
                            </div>
                        <?= form_close() ?>
                    </div>
                </div>

                <!-- Results Summary -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <?php if (!empty($search_term)): ?>
                            <p class="text-muted mb-0">
                                Ditemukan <strong><?= $total_results ?></strong> buku 
                                untuk pencarian "<strong><?= htmlspecialchars($search_term) ?></strong>"
                            </p>
                        <?php else: ?>
                            <p class="text-muted mb-0">Menampilkan semua buku</p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <a href="<?= base_url('index.php/books/create') ?>" class="btn btn-success">
                            <i class="fas fa-plus"></i> Tambah Buku
                        </a>
                    </div>
                </div>

                <!-- Search Results -->
                <?php if (!empty($books)): ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
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
                                    <td>
                                        <strong><?= htmlspecialchars($book->title) ?></strong>
                                        <?php if (!empty($book->isbn)): ?>
                                            <br><small class="text-muted">ISBN: <?= $book->isbn ?></small>
                                        <?php endif; ?>
                                        <?php if (!empty($book->description)): ?>
                                            <br><small class="text-muted"><?= substr(htmlspecialchars($book->description), 0, 100) ?>...</small>
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
                                        <div class="btn-group" role="group">
                                            <a href="<?= base_url('index.php/books/edit/' . $book->id) ?>" 
                                               class="btn btn-sm btn-outline-primary" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('index.php/books/delete/' . $book->id) ?>" 
                                               class="btn btn-sm btn-outline-danger" title="Hapus"
                                               onclick="return confirm('Yakin ingin menghapus buku <?= htmlspecialchars($book->title) ?>?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <?php if (!empty($pagination)): ?>
                        <div class="d-flex justify-content-center mt-4">
                            <?= $pagination ?>
                        </div>
                    <?php endif; ?>

                <?php else: ?>
                    <!-- No Results -->
                    <div class="text-center py-5">
                        <i class="fas fa-search fa-3x text-muted mb-3"></i>
                        <h4>Tidak Ada Hasil</h4>
                        <?php if (!empty($search_term)): ?>
                            <p class="text-muted">
                                Tidak ditemukan buku yang sesuai dengan pencarian 
                                "<strong><?= htmlspecialchars($search_term) ?></strong>"
                            </p>
                            <div class="mt-3">
                                <a href="<?= base_url('index.php/books') ?>" class="btn btn-primary">
                                    <i class="fas fa-list"></i> Lihat Semua Buku
                                </a>
                                <a href="<?= base_url('index.php/books/create') ?>" class="btn btn-success">
                                    <i class="fas fa-plus"></i> Tambah Buku Baru
                                </a>
                            </div>
                        <?php else: ?>
                            <p class="text-muted">Belum ada buku dalam database.</p>
                            <a href="<?= base_url('index.php/books/create') ?>" class="btn btn-success">
                                <i class="fas fa-plus"></i> Tambah Buku Pertama
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <!-- Back to Books -->
                <hr class="my-4">
                <div class="text-center">
                    <a href="<?= base_url('index.php/books') ?>" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali ke Daftar Buku
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
