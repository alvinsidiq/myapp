<?php

namespace App\Models;

use CodeIgniter\Model;

class BankModel extends Model
{
    protected $table      = 'bank';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['nama_bank', 'nomor_rekening', 'keterangan'];
}
