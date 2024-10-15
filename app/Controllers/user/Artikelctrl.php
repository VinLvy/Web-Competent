<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\ProfilModel;
use App\Models\SliderModel;
use App\Models\ArtikelModel;
use App\Models\MetaModel;

class Artikelctrl extends BaseController
{
    private $ProfilModel;
    private $SliderModel;
    private $ArtikelModel;
    private $MetaModel;

    public function __construct()
    {
        $this->ProfilModel = new ProfilModel();
        $this->SliderModel = new SliderModel();
        $this->ArtikelModel = new ArtikelModel();
        $this->MetaModel = new MetaModel();
    }

    public function index()
    {
        // Ambil bahasa dari session, default 'en'
        $lang = session()->get('lang') ?? 'en';

        $meta = $this->MetaModel->where('nama_halaman', 'Blog')->first();

        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'artikelterbaru' => $this->ArtikelModel->getArtikelTerbaru(),
            'lang' => $lang,
            'meta' => $meta
        ];

        helper('text');

        // Set meta description berdasarkan bahasa session
        $metaDescription = $this->generateMetaDescription($data);
        $data['Meta'] = character_limiter($metaDescription, 150);

        // Set judul halaman berdasarkan bahasa
        $data['Title'] = lang('Blog.headerBlogs');

        return view('user/artikel/index', $data);
    }



    public function detail($slug_artikel)
    {
        $lang = session()->get('lang') ?? 'en';

        // Cari artikel berdasarkan slug ID (Bahasa Indonesia) atau slug EN (Bahasa Inggris)
        $artikel = $this->ArtikelModel->where('slug_id', $slug_artikel)
            ->orWhere('slug_en', $slug_artikel)
            ->first();

        if (!$artikel) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Artikel dengan slug $slug_artikel tidak ditemukan");
        }

        // Tentukan slug yang benar berdasarkan bahasa yang dipilih
        $slug_id = $artikel->slug_id;
        $slug_en = $artikel->slug_en;
        $slug_baru = ($lang === 'id') ? $slug_id : $slug_en;

        // Tentukan prefix URL berdasarkan bahasa
        $prefix_url = ($lang === 'id') ? 'blog' : 'blogs';

        // Jika slug di URL tidak sesuai dengan bahasa yang dipilih, redirect ke slug yang benar
        if ($slug_artikel !== $slug_baru) {
            return redirect()->to(base_url($lang . '/' . $prefix_url . '/' . $slug_baru));
        }

        // Tentukan bahasa konten yang akan ditampilkan
        $judul_artikel = $lang === 'in' ? $artikel->judul_artikel : $artikel->judul_artikel_en;
        $deskripsi_artikel = $lang === 'in' ? $artikel->deskripsi_artikel : $artikel->deskripsi_artikel_en;

        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'artikel' => $artikel,
            'artikel_lain' => $this->ArtikelModel->getArtikelLainnya($artikel->id_artikel, 4),
            'judul_artikel' => $judul_artikel,
            'deskripsi_artikel' => $deskripsi_artikel,
            'language' => $lang, // Kirim variabel bahasa ke view
            'lang' => $lang,
        ];

        helper('text');

        // Set meta description berdasarkan bahasa session
        $metaDescription = $this->generateMetaDescription($data);
        $data['Meta'] = character_limiter($metaDescription, 160);

        // Set judul halaman sesuai judul artikel yang sesuai dengan bahasa
        $data['Title'] = $judul_artikel ?: 'Detail Artikel';

        return view('user/artikel/detail', $data);
    }

    private function generateMetaDescription($data)
    {
        $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
        $deskripsi_perusahaan = session('lang') === 'in' ?
            strip_tags($data['profil'][0]->deskripsi_perusahaan_in) :
            strip_tags($data['profil'][0]->deskripsi_perusahaan_en);

        $teks = session('lang') === 'in' ?
            "Artikel dari $nama_perusahaan. $deskripsi_perusahaan" :
            "Articles from $nama_perusahaan. $deskripsi_perusahaan";

        return $teks;
    }
}
