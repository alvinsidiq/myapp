<div class="container-fluid p-3">
  <div class="row">
    <div class="col-6 offset-3">
      <div class="card">
        <div class="card-body bg-secondary text-white">
          <h5 class="card-title text-center">Pemasukan Baru</h5>
          <?php $validation = \Config\Services::validation(); ?>
          <form action="<?= base_url('pemasukan/update/'.$pemasukan['id']); ?>" method="post">
          <input type="hidden" name="id" value="<?= $pemasukan['id'] ?>">
            <div class="form-group">
              <label for="tanggal_pemasukan">Tanggal Pemasukan</label>
              <div class="input-group date" id="datepicker">
                <input type="text" class="form-control" id="date" name="tanggal_pemasukan" value="<?= $pemasukan['tanggal_pemasukan'] ?>" />
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
              <?php echo form_dropdown('kategori_id',$kategoriDropdown,  $pemasukan['kategori_id'], array('class'=> 'form-control'))?>
              <!-- Error -->
              <?php if ($validation->getError('kategori_id')) { ?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('kategori_id'); ?>
                </div>
              <?php } ?>
            </div>
            <div class="form-group">
              <label for="bank_id">Bank</label>
              <?php echo form_dropdown('bank_id',$bankDropdown,  $pemasukan['bank_id'], array('class'=> 'form-control'))?>
              <!-- Error -->
              <?php if ($validation->getError('bank_id')) { ?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('bank_id'); ?>
                </div>
              <?php } ?>
            </div>
            <div class="form-group">
              <label for="nominal_pemasukan">Nominal</label>
              <input type="number" class="form-control" name="nominal_pemasukan" value="<?= $pemasukan['nominal_pemasukan'] ?>" placeholder="">
              <!-- Error -->
              <?php if ($validation->getError('nominal_pemasukan')) { ?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('nominal_pemasukan'); ?>
                </div>
              <?php } ?>
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <input type="text" class="form-control" name="keterangan" value="<?= $pemasukan['keterangan'] ?>" placeholder="">
            <!-- Error -->
            <?php if ($validation->getError('keterangan')) { ?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('keterangan'); ?>
                </div>
              <?php } ?>
            </div>
            <a href="<?=base_url('pemasukan')?>"  class="btn btn-otline-danger mt-2">Batal</a>
            <button type="submit" class="btn btn-outline-primary mt-2">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>