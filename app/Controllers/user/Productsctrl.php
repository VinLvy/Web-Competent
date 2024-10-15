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

        return view('user/products/index', $data);
    }

    public function detail($slug_produk)
    {
        // Ambil bahasa yang disimpan di session, default ke 'id' jika tidak ada
        $lang = session()->get('lang') ?? 'id';

        // Cari produk berdasarkan slug ID (Bahasa Indonesia) atau slug EN (Bahasa Inggris)
        $produk = $this->ProdukModel->where('slug_id', $slug_produk)
            ->orWhere('slug_en', $slug_produk)
            ->first();

        // Jika produk tidak ditemukan, tampilkan halaman 404
        if (!$produk) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Produk dengan slug $slug_produk tidak ditemukan");
        }

        // Tentukan slug yang benar berdasarkan bahasa yang dipilih
        $slug_id = $produk->slug_id;
        $slug_en = $produk->slug_en;
        $slug_baru = ($lang === 'id') ? $slug_id : $slug_en;

        // Tentukan prefix URL berdasarkan bahasa
        $prefix_url = ($lang === 'id') ? 'materi-pelatihan' : 'training-topics';

        // Jika slug di URL tidak sesuai dengan bahasa yang dipilih, redirect ke slug yang benar
        if ($slug_produk !== $slug_baru) {
            return redirect()->to(base_url($lang . '/' . $prefix_url . '/' . $slug_baru));
        }

        // Tentukan nama dan deskripsi produk berdasarkan bahasa
        $nama_produk = $lang === 'id' ? $produk->nama_produk_in : $produk->nama_produk_en;
        $deskripsi_produk = $lang === 'id' ? $produk->deskripsi_produk_in : $produk->deskripsi_produk_en;

        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbproduk' => $produk,  // Produk ditemukan
            'nama_produk' => $nama_produk,
            'deskripsi_produk' => $deskripsi_produk,
            'lang' => $lang, // Kirim variabel bahasa ke view
        ];

        helper('text');

        // Set meta description berdasarkan bahasa session
        $metaDescription = $this->generateMetaDescription($data);
        $data['Meta'] = character_limiter($metaDescription, 160);

        // Set judul halaman sesuai nama produk yang sesuai dengan bahasa
        $data['Title'] = $nama_produk ?: 'Detail Produk';

        return view('user/products/detail', $data);
    }

    private function generateMetaDescription($data)
    {
        $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
        $deskripsi_perusahaan = session('lang') === 'id' ?
            strip_tags($data['profil'][0]->deskripsi_perusahaan_in) :
            strip_tags($data['profil'][0]->deskripsi_perusahaan_en);

        $teks = session('lang') === 'id' ?
            "Produk dari $nama_perusahaan. $deskripsi_perusahaan" :
            "Products from $nama_perusahaan. $deskripsi_perusahaan";

        return $teks;
    }
}
