<?php

use App\Models\ProdukModel;

function change_slug_based_on_language($current_slug)
{
    $ProdukModel = new ProdukModel();

    // Cari produk berdasarkan slug
    $produk = $ProdukModel->where('slug_id', $current_slug)
        ->orWhere('slug_en', $current_slug)
        ->first();

    // Jika produk ditemukan, ganti slug berdasarkan bahasa
    if ($produk) {
        $current_lang = session('lang') ?? 'id';
        if ($current_lang === 'id') {
            return $produk->slug_en; // Slug untuk bahasa Inggris
        } else {
            return $produk->slug_id; // Slug untuk bahasa Indonesia
        }
    }

    // Jika produk tidak ditemukan atau bukan halaman produk, kembalikan slug saat ini
    return $current_slug;
}
