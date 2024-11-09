<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use App\Models\AktivitasModel;
use App\Models\ProdukModel;
use App\Models\ArtikelModel;

class Sitemapctrl extends BaseController
{
    public function index()
    {
        // Inisialisasi model
        $aktivitasModel = new AktivitasModel();
        $produkModel = new ProdukModel();
        $artikelModel = new ArtikelModel();

        // Ambil data dari database
        $aktivitasData = $aktivitasModel->findAll();
        $productsData = $produkModel->findAll();
        $artikelData = $artikelModel->findAll();

        // Data untuk halaman statis dalam bentuk array URL
        $data = [
            'home_id' => base_url('id'),
            'home_en' => base_url('en'),
            'about_id' => base_url('id/tentang-kami'),
            'about_en' => base_url('en/about'),
            'product_id' => base_url('id/materi-pelatihan'),
            'product_en' => base_url('en/training-topics'),
            'article_id' => base_url('id/blog'),
            'article_en' => base_url('en/blogs'),
            'activity_id' => base_url('id/klien'),
            'activity_en' => base_url('en/clients'),
            'contact_id' => base_url('id/kontak'),
            'contact_en' => base_url('en/contact'),
        ];

        // URL dinamis untuk aktivitas
        foreach ($aktivitasData as $aktivitas) {
            $data['aktivitas_id'][] = base_url('id/klien/' . $aktivitas->slug_id);
            $data['aktivitas_en'][] = base_url('en/clients/' . $aktivitas->slug_en);
        }

        // URL dinamis untuk produk
        foreach ($productsData as $product) {
            $data['products_id'][] = base_url('id/materi-pelatihan/' . $product->slug_id);
            $data['products_en'][] = base_url('en/training-topics/' . $product->slug_en);
        }

        // URL dinamis untuk artikel
        foreach ($artikelData as $artikel) {
            $data['articles_id'][] = base_url('id/blog/' . $artikel->slug_id);
            $data['articles_en'][] = base_url('en/blogs/' . $artikel->slug_en);
        }

        // Load view dengan data yang diperlukan untuk sitemap
        return view('sitemap', ['data' => $data]);
    }
}
