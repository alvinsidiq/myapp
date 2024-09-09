<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>MyApp</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MyAPP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url('dashboard');?>">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('pemasukan')?>">Pemasukan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('pengeluaran')?>">Pengeluaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('transfer')?>">Transfer</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Master Data
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="<?=base_url('bank')?>">Bank</a></li>
            <li><a class="dropdown-item" href="<?=base_url('kategori')?>">Kategori</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">User</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
