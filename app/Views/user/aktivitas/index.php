<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<div class="intro-section mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px; background-image: url('asset-user/images/hero_1.jpg'); background-size: cover;">
        <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">
            <?php foreach ($profil as $perusahaan) : ?>
                <?php
                echo lang('Blog.titleActivities');
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
            <!-- <h1 class="text-primary text-uppercase" style="letter-spacing: 5px;"><?php echo lang('Blog.btnOurproducts'); ?></h1> -->
        </div>
        <div class="row justify-content-center">
            <?php foreach ($tbaktivitas as $aktivitas) : ?>
                <div class="col-lg-6 mb-5">
                    <div class="article-card row align-items-center">
                        <div class="col-lg-5 col-md-7">
                            <a href="<?= base_url('activities/detail/' . $aktivitas->id_aktivitas . '/' . url_title($aktivitas->nama_aktivitas_en) . '_' . url_title($aktivitas->nama_aktivitas_in)) ?>" class="article-card-link">
                                <img data-src="asset-user/images/<?= $aktivitas->foto_aktivitas ?>" alt="<?php if (lang('Blog.Languange') == 'en') {
                                                                                                                echo $aktivitas->nama_aktivitas_en;
                                                                                                            } ?>
                                    <?php if (lang('Blog.Languange') == 'in') {
                                        echo $aktivitas->nama_aktivitas_in;
                                    } ?>" class="img-fluid img-larger lazyload">
                            </a>
                        </div>
                        <div class="col-sm-7">
                            <h4>
                                <i class="fas fa-car service-icon"></i>
                                <a href="<?= base_url('activities/detail/' . $aktivitas->id_aktivitas . '/' . url_title($aktivitas->nama_aktivitas_en) . '_' . url_title($aktivitas->nama_aktivitas_in)) ?>" class="article-card-link">
                                    <?php if (lang('Blog.Languange') == 'en') {
                                        echo $aktivitas->nama_aktivitas_en;
                                    } ?>
                                    <?php if (lang('Blog.Languange') == 'in') {
                                        echo $aktivitas->nama_aktivitas_in;
                                    } ?>
                                </a>
                            </h4>
                            <p class="opacity-50 justify-text">
                                <?php
                                $lang = lang('Blog.Languange');
                                $deskripsi_aktivitas = ($lang == 'en') ? $aktivitas->deskripsi_aktivitas_en : $aktivitas->deskripsi_aktivitas_in;

                                // Mengambil 10 kata pertama dari deskripsi aktivitas
                                $deskripsi_aktivitas_10_kata = implode(' ', array_slice(str_word_count($deskripsi_aktivitas, 1), 0, 10));

                                echo $deskripsi_aktivitas_10_kata . '...';
                                ?>
                                <a href="<?= base_url('activities/detail/' . $aktivitas->id_aktivitas . '/' . url_title($aktivitas->nama_aktivitas_en) . '_' . url_title($aktivitas->nama_aktivitas_in)) ?>" class="read-more-link">
                                    <p class="read-more-btn"><?= lang('Blog.btnReadmore'); ?></p>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<style>
    .intro-section h1 {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        /* Adjust the shadow parameters as needed */
    }

    .article-card {
        transition: transform 0.3s, box-shadow 0.3s;
        cursor: pointer;
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
</style>


<?= $this->endSection('content'); ?>