<div class="container-fluid p-3">
  <div class="row">
    <div class="col-12">
      <a href="<?= base_url('transfer/new') ?>" class="btn btn-outline-primary">transfer Baru</a>
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
            <th scope="col">tanggal</th>
            <th scope="col">kategori</th>
            <th scope="col">Bank Asal</th>
            <th scope="col">Bank Tujuan</th>
            <th scope="col">Keterangan</th>
            <th scope="col">nominal</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $kategoriModel = new App\Models\kategoriModel();
          $bankModel = new  App\Models\BankModel();


          $no = 1;
          foreach ($transfer_data as $transfer) : 
            $nama_kategori = $kategoriModel->where('id', $transfer['kategori_id'])->first()['nama_kategori'];
            $nama_bank = $bankModel->where('id', $transfer['bank_asal_id'])->first()['nama_bank'];
            $nama_bank9 = $bankModel->where('id', $transfer['bank_tujuan_id'])->first()['nama_bank'];
            $date = date_create($transfer['tanggal_transfer']);
            $tanggal = date_format($date, "d-m-Y");
          ?>
            <tr>
              <th scope="row"><?= $no ?></th>
              <td><a class="btn btn-sm btn-outline-warning" href="<?= base_url('transfer/edit/' . $transfer['id']) ?>"><?= $tanggal ?></a></td>
              <td><?= $nama_kategori ?></td>
              <td><?= $nama_bank ?></td>
              <td><?= $nama_bank9 ?></td>
              <td><?= $transfer['keterangan'] ?></td>
              <td style="text-align: right;"><?= number_format($transfer['nominal_transfer']) ?></td>
              <td style="text-align: center;"> <a href="<?= base_url('transfer/delete/' . $transfer['id']) ?>" type="submit" onclick="return confirm('Yakin akan menghapus data ini?');" class="btn btn-sm btn-outline-danger">Hapus</a></td>
            </tr>
          <?php
            $no++;
          endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>