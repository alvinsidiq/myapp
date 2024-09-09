<?php

namespace App\Models;

use CodeIgniter\Model;

class PengeluaranModel extends Model
{
    protected $table      = 'pengeluaran';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['tanggal_pengeluaran', 'kategori_id', 'bank_id', 'nominal_pengeluaran','keterangan'];

    function sumPengeluaran()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pengeluaran');

        $builder->selectSum('nominal_pengeluaran');
        $query = $builder->get();

        return $query->getRow();
    }
}
