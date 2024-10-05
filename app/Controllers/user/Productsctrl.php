<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\MetaModel;
use App\Models\ProfilModel;
use App\Models\SliderModel;
use App\Models\ProdukModel;

class Productsctrl extends BaseController
{
    private $ProfilModel;
    private $SliderModel;
    private $ProdukModel;
    private $MetaModel;

    public function __construct()
    {
        $this->ProfilModel = new ProfilModel();
        $this->SliderModel = new SliderModel();
        $this->ProdukModel = new ProdukModel();
        $this->MetaModel = new MetaModel();
    }

    public function index()
    {
        $lang = session()->get('lang') ?? 'en';

        $meta = $this->MetaModel->where('nama_halaman', 'Materi Pelatihan')->first();

        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'tbproduk' => $this->ProdukModel->findAll(),
            'lang' => $lang,
            'meta' => $meta
        ];

        helper('text');

        if (session('lang') === 'id') {
            $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
            $deskripsi_perusahaan = strip_tags($data['profil'][0]->deskripsi_perusahaan_in);

            $data['Title'] = $data['tbproduk']->nama_produk_in ?? 'Materi Pelatihan';
            $teks = "Materi Pelatihan dari $nama_perusahaan. $deskripsi_perusahaan";
        } else {
            $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
            $deskripsi_perusahaan = strip_tags($data['profil'][0]->deskripsi_perusahaan_en);

            $data['Title'] = $data['tbproduk']->nama_produk_en ?? 'Training Topics';
            $teks = "Training Topics of $nama_perusahaan. $deskripsi_perusahaan";
        }

        $batasan = 150;
        $data['Meta'] = character_limiter($teks, $batasan);

        // Set default title
        // $data['Title'] = lang('Blog.headerTraining');

        return view('user/products/index', $data);
    }

    public function detail($slug_produk)
    {
        // Cari produk berdasarkan slug
        $produk = $this->ProdukModel->where('slug_id', $slug_produk)
            ->orWhere('slug_en', $slug_produk)
            ->first();

        // Jika produk tidak ditemukan, tampilkan halaman 404
        if (!$produk) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Produk dengan slug $slug_produk tidak ditemukan");
        }

        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbproduk' => $produk,  // Menggunakan produk yang ditemukan berdasarkan slug
        ];

        helper('text');

        // Tentukan nama dan deskripsi produk berdasarkan bahasa
        if (session('lang') === 'id') {
            $nama_produk = $data['tbproduk']->nama_produk_in;
            $deskripsi_produk = strip_tags($data['tbproduk']->deskripsi_produk_in);

            $data['Title'] = $data['tbproduk']->nama_produk_in ?? '';
            $teks = "$nama_produk. $deskripsi_produk";
        } else {
            $nama_produk = $data['tbproduk']->nama_produk_en;
            $deskripsi_produk = strip_tags($data['tbproduk']->deskripsi_produk_en);

            $data['Title'] = $data['tbproduk']->nama_produk_en ?? '';
            $teks = "$nama_produk. $deskripsi_produk";
        }

        // Batasi meta description
        $batasan = 160;
        $data['Meta'] = character_limiter($teks, $batasan);

        return view('user/products/detail', $data);
    }
}
