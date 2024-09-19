<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<style>
    .article-item {
        display: flex;
        height: 110px;
        overflow: hidden;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
    }

    .article-item:hover {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .article-image {
        width: 110px;
        height: 110px;
        object-fit: cover;
        border-radius: 5px 0 0 5px;
    }

    .article-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 0 1rem;
        white-space: normal;
        overflow: hidden;
    }

    .article-content a {
        text-decoration: none;
        color: inherit;
    }

    .article-title {
        
        font-weight: bold;
        margin: 0;
    }

    .article-content small {
        color: #888;
    }

    /* Memastikan seluruh card bisa diklik */
    .article-link {
        text-decoration: none;
        color: inherit;
        display: block;
        width: 100%;
    }

    .article-link:hover {
        text-decoration: none; /* Pastikan tidak ada garis bawah saat hover */
    }

    
</style>

<div class="container-fluid page-header py-5" style="background-image: url('<?= base_url('./asset-user/images/hero_1.jpg'); ?>');">
</div>

<!-- News With Sidebar Start -->
<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- News Detail Start -->
                <div class="position-relative mb-3">
                    <img class="img-fluid w-100" src="<?= base_url('asset-user/images/' . $artikel->foto_artikel); ?>" style="object-fit: cover;">
                    <div class="bg-white border border-top-0 p-4">
                        <div class="mb-3">
                            <a class="text-uppercase mb-3 text-body"><?= date('d F Y', strtotime($artikel->created_at)); ?></a>
                        </div>
                        <h1 class="display-5 mb-2 article-title"><?= $artikel->judul_artikel; ?></h1>
                        <p class="fs-5"><?= $artikel->deskripsi_artikel; ?></p>
                    </div>
                </div>
                <!-- News Detail End -->
            </div>

            <div class="col-lg-4">
                <!-- Popular News Start -->
                <div class="mb-3">
                    <div class="row">
                        <div class="mb-3">
                            <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary title-alsoread" style="text-align: left;"><?php echo lang('Blog.titleAlsoread'); ?></h5>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <?php foreach ($artikel_lain as $artikel_item) : ?>
                                <a href="<?= base_url('/artikel/detail/' . $artikel_item->id_artikel) ?>" class="article-link">
                                    <div class="d-flex align-items-center bg-white mb-3 article-item">
                                        <img class="img-fluid article-image" src="<?= base_url('asset-user/images/' . $artikel_item->foto_artikel); ?>" loading="lazy">
                                        <div class="w-100 h-100 d-flex flex-column justify-content-center article-content">
                                            <h6 class="article-title"><?= $artikel_item->judul_artikel ?></h6>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <!-- Popular News End -->
            </div>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->

<?= $this->endSection('content'); ?>