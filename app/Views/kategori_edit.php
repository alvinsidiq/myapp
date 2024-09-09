<div class="container-fluid p-3">
  <div class="row">
    <div class="col-6 offset-3">
      <div class="card">
        <div class="card-body bg-dark text-white">
          <h5 class="card-title text-center">Kategori Detail</h5>
          <?php $validation = \Config\Services::validation(); ?>
          <form action="<?= base_url('kategori/update/'.$kategori['id']); ?>" method="post">
            <input type="hidden" name="id" value="<?= $kategori['id'] ?>">
            <div class="form-group">
              <label for="nama_kategori">Nama Kategori</label>
              <input type="text" class="form-control" name="nama_kategori" placeholder="" value="<?= $kategori['nama_kategori'] ?>">
              <!-- Error -->
              <?php if ($validation->getError('nama_kategori')) { ?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('nama_kategori'); ?>
                </div>
              <?php } ?>
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <input type="text" class="form-control" name="keterangan" placeholder="" value="<?= $kategori['keterangan'] ?>">
            </div>
            
            <a href="<?=base_url('kategori')?>"  class="btn btn-outline-danger mt-2">Batal</a>
            <button type="submit" class="btn btn-outline-primary mt-2">Simpan</button>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>