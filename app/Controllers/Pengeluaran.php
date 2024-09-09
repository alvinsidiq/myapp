<?php

namespace App\Controllers;
use App\Models\BankModel;
use App\Models\KategoriModel;
use App\Models\PengeluaranModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class pengeluaran extends BaseController
{
    public function index()
    {
        $pengeluaranModel = new PengeluaranModel();
        $data['pengeluaran_data'] = $pengeluaranModel->findAll();
 
        return view('templates/header')
                .view('pengeluaran', $data)
                .view('templates/footer');
    }
    public function new()
    {
        helper('form');
        $kategoriModel = new KategoriModel();
        $kategori_data = $kategoriModel->findAll();
        $kategoriDropdown = array('' => 'Pilih ');
        foreach ($kategori_data as $kategori) {
            $kategoriDropdown[$kategori['id']] = $kategori['nama_kategori']; 
        }
        $data['kategoriDropdown'] = $kategoriDropdown;

        $bankModel = new BankModel();
        $bank_data = $bankModel->findAll();
        $bankDropdown = array('' => 'Pilih ');
        foreach ($bank_data as $bank) {
            $bankDropdown[$bank['id']] = $bank['nama_bank']; 
        }
        $data['bankDropdown'] = $bankDropdown;

        return view('templates/header')
                .view('pengeluaran_new', $data)
                .view('templates/footer');
    }

    public function store() {
        helper('form');
        $kategoriModel = new KategoriModel();
        $kategori_data = $kategoriModel->findAll();
        $kategoriDropdown = array('' => 'Pilih ');
        foreach ($kategori_data as $kategori) {
            $kategoriDropdown[$kategori['id']] = $kategori['nama_kategori']; 
        }
        $data['kategoriDropdown'] = $kategoriDropdown;

        $bankModel = new BankModel();
        $bank_data = $bankModel->findAll();
        $bankDropdown = array('' => 'Pilih ');
        foreach ($bank_data as $bank) {
            $bankDropdown[$bank['id']] = $bank['nama_bank']; 
        }
        $data['bankDropdown'] = $bankDropdown;
        
        $pengeluaranModel = new PengeluaranModel();
        $validation_rules = [
            'tanggal_pengeluaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal harus diisi'
                ]
            ],
            'kategori_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori harus diisi'
                ]
            ],
            'bank_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bank harus diisi'
                ]
            ],
            'nominal_pengeluaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nominal harus diisi'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan harus diisi'
                ]
            ],
        ];
          
        if($this->validate($validation_rules)){
            $pengeluaranModel->save($this->request->getVar());
            return redirect()->to('pengeluaran');
        }else{
            $data['validation'] = $this->validator;

            return view('templates/header')
                .view('pengeluaran_new', $data)
                .view('templates/footer');
        }        
    }

    public function edit($id)
    {
        helper('form');
        $kategoriModel = new KategoriModel();
        $kategori_data = $kategoriModel->findAll();
        $kategoriDropdown = array(null => 'Pilih Kategori');
        foreach ($kategori_data as $kategori) {
            $kategoriDropdown[$kategori['id']] = $kategori['nama_kategori']; 
        }
        $data['kategoriDropdown'] = $kategoriDropdown;

        $bankModel = new BankModel();
        $bank_data = $bankModel->findAll();
        $bankDropdown = array('' => 'Pilih ');
        foreach ($bank_data as $bank) {
            $bankDropdown[$bank['id']] = $bank['nama_bank']; 
        }
        $data['bankDropdown'] = $bankDropdown;

        $pengeluaran = new PengeluaranModel();
        $data['pengeluaran'] = $pengeluaran->where('id', $id)->first();
        
        return view('templates/header')
                .view('pengeluaran_edit', $data)
                .view('templates/footer');
    }

    public function update($id) {
        helper(['form']);
        $kategoriModel = new KategoriModel();
        $kategori_data = $kategoriModel->findAll();
        $kategoriDropdown = array(null => 'Pilih Kategori');
        foreach ($kategori_data as $kategori) {
            $kategoriDropdown[$kategori['id']] = $kategori['nama_kategori']; 
        }
        $data['kategoriDropdown'] = $kategoriDropdown;

        $bankModel = new BankModel();
        $bank_data = $bankModel->findAll();
        $bankDropdown = array('' => 'Pilih ');
        foreach ($bank_data as $bank) {
            $bankDropdown[$bank['id']] = $bank['nama_bank']; 
        }
        $data['bankDropdown'] = $bankDropdown;

        $pengeluaranModel = new pengeluaranModel();
        $validation_rules = [
            'tanggal_pengeluaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal harus diisi'
                ]
            ],
            'kategori_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori harus diisi'
                ]
            ],
            'bank_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bank harus diisi'
                ]
            ],
            'nominal_pengeluaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nominal harus diisi'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan harus diisi'
                ]
            ],
        ];
          
        if($this->validate($validation_rules)){
            $pengeluaranModel->save($this->request->getVar());
            return redirect()->to('pengeluaran');
        }else{
            $data['validation'] = $this->validator;
            $data['pengeluaran'] = $pengeluaranModel->where('id', $id)->first();
            return view('templates/header')
                .view('pengeluaran_edit', $data)
                .view('templates/footer');
        }        
    }

    public function delete($id)
    {
        $pengeluaranModel = new PengeluaranModel();

        $pengeluaran = $pengeluaranModel->find($id);

        if($pengeluaran) {
            $pengeluaranModel->delete($id);

            //flash message
            session()->setFlashdata('message', 'Data Berhasil Dihapus');

            return redirect()->to(base_url('pengeluaran'));
        } else {
            return redirect()->to(base_url('pengeluaran/edit/'.$id));
        }
    }
}
