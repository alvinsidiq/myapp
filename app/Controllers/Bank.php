<?php

namespace App\Controllers;

use App\Models\BankModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Bank extends BaseController
{
    public function index()
    {
        $bankModel = new BankModel();
        $data['bank_data'] = $bankModel->findAll();

        return view('templates/header')
            
            . view('bank', $data)
            . view('templates/footer');
    }
    public function new()
    {
        return view('templates/header')
            . view('bank_new')
            . view('templates/footer');
    }

    public function store()
    {
        helper(['form']);
        $bankModel = new BankModel();
        $validation_rules = [
            'nama_bank' =>  [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Bank harus diisi'
                ]
            ],
            'nomor_rekening' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Rekening harus diisi'
                ],
            ],
        ];

        if ($this->validate($validation_rules)) {
            $bankModel->save($this->request->getVar());
            return redirect()->to('bank');
        } else {
            $data['validation'] = $this->validator;

            return view('templates/header')
                . view('bank_new', $data)
                . view('templates/footer');
        }
    }

    public function edit($id)
    {
        $bank = new BankModel();
        $data['bank'] = $bank->where('id', $id)->first();

        return view('templates/header')
            . view('bank_edit', $data)
            . view('templates/footer');
    }

    public function update($id)
    {
        helper(['form']);
        $bankModel = new BankModel();
        $validation_rules = [
            'nama_bank' =>  [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Bank harus diisi'
                ]
            ],
            'nomor_rekening' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Rekening harus diisi'
                ],
            ],
        ];

        if ($this->validate($validation_rules)) {
            $bankModel->save($this->request->getVar());
            return redirect()->to('bank');
        } else {
            $data['validation'] = $this->validator;
            $data['bank'] = $bankModel->where('id', $id)->first();
            return view('templates/header')
                . view('bank_edit', $data)
                . view('templates/footer');
        }
    }

    public function delete($id)
    {
        $bankModel = new BankModel();

        $bank = $bankModel->find($id);

        if ($bank) {
            $bankModel->delete($id);

            //flash message
            session()->setFlashdata('message', 'Data Berhasil Dihapus');

            return redirect()->to(base_url('bank'));
        } else {
            return redirect()->to(base_url('bank/edit/' . $id));
        }
    }
}
