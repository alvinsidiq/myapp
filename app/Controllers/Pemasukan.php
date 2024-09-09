<?php

namespace App\Controllers;
use App\Models\BankModel;
use App\Models\KategoriModel;
use App\Models\PemasukanModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Pemasukan extends BaseController
{
    public function index()
    {
        $pemasukanModel = new PemasukanModel();
        $data['pemasukan_data'] = $pemasukanModel->findAll();
 
        return view('templates/header')
                .view('pemasukan', $data)
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
                .view('pemasukan_new', $data)
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
        
        $pemasukanModel = new pemasukanModel();
        $validation_rules = [
            'tanggal_pemasukan' => [
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
            'nominal_pemasukan' => [
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
            $pemasukanModel->save($this->request->getVar());
            return redirect()->to('pemasukan');
        }else{
            $data['validation'] = $this->validator;

            return view('templates/header')
                .view('pemasukan_new', $data)
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

        $pemasukan = new pemasukanModel();
        $data['pemasukan'] = $pemasukan->where('id', $id)->first();
        
        return view('templates/header')
                .view('pemasukan_edit', $data)
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

        $pemasukanModel = new pemasukanModel();
        $validation_rules = [
            'tanggal_pemasukan' => [
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
            'nominal_pemasukan' => [
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
            $pemasukanModel->save($this->request->getVar());
            return redirect()->to('pemasukan');
        }else{
            $data['validation'] = $this->validator;
            $data['pemasukan'] = $pemasukanModel->where('id', $id)->first();
            return view('templates/header')
                .view('pemasukan_edit', $data)
                .view('templates/footer');
        }        
    }

    public function delete($id)
    {
        $pemasukanModel = new pemasukanModel();

        $pemasukan = $pemasukanModel->find($id);

        if($pemasukan) {
            $pemasukanModel->delete($id);

            //flash message
            session()->setFlashdata('message', 'Data Berhasil Dihapus');

            return redirect()->to(base_url('pemasukan'));
        } else {
            return redirect()->to(base_url('pemasukan/edit/'.$id));
        }
    }
}
