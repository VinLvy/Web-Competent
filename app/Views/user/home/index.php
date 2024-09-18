<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- TEST SLIDER img -->
<?= $this->include('user/home/slider'); ?>

<!-- END slider -->

<div class="popular_destination_area">
    <div class="container">
        <?php foreach ($profil as $title) :  ?>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_title text-center mb_70">
                        <h1><?= $title->title_website; ?></h1>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- END services -->

<div class="container-fluid py-5" style="background-color: rgb(252,203,4); margin-top: 40px; border-radius: 15px;">
    <div class="container">
        <?php foreach ($profil as $descper) : ?>
            <div class="text-center mb-5">
                <h1 class="text-primary text-uppercase" style=""><?php echo lang('Blog.titleAboutUs')  ?></h1>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0" style="min-height: 500px; position: relative;">
                    <img class="w-100 h-100 img-fluid img-overlap lazyload" data-src="asset-user/images/<?= $descper->foto_utama; ?>" alt="<?= $descper->nama_perusahaan; ?>">
                </div>
                <div class="col-lg-5 ml-auto">
                    <h1 class="mb-3"><?= $descper->nama_perusahaan; ?></h1>
                    <p class="opacity-50 justify-text">
                        <?php
                        if (lang('Blog.Languange') == 'en') {
                            echo character_limiter($descper->deskripsi_perusahaan_en, 900);
                        } elseif (lang('Blog.Languange') == 'in') {
                            echo character_limiter($descper->deskripsi_perusahaan_in, 900);
                        }
                        ?>
                    </p>
                    <a href="<?= base_url('about') ?>" class="btn btn-primary font-weight-bold py-2 px-4 mt-2 custom-btn text-white"><?= lang('Blog.btnReadmore'); ?></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- END block-2 -->

<!-- <hr style="border: 1px solid #fb0404; width: 50%; margin: 20px auto;"> -->

<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="text-primary text-uppercase"><?php echo lang('Blog.btnOurtraining'); ?></h1>
        </div>
        <div class="row justify-content-center">
            <?php
            $count = 0;
            $total_products = count($tbproduk);
            foreach ($tbproduk as $index => $produk) :
                if ($count >= 3) break;

                // Menentukan apakah ini produk terakhir dan ganjil
                $is_last_odd = ($index == $total_products - 1) && ($total_products % 2 != 0);
            ?>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-4 px-4 <?php if ($is_last_odd) echo 'd-flex justify-content-center'; ?>">
                    <a href="<?= base_url('product/detail/' . $produk->id_produk . '/' . url_title($produk->nama_produk_en) . '_' . url_title($produk->nama_produk_in)) ?>" class="article-card-link" style="text-decoration: none;">
                        <div class="article-card row align-items-center" style="border-radius: 15px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            <div class="col-sm-5" style="padding: 15px;">
                                <img class="img-fluid mb-3 mb-sm-0 lazyload" style="border-radius: 10px;" data-src="asset-user/images/<?= $produk->foto_produk; ?>" alt="<?php if (lang('Blog.Languange') == 'en') {
                                                                                                                                                                                echo $produk->nama_produk_en;
                                                                                                                                                                            } ?>
                                <?php if (lang('Blog.Languange') == 'in') {
                                    echo $produk->nama_produk_in;
                                } ?>" class="img-fluid lazyload">
                            </div>
                            <div class="col-sm-7">
                                <h3 class="h3-link"><?php if (lang('Blog.Languange') == 'en') {
                                                        echo $produk->nama_produk_en;
                                                    } ?>
                                    <?php if (lang('Blog.Languange') == 'in') {
                                        echo $produk->nama_produk_in;
                                    } ?>
                                </h3>
                                <p style="color: #555;">
                                    <?php
                                    $lang = lang('Blog.Languange');

                                    // Memilih deskripsi berdasarkan bahasa
                                    $deskripsi_produk = ($lang == 'en') ? $produk->deskripsi_produk_en : $produk->deskripsi_produk_in;

                                    // Menghapus tag HTML dari deskripsi
                                    $deskripsi_produk_bersih = strip_tags($deskripsi_produk);

                                    // Memotong deskripsi menjadi 20 kata pertama
                                    $deskripsi_produk_20_kata = implode(' ', array_slice(str_word_count($deskripsi_produk_bersih, 1), 0, 15));

                                    echo $deskripsi_produk_20_kata . '...';
                                    ?>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php
                $count++;
            endforeach;
            ?>
        </div>
        <div class="text-center">
            <a href="<?= base_url('product') ?>" class="btn btn-primary font-weight-bold py-2 px-4 mt-2 custom-btn text-white"><?= lang('Blog.btnMoreTraining'); ?></a>
        </div>
    </div>
</div>



<hr style="border: 1px solid #fb0404; width: 50%; margin-top: 70px;">

<!-- News With Sidebar Start -->
<div class="container-fluid pt-5 mb-3">
    <div class="container">
    <div class="text-center mb-5">
            <h1 class="text-primary text-uppercase" style=""><?php echo lang('Blog.btnOurblogs'); ?></h1>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <!-- Menampilkan artikel terbaru secara otomatis -->
                <div class="position-relative mb-3">
                    <img class="img-fluid w-100" src="<?= base_url('asset-user/images/' . $artikelterbaru[0]->foto_artikel); ?>" style="object-fit: cover;">
                    <div class="bg-white border border-top-0 p-4">
                        <div class="mb-3">
                            <a class="text-uppercase mb-3 text-body"><?= date('d F Y', strtotime($artikelterbaru[0]->created_at)); ?></a>
                        </div>
                        <h1 class="display-5 mb-2 article-title"><?= $artikelterbaru[0]->judul_artikel; ?></h1>
                        <p class="fs-5"><?= $artikelterbaru[0]->deskripsi_artikel; ?></p>
                    </div>
                </div>
                <!-- End Artikel Terbaru -->
            </div>

            <div class="col-lg-4">
                <!-- Menampilkan artikel lainnya -->
                <div class="mb-3">
                    <div class="row">
                        <!-- <div class="mb-5">
                            <img src="<?= base_url('asset-user/images/news.png') ?>" alt="Logo" style="width: 50px; height: auto; text-align: left;">
                        </div> -->
                        <div class="bg-white border border-top-0 p-3">
                            <?php foreach (array_slice($artikelterbaru, 1) as $artikel_item) : ?>
                                <div class="d-flex align-items-center bg-white mb-3 article-item">
                                    <a href="<?= base_url('/artikel/detail/' . $artikel_item->id_artikel) ?>">
                                        <img class="img-fluid article-image" src="<?= base_url('asset-user/images/' . $artikel_item->foto_artikel); ?>" loading="lazy">
                                    </a>
                                    <div class="w-100 h-100 d-flex flex-column justify-content-center border border-left-0 article-content">
                                        <div class="mb-2">
                                            <a class="text-body" href="<?= base_url('/artikel/detail/' . $artikel_item->id_artikel) ?>"><small><?= date('d F Y', strtotime($artikel_item->created_at)); ?></small></a>
                                        </div>
                                        <a class="h6 m-0 display-7" href="<?= base_url('/artikel/detail/' . $artikel_item->id_artikel) ?>"><?= substr($artikel_item->judul_artikel, 0, 20) ?>...</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <!-- End Artikel Lainnya -->
            </div>
        </div>
    </div>
</div>

<!-- End News With Sidebar -->

<style>
    .intro-section h1 {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .article-card {
        transition: transform 0.3s, box-shadow 0.3s;
        background-color: #fccb04;

    }

    .article-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .article-card-link {
        text-decoration: none;
        color: inherit;
    }

    .h3-link {
        text-decoration: none;
    }

    .read-more-btn,
    .read-more-link {
        text-decoration: none;
        color: inherit;
    }

    .read-more-btn:hover {
        text-decoration: underline;
    }

    .custom-btn {
        padding-left: 30px;
        padding-right: 30px;
        border-radius: 25px;
    }
</style>

<?= $this->endSection('content'); ?>