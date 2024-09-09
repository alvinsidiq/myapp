<?php

namespace App\Controllers;
use App\Models\PemasukanModel;
use App\Models\PengeluaranModel;

class Dashboard extends BaseController
{
    public function index()
    {   
        $pemasukanModel = new PemasukanModel();
        $pengeluaranModel = new PengeluaranModel();
        $data['pemasukan'] = $pemasukanModel->sumPemasukan();
        $data['pengeluaran'] = $pengeluaranModel->sumPengeluaran();
        $data['saldo'] = $data['pemasukan']->nominal_pemasukan - $data['pengeluaran']->nominal_pengeluaran;
        

        return view('templates/header')
                .view('dashboard', $data)
                .view('templates/footer');
    }
}
