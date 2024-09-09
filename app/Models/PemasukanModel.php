<?php

namespace App\Models;

use CodeIgniter\Model;

class PemasukanModel extends Model
{
    protected $table      = 'pemasukan';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['tanggal_pemasukan', 'kategori_id', 'bank_id', 'keterangan', 'nominal_pemasukan'];

    function sumPemasukan()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pemasukan');

        $builder->selectSum('nominal_pemasukan');
        $query = $builder->get();

        return $query->getRow();
    }
}
