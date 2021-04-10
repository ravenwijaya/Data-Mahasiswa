<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table      = 'mahasiswa';
    //protected $primaryKey = 'nim';
    protected $allowedFields = ['nim', 'nama', 'kota_asal', 'tgl_lahir', 'nama_ortu', 'alamat_ortu', 'kode_pos', 'notelp', 'statuss'];
    public function getMahasiswa($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;



    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
}
