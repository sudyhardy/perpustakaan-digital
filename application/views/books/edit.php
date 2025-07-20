<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-edit me-2"></i>Edit Buku: <?= htmlspecialchars($book->title) ?>
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <?= form_open('books/edit/' . $book->id, ['class' => 'needs-validation', 'novalidate' => '']) ?>
                            
                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <label for="title" class="form-label">Judul Buku <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control <?= form_error('title') ? 'is-invalid' : '' ?>" 
                                           id="title" name="title" value="<?= set_value('title', $book->title) ?>" required>
                                    <?= form_error('title', '<div class="invalid-feedback">', '</div>') ?>
                                </div>
                                <div class="col-md-4">
                                    <label for="publication_year" class="form-label">Tahun Terbit</label>
                                    <input type="number" class="form-control" 
                                           id="publication_year" name="publication_year" 
                                           value="<?= set_value('publication_year', $book->publication_year) ?>" 
                                           min="1900" max="<?= date('Y') ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="author" class="form-label">Penulis <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control <?= form_error('author') ? 'is-invalid' : '' ?>" 
                                           id="author" name="author" value="<?= set_value('author', $book->author) ?>" required>
                                    <?= form_error('author', '<div class="invalid-feedback">', '</div>') ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="publisher" class="form-label">Penerbit</label>
                                    <input type="text" class="form-control" 
                                           id="publisher" name="publisher" value="<?= set_value('publisher', $book->publisher) ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="isbn" class="form-label">ISBN</label>
                                    <input type="text" class="form-control" 
                                           id="isbn" name="isbn" value="<?= set_value('isbn', $book->isbn) ?>" 
                                           placeholder="978-xxx-xxx-xxx-x">
                                </div>
                                <div class="col-md-6">
                                    <label for="category" class="form-label">Kategori</label>
                                    <select class="form-select" id="category" name="category">
                                        <option value="">Pilih Kategori</option>
                                        <option value="Novel" <?= set_select('category', 'Novel', ($book->category == 'Novel')) ?>>Novel</option>
                                        <option value="Biografi" <?= set_select('category', 'Biografi', ($book->category == 'Biografi')) ?>>Biografi</option>
                                        <option value="Teknologi" <?= set_select('category', 'Teknologi', ($book->category == 'Teknologi')) ?>>Teknologi</option>
                                        <option value="Pendidikan" <?= set_select('category', 'Pendidikan', ($book->category == 'Pendidikan')) ?>>Pendidikan</option>
                                        <option value="Sejarah" <?= set_select('category', 'Sejarah', ($book->category == 'Sejarah')) ?>>Sejarah</option>
                                        <option value="Sains" <?= set_select('category', 'Sains', ($book->category == 'Sains')) ?>>Sains</option>
                                        <option value="Agama" <?= set_select('category', 'Agama', ($book->category == 'Agama')) ?>>Agama</option>
                                        <option value="Lainnya" <?= set_select('category', 'Lainnya', ($book->category == 'Lainnya')) ?>>Lainnya</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="description" name="description" 
                                          rows="4" placeholder="Tuliskan deskripsi singkat tentang buku ini..."><?= set_value('description', $book->description) ?></textarea>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <hr class="my-4">
                                    <div class="d-flex justify-content-between">
                                        <a href="<?= base_url('index.php/books') ?>" class="btn btn-secondary">
                                            <i class="fas fa-arrow-left"></i> Kembali
                                        </a>
                                        <div>
                                            <button type="submit" class="btn btn-primary me-2">
                                                <i class="fas fa-save"></i> Update Buku
                                            </button>
                                            <a href="<?= base_url('index.php/books/delete/' . $book->id) ?>" 
                                               class="btn btn-danger"
                                               onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?= form_close() ?>
                    </div>
                    
                    <!-- Book Information Sidebar -->
                    <div class="col-md-4">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="card-title">
                                    <i class="fas fa-info-circle text-info"></i> Informasi Buku
                                </h6>
                                
                                <table class="table table-sm table-borderless">
                                    <tr>
                                        <td class="text-muted small">ID Buku:</td>
                                        <td class="small">#<?= $book->id ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted small">Dibuat:</td>
                                        <td class="small"><?= date('d/m/Y H:i', strtotime($book->created_at)) ?></td>
                                    </tr>
                                    <?php if ($book->updated_at && $book->updated_at != $book->created_at): ?>
                                    <tr>
                                        <td class="text-muted small">Diperbarui:</td>
                                        <td class="small"><?= date('d/m/Y H:i', strtotime($book->updated_at)) ?></td>
                                    </tr>
                                    <?php endif; ?>
                                </table>

                                <hr>

                                <h6 class="card-title">
                                    <i class="fas fa-exclamation-triangle text-warning"></i> Perhatian
                                </h6>
                                <ul class="list-unstyled small">
                                    <li class="mb-2">
                                        <i class="fas fa-info text-info me-1"></i>
                                        Perubahan akan disimpan secara permanen
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-trash text-danger me-1"></i>
                                        Penghapusan buku tidak dapat dibatalkan
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Form validation
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>
