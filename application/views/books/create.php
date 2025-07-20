<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-plus me-2"></i>Tambah Buku Baru
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <?= form_open('books/create', ['class' => 'needs-validation', 'novalidate' => '']) ?>
                            
                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <label for="title" class="form-label">Judul Buku <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control <?= form_error('title') ? 'is-invalid' : '' ?>" 
                                           id="title" name="title" value="<?= set_value('title') ?>" required>
                                    <?= form_error('title', '<div class="invalid-feedback">', '</div>') ?>
                                </div>
                                <div class="col-md-4">
                                    <label for="publication_year" class="form-label">Tahun Terbit</label>
                                    <input type="number" class="form-control" 
                                           id="publication_year" name="publication_year" 
                                           value="<?= set_value('publication_year') ?>" 
                                           min="1900" max="<?= date('Y') ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="author" class="form-label">Penulis <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control <?= form_error('author') ? 'is-invalid' : '' ?>" 
                                           id="author" name="author" value="<?= set_value('author') ?>" required>
                                    <?= form_error('author', '<div class="invalid-feedback">', '</div>') ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="publisher" class="form-label">Penerbit</label>
                                    <input type="text" class="form-control" 
                                           id="publisher" name="publisher" value="<?= set_value('publisher') ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="isbn" class="form-label">ISBN</label>
                                    <input type="text" class="form-control" 
                                           id="isbn" name="isbn" value="<?= set_value('isbn') ?>" 
                                           placeholder="978-xxx-xxx-xxx-x">
                                </div>
                                <div class="col-md-6">
                                    <label for="category" class="form-label">Kategori</label>
                                    <select class="form-select" id="category" name="category">
                                        <option value="">Pilih Kategori</option>
                                        <option value="Novel" <?= set_select('category', 'Novel') ?>>Novel</option>
                                        <option value="Biografi" <?= set_select('category', 'Biografi') ?>>Biografi</option>
                                        <option value="Teknologi" <?= set_select('category', 'Teknologi') ?>>Teknologi</option>
                                        <option value="Pendidikan" <?= set_select('category', 'Pendidikan') ?>>Pendidikan</option>
                                        <option value="Sejarah" <?= set_select('category', 'Sejarah') ?>>Sejarah</option>
                                        <option value="Sains" <?= set_select('category', 'Sains') ?>>Sains</option>
                                        <option value="Agama" <?= set_select('category', 'Agama') ?>>Agama</option>
                                        <option value="Lainnya" <?= set_select('category', 'Lainnya') ?>>Lainnya</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="description" name="description" 
                                          rows="4" placeholder="Tuliskan deskripsi singkat tentang buku ini..."><?= set_value('description') ?></textarea>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <hr class="my-4">
                                    <div class="d-flex justify-content-between">
                                        <a href="<?= base_url('index.php/books') ?>" class="btn btn-secondary">
                                            <i class="fas fa-arrow-left"></i> Kembali
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Simpan Buku
                                        </button>
                                    </div>
                                </div>
                            </div>

                        <?= form_close() ?>
                    </div>
                    
                    <!-- Sidebar with tips -->
                    <div class="col-md-4">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="card-title">
                                    <i class="fas fa-lightbulb text-warning"></i> Tips Menambah Buku
                                </h6>
                                <ul class="list-unstyled small">
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-1"></i>
                                        Pastikan judul dan penulis diisi dengan lengkap
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-1"></i>
                                        ISBN membantu identifikasi buku yang unik
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-1"></i>
                                        Pilih kategori yang sesuai untuk memudahkan pencarian
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-1"></i>
                                        Deskripsi yang baik membantu pembaca memahami isi buku
                                    </li>
                                </ul>
                                
                                <hr>
                                
                                <h6 class="card-title">
                                    <i class="fas fa-info-circle text-info"></i> Format ISBN
                                </h6>
                                <p class="small text-muted">
                                    Format: 978-xxx-xxx-xxx-x<br>
                                    Contoh: 978-979-21-2505-5
                                </p>
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
