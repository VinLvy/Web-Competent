<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<div class="intro-section mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px; background-image: url('asset-user/images/hero_1.jpg'); background-size: cover;">
        <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">
            <?php foreach ($profil as $perusahaan) : ?>
                <?php
                echo lang('Blog.titleOurTraining');
                if (!empty($perusahaan)) {
                    echo ' ' . $perusahaan->nama_perusahaan;
                }
                ?>
            <?php endforeach; ?>
        </h1>
        <!-- <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="<?= base_url('/') ?>"><?php echo lang('Blog.headerHome'); ?></a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white"><?php echo lang('Blog.headerProducts'); ?></p>
            </div> -->
    </div>
</div>

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
    </div>
</div>

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