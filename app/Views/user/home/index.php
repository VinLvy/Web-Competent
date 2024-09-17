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

<div class="container-fluid py-5">
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
                    <a href="<?= base_url('about') ?>" class="btn btn-primary font-weight-bold py-2 px-4 mt-2 custom-btn"><?= lang('Blog.btnReadmore'); ?></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- END block-2 -->
<hr style="border: 1px solid #fb0404; width: 50%; margin: 20px auto;">

<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="text-primary text-uppercase" style="letter-spacing: 1px;"><?php echo lang('Blog.btnOurproducts'); ?></h1>
        </div>
        <div class="row justify-content-center">
            <?php 
            $count = 0;
            foreach ($tbproduk as $produk) : 
                if ($count >= 3) break; 
            ?>
                <div class="col-lg-6 mb-5">
                    <div class="article-card row align-items-center">
                        <div class="col-sm-5">
                            <a href="<?= base_url('product/detail/' . $produk->id_produk . '/' . url_title($produk->nama_produk_en) . '_' . url_title($produk->nama_produk_in)) ?>" class="article-card-link">
                                <img class="img-fluid mb-3 mb-sm-0 lazyload" data-src="asset-user/images/<?= $produk->foto_produk; ?>" alt="<?php if (lang('Blog.Languange') == 'en') {
                                                                                                                                                echo $produk->nama_produk_en;
                                                                                                                                            } ?>
                                <?php if (lang('Blog.Languange') == 'in') {
                                    echo $produk->nama_produk_in;
                                } ?>" class="img-fluid lazyload">
                            </a>
                        </div>
                        <div class="col-sm-7">
                            <a href="<?= base_url('product/detail/' . $produk->id_produk . '/' . url_title($produk->nama_produk_en) . '_' . url_title($produk->nama_produk_in)) ?>" class="article-card-link">
                                <h3 class="h3-link"><?php if (lang('Blog.Languange') == 'en') {
                                                        echo $produk->nama_produk_en;
                                                    } ?>
                                    <?php if (lang('Blog.Languange') == 'in') {
                                        echo $produk->nama_produk_in;
                                    } ?>
                                </h3>
                            </a>
                            <p class="m-0">
                                <?php
                                $lang = lang('Blog.Languange');
                                $deskripsi_produk = ($lang == 'en') ? $produk->deskripsi_produk_en : $produk->deskripsi_produk_in;

                                // Mengambil 20 kata pertama dari deskripsi produk
                                $deskripsi_produk_20_kata = implode(' ', array_slice(str_word_count($deskripsi_produk, 1), 0, 15));

                                echo $deskripsi_produk_20_kata . '...';
                                ?>
                            </p>
                            <a class="read-more-link" href="<?= base_url('product/detail/' . $produk->id_produk . '/' . url_title($produk->nama_produk_en) . '_' . url_title($produk->nama_produk_in)) ?>">
                                <p class="read-more-btn"><?= lang('Blog.btnReadmore'); ?></p>
                            </a>
                        </div>
                    </div>
                </div>
            <?php 
                $count++; 
            endforeach; 
            ?>
        </div>
        <div class="text-center">
            <a href="<?= base_url('product') ?>" class="btn btn-primary font-weight-bold py-2 px-4 mt-2 custom-btn"><?= lang('Blog.btnMoreProducts'); ?></a>
        </div>
    </div>
</div>

<hr style="border: 1px solid #fb0404; width: 50%; margin: 20px auto;">

<!-- News With Sidebar Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="text-primary text-uppercase" style="letter-spacing: 1px;"><?php echo lang('Blog.btnOurarticle'); ?></h1>
        </div>
        <div class="row">
            <!-- <div class="mb-5">
                <img src="<?= base_url('asset-user/images/news.png') ?>" alt="Logo" style="width: 50px; height: auto; text-align: left;">
            </div> -->
        </div>
        <br>
        <br>
        <div class="row">
            <?php 
            $count = 0;
            foreach ($artikelterbaru as $row) : 
                if ($count >= 3) break; 
            ?>
                <div class="col-lg-4 mb-4">
                    <div class="article-card position-relative d-flex flex-column h-100 mb-3">
                        <a href="<?= base_url('/artikel/detail/' . $row->id_artikel) ?>">
                            <img class="img-fluid w-100" style="object-fit: cover;" src="<?= base_url('asset-user/images/' . $row->foto_artikel); ?>" loading="lazy">
                        </a>
                        <div class="bg-white border border-top-0 p-4 flex-grow-1">
                            <div class="mb-2">
                                <p><?= date('d F Y', strtotime($row->created_at)); ?></p>
                            </div>
                            <a class="h4 display-5" href="<?= base_url('/artikel/detail/' . $row->id_artikel) ?>"><?= substr(strip_tags($row->judul_artikel), 0, 25) ?>...</a>
                            <p><?= substr(strip_tags($row->deskripsi_artikel), 0, 30) ?>...</p>
                        </div>
                    </div>
                </div>
            <?php 
                $count++; 
            endforeach; 
            ?>
        </div>
        <div class="text-center mb-5">
            <a href="<?= base_url('artikel') ?>" class="btn btn-primary font-weight-bold py-2 px-4 mt-2 custom-btn"><?= lang('Blog.btnSeeMoreArticles'); ?></a>
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
