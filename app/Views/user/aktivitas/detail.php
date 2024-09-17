<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<div class="intro-section mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 420px; background-image: url('/asset-user/images/hero_1.jpg'); background-size: cover;">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">
                <?php foreach ($profil as $perusahaan) : ?>
                    <?php echo lang('Blog.titleActivities');
                        if (!empty($perusahaan)) {
                            echo ' ' . $perusahaan->nama_perusahaan;
                        } ?>
                <?php endforeach; ?>
            </h1>
            <!-- <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="<?= base_url('/') ?>"><?php echo lang('Blog.headerHome'); ?></a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white"><?php echo lang('Blog.headerActivities');?></p>
            </div> -->
        </div>
</div>

<div class="container-fluid py-5">
    <div class="container">
        <?php foreach ($profil as $descper) : ?>
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0" style="min-height: 500px; position: relative;">
                    <img class="w-100 h-100 img-fluid img-overlap lazyload" data-src="/asset-user/images/<?= $tbaktivitas->foto_aktivitas ?>" alt="<?php if (lang('Blog.Languange') == 'en') {
                                                                                                    echo $tbaktivitas->nama_aktivitas_en;
                                                                                                } ?>
                                    <?php if (lang('Blog.Languange') == 'in') {
                                        echo $tbaktivitas->nama_aktivitas_in;
                                    } ?>">
                </div>
                <div class="col-lg-5 ml-auto">
                    <h1 class="mb-3"><?php if (lang('Blog.Languange') == 'en') {
                                echo $tbaktivitas->nama_aktivitas_en;
                            } elseif (lang('Blog.Languange') == 'in') {
                                echo $tbaktivitas->nama_aktivitas_in;
                            } ?></h1>
                    <p class="opacity-50 justify-text">
                    <?php if (lang('Blog.Languange') == 'en') {
                                echo $tbaktivitas->deskripsi_aktivitas_en;
                            } elseif (lang('Blog.Languange') == 'in') {
                                echo $tbaktivitas->deskripsi_aktivitas_in;
                            } ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
    .intro-section h1 {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        /* Adjust the shadow parameters as needed */
    }
</style>


<?= $this->endSection('content'); ?>