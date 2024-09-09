<div class="container-fluid p-3">
  <div class="row">
    <div class="col-6 offset-3">
      <div class="card">
        <div class="card-body bg-success text-white">
          <h5 class="card-title text-center">Bank Baru</h5>
          <?php $validation = \Config\Services::validation(); ?>
          <form action="<?= base_url('bank/store'); ?>" method="post">
            <div class="form-group">
              <label for="nama_bank">Nama Bank</label>
              <input type="text" class="form-control" name="nama_bank" placeholder="">
              <!-- Error -->
              <?php if ($validation->getError('nama_bank')) { ?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('nama_bank'); ?>
                </div>
              <?php } ?>
            </div>
            <div class="form-group">
              <label for="nomor_rekening">Nomor Rekening</label>
              <input type="text" class="form-control" name="nomor_rekening" placeholder="">
               <!-- Error -->
               <?php if ($validation->getError('nomor_rekening')) { ?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('nomor_rekening'); ?>
                </div>
              <?php } ?>
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <input type="text" class="form-control" name="keterangan" placeholder="">
            </div>
            <a href="<?=base_url('bank')?>"  class="btn btn-outline-danger mt-2">Batal</a>
            <button type="submit" class="btn btn-outline-primary mt-2">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>