<div class="container-fluid p-3">
  <div class="row">
    <div class="col-12">
      <a href="<?= base_url('pemasukan/new') ?>" class="btn btn-outline-primary">Pemasukan Baru</a>
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
            <th scope="col">NO</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Kategori</th>
            <th scope="col">Bank</th>
            <th scope="col">Keterangan</th>
            <th scope="col" style="text-align: right;">Nominal</th>
            <th scope="col" style="text-align: center;">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $kategoriModel = new  App\Models\kategoriModel();
          $bankModel = new  App\Models\BankModel();
          

          $no = 1;
          foreach ($pemasukan_data as $pemasukan) : 
            $nama_kategori = $kategoriModel->where('id', $pemasukan['kategori_id'])->first()['nama_kategori'];
            $nama_bank = $bankModel->where('id', $pemasukan['bank_id'])->first()['nama_bank'];
            $date = date_create($pemasukan['tanggal_pemasukan']);
            $tanggal = date_format($date, "d-m-Y");
          ?>
            <tr>
              <th scope="row"><?= $no ?></th>
              <td><a class="btn btn-sm btn-outline-warning" href="<?= base_url('pemasukan/edit/' . $pemasukan['id']) ?>"><?= $tanggal ?></a></td>
              <td><?= $nama_kategori ?></td>
              <td><?= $nama_bank ?></td>
              <td><?= $pemasukan['keterangan'] ?></td>
              <td style="text-align: right;"><?= number_format($pemasukan['nominal_pemasukan']) ?></td>
              <td style="text-align: center;"> <a href="<?= base_url('pemasukan/delete/' . $pemasukan['id']) ?>" type="submit" onclick="return confirm('Yakin akan menghapus data ini?');" class="btn btn-sm btn-outline-danger">Hapus</a></td>
            </tr>
          <?php
            $no++;
          endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>