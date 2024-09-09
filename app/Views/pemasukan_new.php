<div class="container-fluid p-3">
  <div class="row">
    <div class="col-6 offset-3">
      <div class="card">
        <div class="card-body bg-success text-white">
          <h5 class="card-title text-center">Pemasukan Baru</h5>
          <?php $validation = \Config\Services::validation(); ?>
          <form action="<?= base_url('pemasukan/store'); ?>" method="post">
            <div class="form-group">
              <label for="tanggal_pemasukan">Tanggal Pemasukan</label>
              <div class="input-group date" id="datepicker">
                <input type="text" class="form-control" id="date" name="tanggal_pemasukan" />
                <span class="input-group-append">
                  <span class="input-group-text bg-light d-block">
                    <i class="fa fa-calendar"></i>
                  </span>
                </span>
              </div>
              <!-- Error -->
              <?php if ($validation->getError('tanggal_pemasukan')) { ?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('tanggal_pemasukan'); ?>
                </div>
              <?php } ?>
            </div>
            <div class="form-group">
              <label for="kategori_id">Kategori</label>
              <?php echo form_dropdown('kategori_id', $kategoriDropdown,  '', array('class' => 'form-control')) ?>
              <!-- Error -->
              <?php if ($validation->getError('kategori_id')) { ?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('kategori_id'); ?>
                </div>
              <?php } ?>
            </div>
            <div class="form-group">
              <label for="bank_id">Bank</label>
              <?php echo form_dropdown('bank_id', $bankDropdown,  '', array('class' => 'form-control')) ?>
              <!-- Error -->
              <?php if ($validation->getError('bank_id')) { ?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('bank_id'); ?>
                </div>
              <?php } ?>
            </div>
            <div class="form-group">
              <label for="nominal_pemasukan">Nominal</label>
              <input type="number" class="form-control" name="nominal_pemasukan" placeholder="">
              <!-- Error -->
              <?php if ($validation->getError('nominal_pemasukan')) { ?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('nominal_pemasukan'); ?>
                </div>
              <?php } ?>
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <input type="text" class="form-control" name="keterangan" placeholder="">
              <!-- Error -->
              <?php if ($validation->getError('keterangan')) { ?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('keterangan'); ?>
                </div>
              <?php } ?>
            </div>
            <a href="<?= base_url('pemasukan') ?>" class="btn btn-outline-danger mt-2">Batal</a>
            <button type="submit" class="btn btn-outline-primary mt-2">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>