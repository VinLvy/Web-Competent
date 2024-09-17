<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- Page Header Start -->
<div class="intro-section mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px; background-image: url('asset-user/images/hero_1.jpg'); background-size: cover;">
        <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">
            <?php foreach ($profil as $perusahaan) : ?>
                <?php
                echo lang('Blog.titleOurContact');
                if (!empty($perusahaan)) {
                    echo ' ' . $perusahaan->nama_perusahaan;
                }
                ?>
            <?php endforeach; ?>
        </h1>
    </div>
</div>

<!-- Content Start -->
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mb-5 mb-md-0">
                <div class="map embed-responsive embed-responsive-16by9" style="width: 100%; height: 100%;">
                    <?php foreach ($profil as $maps) : ?>
                        <?= $maps->link_maps ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-5 mb-5 mb-md-0">
                <?php foreach ($profil as $desc) : ?>
                    
                    <div class="card contact-card h-100">
                    <div class="contact-title">
                        <h2><?= lang('Blog.contactInformation') ?></h2>
                    </div>
                        <div class="card-body d-flex flex-column justify-content-center">
                            
                            <blockquote class="blockquote">
                                <div class="contact_details_row clearfix">
                                    
                                    <div class="contact-item">
                                        <div class="details">
                                            <span class="c_detail">
                                            
                                                <p>
                                                    <?php
                                                    if (session('lang') === 'en') {
                                                        echo $desc->deskripsi_kontak_en;
                                                    } else {
                                                        echo $desc->deskripsi_kontak_in;
                                                    }
                                                    ?>
                                                </p>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- Removed email and WhatsApp links -->
                                </div>
                            </blockquote>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<style>
    .intro-section h1 {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .body {
        margin: 20px;
    }

    .contact-title {
        margin-bottom: 20px;
    }

    .contact-title h2 {
        color: #f46c25;
        font-size: 24px;
        border-bottom: 2px solid #f46c25;
        padding-bottom: 10px;
    }

    .card {
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin: 0 auto;
        padding: 20px;
    }

    .contact_details_row {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .contact-item {
        display: flex;
        align-items: center;
    }

    .contact-item .details {
        flex: 1;
    }

    .contact-item .details .c_detail {
        margin: 0;
        font-size: 16px;
    }

    .map {
        height: 100%;
    }

    .map iframe {
        width: 100%;
        height: 100%;
    }

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
</style>

<?= $this->endSection('content'); ?>
