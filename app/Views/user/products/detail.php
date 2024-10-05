<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<div class="whatsapp-logo">
    <a href="https://wa.me/yourwhatsappnumber" target="_blank">
        <img src="<?= base_url('asset-user/images/whatsapp.jpeg') ?>" alt="WhatsApp">
    </a>
</div>

<div class="intro-section mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 420px; background-image: url('/asset-user/images/hero_1.jpg'); background-size: cover;">
        <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">
            <?php foreach ($profil as $perusahaan) : ?>
                <?php echo lang('Blog.titleOurTraining');
                if (!empty($perusahaan)) {
                    echo ' ' . $perusahaan->nama_perusahaan;
                } ?>
            <?php endforeach; ?>
        </h1>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container">
        <?php foreach ($profil as $descper) : ?>
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0" style="min-height: 500px; position: relative;">
                    <img class="w-100 h-100 img-fluid img-overlap lazyload" data-src="<?= base_url('asset-user/images/' . $tbproduk->foto_produk) ?>"
                        alt="<?= (lang('Blog.Languange') === 'en') ? $tbproduk->nama_produk_en : $tbproduk->nama_produk_in; ?>">
                </div>
                <div class="col-lg-5 ml-auto">
                    <h1 class="mb-3"><?php if (lang('Blog.Languange') == 'en') {
                                            echo $tbproduk->nama_produk_en;
                                        } elseif (lang('Blog.Languange') == 'in') {
                                            echo $tbproduk->nama_produk_in;
                                        } ?></h1>
                    <p class="opacity-50 justify-text">
                        <?php if (lang('Blog.Languange') == 'en') {
                            echo $tbproduk->deskripsi_produk_en;
                        } elseif (lang('Blog.Languange') == 'in') {
                            echo $tbproduk->deskripsi_produk_in;
                        } ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
    .whatsapp-logo {
        position: fixed;
        bottom: 100px;
        right: 20px;
        width: 60px;
        height: 60px;
        background-color: #25d366;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        transition: transform 0.3s;
    }

    .whatsapp-logo:hover {
        transform: scale(1.1);
    }

    .whatsapp-logo img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
    }

    .intro-section h1 {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .text-dark {
        color: #000 !important;
    }
</style>

<?= $this->endSection('content'); ?>