<div class="container-fluid p-3">
  <div class="row">
    <div class="col-12">
      <a href="<?= base_url('kategori/new') ?>" class="btn btn-primary">Kategori Baru</a>
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
            <th scope="col">Nama Kategori</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($kategori_data as $kategori) : ?>
            <tr>
              <th scope="row"><?= $no ?></th>
              <td><a class="btn btn-sm btn-outline-warning" href="<?= base_url('kategori/edit/' . $kategori['id']) ?>"><?= $kategori['nama_kategori'] ?></a></td>
              <td><?= $kategori['keterangan'] ?></td>
              <td> <a href="<?=base_url('kategori/delete/'.$kategori['id'])?>" type="submit" onclick="return confirm('Yakin akan menghapus data ini?');" class="btn btn-sm btn-outline-danger">Hapus</a></td>
            </tr>
          <?php
            $no++;
          endforeach ?>

          <!--  <tr>
      <th scope="row">1</th>
      <td><a href="<?= base_url('kategori/edit') ?>">Cash</a></td>
      <td>-</td>
      <td></td>
    </tr>
  -->
        </tbody>
      </table>
    </div>
  </div>
</div>