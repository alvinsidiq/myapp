<div class="container-fluid p-3">
  <div class="row">
    <div class="col-4">
      <div class="card text-white bg-primary mb-3">
        <div class="card-body ">
          <h5 class="card-title">Pemasukan</h5>
          <p class="card-text">Rp. <?=number_format($pemasukan->nominal_pemasukan, '0', ',', '.')?></p>
        </div>
      </div>
    </div>

    <div class="col-4">
      <div class="card text-white bg-danger mb-3" >
        <div class="card-body">
          <h5 class="card-title">Pengeluaran</h5>
          <p class="card-text">Rp. <?=number_format($pengeluaran->nominal_pengeluaran, '0', ',', '.')?></p>
        </div>
      </div>
    </div>

    <div class="col-4">
      <div class="card text-white bg-success mb-3" >
        <div class="card-body">
          <h5 class="card-title">Saldo</h5>
          <p class="card-text">Rp. <?=number_format($saldo, '0', ',', '.')?></p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card text-white bg-info mb-3" >
        <div class="card-body">
          <h5 class="card-title text-center">Aplikasi Pencatatan Keuangan</h5>
          <p class="card-text"></p>
        </div>
      </div>
    </div>
  </div>
</div>