<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- TEST SLIDER img -->
<?= $this->include('user/home/slider'); ?>

<!-- END slider -->


<div class="popular_destination_area" style="background-color: #fccb04; padding: 50px 0; margin: 0;">
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

<div class="container-fluid py-5" style="background-color: #fffbf2; border-radius: 15px;">
    <div class="container">
        <?php foreach ($profil as $descper) : ?>
            <div class="text-center mb-5">
                <h1 class="text-primary text-uppercase" style=""><?php echo lang('Blog.titleAboutUs')  ?></h1>
            </div>
            <div class="row">

                <div class="col-lg-6 mb-4 mb-lg-0" style="min-height: 500px; position: relative;">
                    <img class="w-100 h-100 img-fluid img-overlap lazyload" data-src="<?= base_url('asset-user/images/' . $descper->foto_utama);  ?>" alt="<?= $descper->nama_perusahaan; ?>">
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
                    <a href="<?= base_url($lang . '/' . ($lang === 'en' ? 'about' : 'tentang-kami')) ?>" class="btn btn-primary font-weight-bold py-2 px-4 mt-2 custom-btn text-black">
                        <?= lang('Blog.btnReadmore'); ?>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- END block-2 -->

<div class="container-fluid pt-5" style="background-color: #fffbf2;">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="text-primary text-uppercase"><?php echo lang('Blog.btnOurtraining'); ?></h1>
        </div>
        <div class="row justify-content-center">
            <?php
            // Menampilkan maksimal 3 produk
            $total_products = count($tbproduk);
            $max_products = 3;

            foreach ($tbproduk as $index => $produk) :
                // Batasi hanya menampilkan 3 produk
                if ($index >= $max_products) break;

                // Menentukan apakah ini produk terakhir dan ganjil
                $is_last_odd = ($index == $total_products - 1) && ($total_products % 2 != 0);
            ?>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-4 px-4 <?php if ($is_last_odd) echo 'd-flex justify-content-center'; ?>">
                    <a href="<?= base_url($lang . '/' . ($lang === 'en' ? 'training-topics' : 'materi-pelatihan') . '/' . ($lang === 'en' ? $produk->slug_en : $produk->slug_id)) ?>" class="article-card-link" style="text-decoration: none;">
                        <div class="article-card row align-items-center" style="border-radius: 15px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            <div class="col-sm-5" style="padding: 15px;">
                                <img class="img-fluid mb-3 mb-sm-0 lazyload"
                                    style="border-radius: 10px;"
                                    data-src="<?= base_url('asset-user/images/' . $produk->foto_produk); ?>"
                                    alt="<?= lang('Blog.Languange') == 'en' ? $produk->nama_produk_en : $produk->nama_produk_in; ?>" />
                            </div>
                            <div class="col-sm-7">
                                <h3 class="h3-link">
                                    <?= lang('Blog.Languange') == 'en' ? $produk->nama_produk_en : $produk->nama_produk_in; ?>
                                </h3>
                                <p style="color: #555;">
                                    <?php
                                    $deskripsi_produk = (lang('Blog.Languange') == 'en') ? $produk->deskripsi_produk_en : $produk->deskripsi_produk_in;
                                    $deskripsi_produk_bersih = strip_tags($deskripsi_produk);
                                    $deskripsi_produk_20_kata = implode(' ', array_slice(str_word_count($deskripsi_produk_bersih, 1), 0, 15));
                                    echo $deskripsi_produk_20_kata . '...';
                                    ?>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center">
            <a href="<?= base_url($lang . '/' . ($lang === 'en' ? 'training-topics' : 'materi-pelatihan')) ?>" class="btn btn-primary font-weight-bold py-2 px-4 mt-2 custom-btn text-black"><?= lang('Blog.btnMoreTraining'); ?></a>
        </div>
    </div>
</div>



<hr style="border: 1px solid #fccb04; width: 50%; margin-top: 70px;">

<!-- News With Sidebar Start -->
<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="text-primary text-uppercase"><?php echo lang('Blog.btnOurblogs'); ?></h1>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <!-- Menampilkan artikel terbaru secara otomatis -->
                <div class="position-relative mb-3">
                    <img class="img-fluid w-100" src="<?= base_url('asset-user/images/' . $artikelterbaru[0]->foto_artikel); ?>" alt="<?= $artikelterbaru[0]->judul_artikel ?>" style="object-fit: cover;">
                    <div class="bg-white border border-top-0 p-4">
                        <div class="mb-3">
                            <p class="text-uppercase mb-3 text-body"><?= date('d F Y', strtotime($artikelterbaru[0]->created_at)); ?></p>
                        </div>

                        <!-- Menampilkan judul artikel terbaru berdasarkan bahasa -->
                        <h1 class="display-5 mb-2 article-title">
                            <?= session('lang') === 'en' ? $artikelterbaru[0]->judul_artikel_en : $artikelterbaru[0]->judul_artikel; ?>
                        </h1>

                        <!-- Menampilkan deskripsi artikel terbaru berdasarkan bahasa -->
                        <p class="fs-5">
                            <?= session('lang') === 'en' ? $artikelterbaru[0]->deskripsi_artikel_en : $artikelterbaru[0]->deskripsi_artikel; ?>
                        </p>
                    </div>
                </div>
                <!-- End Artikel Terbaru -->
            </div>

            <div class="col-lg-4">
                <!-- Menampilkan artikel lainnya -->
                <div class="mb-3">
                    <div class="mb-3">
                        <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary title-alsoread" style="text-align: left;">
                            <?php echo lang('Blog.titleAlsoread'); ?>
                        </h5>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                        <?php foreach (array_slice($artikelterbaru, 1) as $artikel_item) : ?>
                            <!-- Membuat seluruh card artikel dapat diklik -->
                            <a href="<?= base_url($lang . '/' . ($lang === 'en' ? 'blogs' : 'blog') . '/' . ($lang === 'en' ? $artikel_item->slug_en : $artikel_item->slug_id)) ?>" class="article-card-link" style="text-decoration: none;">
                                <div class="d-flex align-items-center bg-white mb-3 article-item">
                                    <img class="img-fluid article-image" src="<?= base_url('asset-user/images/' . $artikel_item->foto_artikel); ?>" loading="lazy" alt="<?= $artikel_item->judul_artikel ?>">
                                    <div class="w-100 h-100 d-flex flex-column justify-content-center article-content">
                                        <!-- Menampilkan judul artikel lainnya berdasarkan bahasa -->
                                        <h6 class="m-0 display-7">
                                            <?= session('lang') === 'en' ? $artikel_item->judul_artikel_en : $artikel_item->judul_artikel; ?>
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- End Artikel Lainnya -->
            </div>
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
        background-color: #fccb04;

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
        text-decoration: none;
        /* Pastikan tidak ada garis bawah saat hover */
    }
</style>

<?= $this->endSection('content'); ?>