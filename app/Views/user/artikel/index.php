<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<div class="intro-section mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5"
        style="min-height: 400px; background-image: url('<?= base_url('asset-user/images/hero_1.jpg'); ?>'); background-size: cover;">
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
    </div>
</div>

<!-- News With Sidebar Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="text-center mb-5">
                <h1 class="text-primary text-uppercase"><?php echo lang('Blog.btnOurblogs'); ?></h1>
            </div>
        </div>
        <br>
        <br>
        <div class="row justify-content-center">
            <?php
            $language = session()->get('lang'); // Ambil bahasa yang sedang dipilih dari session

            foreach ($artikelterbaru as $row) : ?>
                <div class="col-lg-4 mb-4">
                <a href="<?= base_url($lang . '/' . ($lang === 'en' ? 'blogs' : 'blog') . '/' . ($lang === 'en' ? $row->slug_en : $row->slug_id)) ?>" class="article-card-link">
                        <div class="article-card d-flex flex-column h-100 mb-3">
                            <img class="img-fluid w-100" style="object-fit: cover; border-radius: 15px 15px 0 0;" src="<?= base_url('asset-user/images/' . $row->foto_artikel); ?>" loading="lazy">
                            <div class="bg-white border border-top-0 p-4 flex-grow-1" style="border-radius: 0 0 15px 15px;">
                                <h6 class="h4 display-5">
                                    <?php
                                    if ($language == 'en') {
                                        echo $row->judul_artikel_en;
                                    } else {
                                        echo $row->judul_artikel;
                                    }
                                    ?>
                                </h6>
                                <p>
                                    <?php
                                    if ($language == 'en') {
                                        echo substr(strip_tags($row->deskripsi_artikel_en), 0, 30);
                                    } else {
                                        echo substr(strip_tags($row->deskripsi_artikel), 0, 30);
                                    }
                                    ?>...
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->

<style>
    .intro-section h1 {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .article-card {
        transition: transform 0.3s, box-shadow 0.3s;
        border-radius: 15px;
        overflow: hidden;
        text-decoration: none;
    }

    .article-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        text-decoration: none;
    }

    .article-card-link:hover {
        text-decoration: none;
    }

    .article-card-link {
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .article-card img {
        border-radius: 15px 15px 0 0;
    }

    .article-card .bg-white {
        border-radius: 0 0 15px 15px;
        height: 100%;
    }

    .article-card h6 {
        margin-bottom: 0.5rem;
        font-size: 1.25rem;
        font-weight: bold;
        text-decoration: none;
        color: inherit;
    }

    .article-card p {
        margin: 0;
        color: #333;
    }

    .row>.col-lg-4 {
        display: flex;
        align-items: stretch;
    }

    .article-card {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .article-card img {
        flex-shrink: 0;
    }

    .article-card .bg-white {
        flex-grow: 1;
    }
</style>

<?= $this->endSection('content'); ?>