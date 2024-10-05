<?php

namespace App\Models;

use CodeIgniter\Model;

class AktivitasModel extends Model
{
    protected $table = 'tb_aktivitas';
    protected $primaryKey = 'id_aktivitas';
    protected $returnType = 'object';
    protected $allowedFields = ['nama_aktivitas_in', 'nama_aktivitas_en', 'deskripsi_aktivitas_in', 'deskripsi_aktivitas_en', 'slug_id', 'slug_en', 'foto_aktivitas', 'meta_title_id', 'meta_description_id', 'meta_title_en', 'meta_description_en'];

    public function getDetailAktivitas($slug)
    {
        return $this->where('slug_id', $slug)
            ->orWhere('slug_en', $slug)
            ->first();
    }
}
