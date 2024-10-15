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

        return view('user/aktivitas/index', $data);
    }

    public function detail($slug_aktivitas)
    {
        // Ambil bahasa dari session, default ke 'id' jika tidak ada
        $lang = session()->get('lang') ?? 'id';

        // Cari aktivitas berdasarkan slug untuk bahasa Indonesia dan Inggris
        $aktivitas = $this->AktivitasModel->where('slug_id', $slug_aktivitas)
            ->orWhere('slug_en', $slug_aktivitas)
            ->first();

        // Jika aktivitas tidak ditemukan, tampilkan halaman 404
        if (!$aktivitas) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Aktivitas dengan slug $slug_aktivitas tidak ditemukan");
        }

        // Tentukan slug yang benar sesuai bahasa yang dipilih
        $slug_id = $aktivitas->slug_id;
        $slug_en = $aktivitas->slug_en;
        $slug_baru = ($lang === 'id') ? $slug_id : $slug_en;

        // Tentukan prefix URL berdasarkan bahasa
        $prefix_url = ($lang === 'id') ? 'klien' : 'clients';

        // Jika slug di URL tidak sesuai dengan bahasa yang dipilih, redirect ke slug yang benar
        if ($slug_aktivitas !== $slug_baru) {
            return redirect()->to(base_url($lang . '/' . $prefix_url . '/' . $slug_baru));
        }

        // Tentukan nama dan deskripsi aktivitas berdasarkan bahasa
        $nama_aktivitas = $lang === 'id' ? $aktivitas->nama_aktivitas_in : $aktivitas->nama_aktivitas_en;
        $deskripsi_aktivitas = $lang === 'id' ? strip_tags($aktivitas->deskripsi_aktivitas_in) : strip_tags($aktivitas->deskripsi_aktivitas_en);

        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbaktivitas' => $aktivitas,  // Aktivitas ditemukan
            'nama_aktivitas' => $nama_aktivitas,
            'deskripsi_aktivitas' => $deskripsi_aktivitas,
            'lang' => $lang, // Kirim variabel bahasa ke view
        ];

        helper('text');

        // Batasi meta description berdasarkan bahasa
        $teks = "$nama_aktivitas. $deskripsi_aktivitas";
        $batasan = 160;
        $data['Meta'] = character_limiter($teks, $batasan);

        // Set judul halaman sesuai nama aktivitas yang sesuai dengan bahasa
        $data['Title'] = $nama_aktivitas ?: 'Detail Aktivitas';

        return view('user/aktivitas/detail', $data);
    }
}
