<?php

namespace App\Models;

use CodeIgniter\Model;

class TransferModel extends Model
{
    protected $table      = 'transfer';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['tanggal_transfer', 'kategori_id', 'bank_asal_id','bank_tujuan_id','keterangan','nominal_transfer'];
}
