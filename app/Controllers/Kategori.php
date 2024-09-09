<?php

namespace App\Controllers;
use App\Models\KategoriModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Kategori extends BaseController
{
    public function index()
    {
        $kategoriModel = new KategoriModel();
        $data['kategori_data'] = $kategoriModel->findAll();
 
        return view('templates/header')
                .view('kategori', $data)
                .view('templates/footer');
    }
    public function new()
    {
        return view('templates/header')
                .view('kategori_new')
                .view('templates/footer');
    }

    public function store() {
        helper(['form']);
        $kategoriModel = new kategoriModel();
        $validation_rules = [
            'nama_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kategori harus diisi'
                ]
            ],
        ];
          
        if($this->validate($validation_rules)){
            $kategoriModel->save($this->request->getVar());
            return redirect()->to('kategori');
        }else{
            $data['validation'] = $this->validator;

            return view('templates/header')
                .view('kategori_new', $data)
                .view('templates/footer');
        }        
    }

    public function edit($id)
    {
        $kategori = new kategoriModel();
        $data['kategori'] = $kategori->where('id', $id)->first();
        
        return view('templates/header')
                .view('kategori_edit', $data)
                .view('templates/footer');
    }

    public function update($id) {
        helper(['form']);
        $kategoriModel = new kategoriModel();
        $validation_rules = [
            'nama_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kategori harus diisi'
                ]
            ],
        ];
          
        if($this->validate($validation_rules)){
            $kategoriModel->save($this->request->getVar());
            return redirect()->to('kategori');
        }else{
            $data['validation'] = $this->validator;
            $data['kategori'] = $kategoriModel->where('id', $id)->first();
            return view('templates/header')
                .view('kategori_edit', $data)
                .view('templates/footer');
        }        
    }

    public function delete($id)
    {
        $kategoriModel = new kategoriModel();

        $kategori = $kategoriModel->find($id);

        if($kategori) {
            $kategoriModel->delete($id);

            //flash message
            session()->setFlashdata('message', 'Data Berhasil Dihapus');

            return redirect()->to(base_url('kategori'));
        } else {
            return redirect()->to(base_url('kategori/edit/'.$id));
        }
    }
}
