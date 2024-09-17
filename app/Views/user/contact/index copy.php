<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<div class="intro-section mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 420px; background-image: url('asset-user/images/hero_1.jpg'); background-size: cover;">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">
                <?php foreach ($profil as $perusahaan) : ?>
                    <?php echo lang('Blog.titleOurContact');
                        if (!empty($perusahaan)) {
                            echo ' ' . $perusahaan->nama_perusahaan;
                        } ?>
                <?php endforeach; ?>
            </h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="<?= base_url('/') ?>"><?php echo lang('Blog.headerHome'); ?></a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white"><?php echo lang('Blog.headerContact');  ?></p>
            </div>
        </div>
</div>

    <section class="contact-section">
    <div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div id="map" style="height: 480px; position: relative; overflow: hidden;">
                <?php foreach ($profil as $maps) :  ?>
                    <?php echo $maps->link_maps ?>
                <?php endforeach;  ?>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="media contact-info">
                    <?php foreach ($profil as $desc) : ?>
                        <div class="media-body">
                            <h3>
                                <?php if (lang('Blog.Languange') == 'en') {
                                    echo $desc->deskripsi_kontak_en;
                                } ?>
                                <?php if (lang('Blog.Languange') == 'in') {
                                    echo $desc->deskripsi_kontak_in;
                                } ?>
                            </h3>
                        </div>
                    <?php endforeach;  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>


        
<?= $this->endSection('content'); ?>