<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\ProfilModel;
use App\Models\SliderModel;
use App\Models\ProdukModel;
use App\Models\AktivitasModel;
use App\Models\MetaModel;

class Aktivitasctrl extends BaseController
{
    private $ProfilModel;
    private $SliderModel;
    private $ProdukModel;
    private $AktivitasModel;
    private $MetaModel;


    public function __construct()
    {
        $this->ProfilModel = new ProfilModel();
        $this->SliderModel = new SliderModel();
        $this->ProdukModel = new ProdukModel();
        $this->AktivitasModel = new AktivitasModel();
        $this->MetaModel = new MetaModel();
    }

    public function index()
    {
        $lang = session()->get('lang') ?? 'en';

        $meta = $this->MetaModel->where('nama_halaman', 'Klien')->first();

        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'tbproduk' => $this->ProdukModel->findAll(),
            'tbaktivitas' => $this->AktivitasModel->findAll(),
            'lang' => $lang,
            'meta' => $meta,
        ];

        helper('text');

        if (session('lang') === 'id') {
            $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
            $deskripsi_perusahaan = strip_tags($data['profil'][0]->deskripsi_perusahaan_in);

            $data['Title'] = $data['tbproduk']->nama_produk_in ?? 'Klien';
            $teks = "Klien dari $nama_perusahaan. $deskripsi_perusahaan";
        } else {
            $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
            $deskripsi_perusahaan = strip_tags($data['profil'][0]->deskripsi_perusahaan_en);

            $data['Title'] = $data['tbproduk']->nama_produk_en ?? 'Clients';
            $teks = "Clients of $nama_perusahaan. $deskripsi_perusahaan";
        }

        $batasan = 150;
        $data['Meta'] = character_limiter($teks, $batasan);

        // Set default title
        // $data['Title'] = lang('Blog.headerClients');

        return view('user/aktivitas/index', $data);
    }

    public function detail($slug_aktivitas)
    {
        // Cari aktivitas berdasarkan slug, bukan ID
        $aktivitas = $this->AktivitasModel->where('slug_id', $slug_aktivitas)
                                          ->orWhere('slug_en', $slug_aktivitas)
                                          ->first();
    
        if (!$aktivitas) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Aktivitas dengan slug $slug_aktivitas tidak ditemukan");
        }
    
        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbaktivitas' => $aktivitas,
        ];
    
        helper('text');
    
        // Tentukan nama dan deskripsi aktivitas berdasarkan bahasa
        if (session('lang') === 'id') {
            $nama_aktivitas = $data['tbaktivitas']->nama_aktivitas_in;
            $deskripsi_aktivitas = strip_tags($data['tbaktivitas']->deskripsi_aktivitas_in);
            
            $data['Title'] = $data['tbaktivitas']->nama_aktivitas_in ?? '';
            $teks = "$nama_aktivitas. $deskripsi_aktivitas";
        } else {
            $nama_aktivitas = $data['tbaktivitas']->nama_aktivitas_en;
            $deskripsi_aktivitas = strip_tags($data['tbaktivitas']->deskripsi_aktivitas_en);
    
            $data['Title'] = $data['tbaktivitas']->nama_aktivitas_en ?? '';
            $teks = "$nama_aktivitas. $deskripsi_aktivitas";
        }
    
        // Batasi meta description
        $batasan = 160;
        $data['Meta'] = character_limiter($teks, $batasan);
    
        return view('user/aktivitas/detail', $data);
    }
    
}
