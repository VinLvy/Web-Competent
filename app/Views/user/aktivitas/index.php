<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<div class="intro-section mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px; background-image: url('asset-user/images/hero_1.jpg'); background-size: cover;">
        <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">
            <?php foreach ($profil as $perusahaan) : ?>
                <?php
                echo lang('Blog.titleClients');
                if (!empty($perusahaan)) {
                    echo ' ' . $perusahaan->nama_perusahaan;
                }
                ?>
            <?php endforeach; ?>
        </h1>
    </div>
</div>

<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="text-primary text-uppercase"><?php echo lang('Blog.btnOurclient'); ?></h1>
        </div>
        <div class="row justify-content-center">
            <?php foreach ($tbaktivitas as $aktivitas) : ?>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-4 px-4">
                    <a href="<?= base_url('activities/detail/' . $aktivitas->id_aktivitas . '/' . url_title($aktivitas->nama_aktivitas_en) . '_' . url_title($aktivitas->nama_aktivitas_in)) ?>" class="article-card-link" style="text-decoration: none;">
                        <div class="article-card row align-items-center" style="border-radius: 15px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            <div class="col-sm-5" style="padding: 15px;">
                                <img class="img-fluid mb-3 mb-sm-0 lazyload" style="border-radius: 10px;" data-src="asset-user/images/<?= $aktivitas->foto_aktivitas; ?>" alt="<?php if (lang('Blog.Languange') == 'en') {
                                                                                                                                                                                    echo $aktivitas->nama_aktivitas_en;
                                                                                                                                                                                } ?>
                                <?php if (lang('Blog.Languange') == 'in') {
                                    echo $aktivitas->nama_aktivitas_in;
                                } ?>" class="img-fluid lazyload">
                            </div>
                            <div class="col-sm-7">
                                <h3 class="h3-link">
                                    <?php if (lang('Blog.Languange') == 'en') {
                                        echo $aktivitas->nama_aktivitas_en;
                                    } ?>
                                    <?php if (lang('Blog.Languange') == 'in') {
                                        echo $aktivitas->nama_aktivitas_in;
                                    } ?>
                                </h3>
                                <p style="color: #555;">
                                    <?php
                                    $lang = lang('Blog.Languange');
                                    $deskripsi_aktivitas = ($lang == 'en') ? $aktivitas->deskripsi_aktivitas_en : $aktivitas->deskripsi_aktivitas_in;

                                    // Memotong deskripsi menjadi 10 kata pertama
                                    $deskripsi_aktivitas_bersih = strip_tags($deskripsi_aktivitas);
                                    $deskripsi_aktivitas_10_kata = implode(' ', array_slice(str_word_count($deskripsi_aktivitas_bersih, 1), 0, 10));

                                    echo $deskripsi_aktivitas_10_kata . '...';
                                    ?>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<style>
    .intro-section h1 {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .article-card {
        transition: transform 0.3s, box-shadow 0.3s;
        background-color: #E1EFE6;
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