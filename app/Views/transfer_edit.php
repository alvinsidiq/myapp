<div class="container-fluid p-3">
  <div class="row">
    <div class="col-6 offset-3">
      <div class="card">
        <div class="card-body bg-secondary text-white">
          <h5 class="card-title text-center">transfer Baru</h5>
          <?php $validation = \Config\Services::validation(); ?>
          <form action="<?= base_url('transfer/update/'.$transfer['id']); ?>" method="post">
          <input type="hidden" name="id" value="<?= $transfer['id'] ?>">
            <div class="form-group">
              <label for="tanggal_transfer">Tanggal transfer</label>
              <div class="input-group date" id="datepicker">
                <input type="text" class="form-control" id="date" name="tanggal_transfer" value="<?= $transfer['tanggal_transfer'] ?>" />
                <span class="input-group-append">
                  <span class="input-group-text bg-light d-block">
                    <i class="fa fa-calendar"></i>
                  </span>
                </span>
              </div>
              <!-- Error -->
              <?php if ($validation->getError('tanggal_transfer')) { ?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('tanggal_transfer'); ?>
                </div>
              <?php } ?>
            </div>
            <div class="form-group">
              <label for="kategori_id">Kategori</label>
              <?php echo form_dropdown('kategori_id',$kategoriDropdown,  $transfer['kategori_id'], array('class'=> 'form-control'))?>
              <!-- Error -->
              <?php if ($validation->getError('kategori_id')) { ?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('kategori_id'); ?>
                </div>
              <?php } ?>
            </div>
            <div class="form-group">
              <label for="bank_asal_id">Bank Asal</label>
              <?php echo form_dropdown('bank_asal_id',$bankDropdown,  $transfer['bank_asal_id'], array('class'=> 'form-control'))?>
              <!-- Error -->
              <?php if ($validation->getError('bank_asal_id')) { ?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('bank_asal_id'); ?>
                </div>
              <?php } ?>
            </div>
            <div class="form-group">
              <label for="bank_tujuan_id">Bank</label>
              <?php echo form_dropdown('bank_tujuan_id',$bankDropdown,  $transfer['bank_asal_id'], array('class'=> 'form-control'))?>
              <!-- Error -->
              <?php if ($validation->getError('bank_tujuan_id')) { ?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('bank_tujuan_id'); ?>
                </div>
              <?php } ?>
            </div>
            <div class="form-group">
              <label for="nominal_transfer">Nominal</label>
              <input type="number" class="form-control" name="nominal_transfer" value="<?= $transfer['nominal_transfer'] ?>" placeholder="">
              <!-- Error -->
              <?php if ($validation->getError('nominal_transfer')) { ?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('nominal_transfer'); ?>
                </div>
              <?php } ?>
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <input type="text" class="form-control" name="keterangan" value="<?= $transfer['keterangan'] ?>" placeholder="">
            <!-- Error -->
            <?php if ($validation->getError('keterangan')) { ?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('keterangan'); ?>
                </div>
              <?php } ?>
            </div>
            <a href="<?=base_url('transfer')?>"  class="btn btn-outline-danger mt-2">Batal</a>
            <button type="submit" class="btn btn-outline-primary mt-2">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>