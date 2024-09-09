<?php

namespace App\Controllers;
use App\Models\BankModel;
use App\Models\KategoriModel;
use App\Models\transferModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class transfer extends BaseController
{
    public function index()
    {
        $transferModel = new transferModel();
        $data['transfer_data'] = $transferModel->findAll();
 
        return view('templates/header')
                .view('transfer', $data)
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
                .view('transfer_new', $data)
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
        
        $transferModel = new transferModel();
        $validation_rules = [
            'tanggal_transfer' => [
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
            'bank_asal_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bank Asal harus diisi'
                ]
            ],
            'bank_tujuan_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bank Tujuan harus diisi'
                ]
            ],
            'nominal_transfer' => [
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
            $transferModel->save($this->request->getVar());
            return redirect()->to('transfer');
        }else{
            $data['validation'] = $this->validator;

            return view('templates/header')
                .view('transfer_new', $data)
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

        $transfer = new transferModel();
        $data['transfer'] = $transfer->where('id', $id)->first();
        
        return view('templates/header')
                .view('transfer_edit', $data)
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

        $transferModel = new transferModel();
        $validation_rules = [
            'tanggal_transfer' => [
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
            'bank_asal_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bank Asal harus diisi'
                ]
            ],
            'bank_tujuan_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bank Tujuan harus diisi'
                ]
            ],
            'nominal_transfer' => [
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
            $transferModel->save($this->request->getVar());
            return redirect()->to('transfer');
        }else{
            $data['validation'] = $this->validator;
            $data['transfer'] = $transferModel->where('id', $id)->first();
            return view('templates/header')
                .view('transfer_edit', $data)
                .view('templates/footer');
        }        
    }

    public function delete($id)
    {
        $transferModel = new transferModel();

        $transfer = $transferModel->find($id);

        if($transfer) {
            $transferModel->delete($id);

            //flash message
            session()->setFlashdata('message', 'Data Berhasil Dihapus');

            return redirect()->to(base_url('transfer'));
        } else {
            return redirect()->to(base_url('transfer/edit/'.$id));
        }
    }
}
