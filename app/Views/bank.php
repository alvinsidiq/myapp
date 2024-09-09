<div class="container-fluid p-3">
  <div class="row">
    <div class="col-12">
      <a href="<?= base_url('bank/new') ?>" class="btn btn-outline-primary">Bank Baru</a>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <?php if (!empty(session()->getFlashdata('message'))) : ?>

        <div class="alert alert-success">
          <?php echo session()->getFlashdata('message'); ?>
        </div>

      <?php endif ?>
      <table class="table table-bordered bg-dark text-white">
        <thead>
          
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Bank</th>
            <th scope="col">Nomor Rekening</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($bank_data as $bank) : ?>
            <tr>
              <th scope="row"><?= $no ?></th>
              <td><a class="btn btn-sm btn-outline-warning" href="<?= base_url('bank/edit/' . $bank['id']) ?>"><?= $bank['nama_bank'] ?></a></td>
              <td><?= $bank['nomor_rekening'] ?></td>
              <td><?= $bank['keterangan'] ?></td>
              <td> <a href="<?=base_url('bank/delete/'.$bank['id'])?>" type="submit" onclick="return confirm('Yakin akan menghapus data ini?');" class="btn btn-sm btn-outline-danger">Hapus</a></td>
              
            </tr>
          <?php
            $no++;
          endforeach ?>

          <!--  <tr>
      <th scope="row">1</th>
      <td><a href="<?= base_url('bank/edit') ?>">Cash</a></td>
      <td>-</td>
      <td></td>
    </tr>
  -->
        </tbody>
      </table>
    </div>
  </div>
</div>