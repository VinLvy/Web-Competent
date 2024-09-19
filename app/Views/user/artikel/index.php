 <?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<div class="intro-section mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px; background-image: url('asset-user/images/hero_1.jpg'); background-size: cover;">
        <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">
            <?php foreach ($profil as $perusahaan) : ?>
                <?php
                echo lang('Blog.titleOurBlogs');
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

<!-- News With Sidebar Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="text-center mb-5">
                <h1 class="text-primary text-uppercase" style=""><?php echo lang('Blog.btnOurblogs'); ?></h1>
            </div>
        </div>
        <br>
        <br>
        <div class="row justify-content-center">
            <?php foreach ($artikelterbaru as $row) : ?>
                <div class="col-lg-4 mb-4">
                    <div class="article-card position-relative d-flex flex-column h-100 mb-3">
                        <a href="<?= base_url('/artikel/detail/' . $row->id_artikel) ?>">
                            <img class="img-fluid w-100" style="object-fit: cover;" src="<?= base_url('asset-user') ?>/images/<?= $row->foto_artikel; ?>" loading="lazy">
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
    }

    .article-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }
</style>

<?= $this->endSection('content'); ?>