<div class="container-fluid p-0 nav-bar">
    <?php foreach ($profil as $header) : ?>
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 fixed-top">
            <div class="logo" style="margin-left: 20px;">
                <a href="<?= base_url('/') ?>" class="logo">
                    <img src="<?= base_url('asset-user/images/') . $header->logo_perusahaan ?>" alt="<?= $header->nama_perusahaan ?>" class="img-fluid logo-img" style="height: 50px; width: 120px;">
                </a>
            </div>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto p-4">
                    <?php
                    // Ambil bahasa yang disimpan di session
                    $lang = session()->get('lang') ?? 'id'; // Default ke 'id' jika tidak ada di session

                    $current_url = uri_string();

                    // Simpan segmen bahasa saat ini
                    $lang_segment = substr($current_url, 0, strpos($current_url, '/') + 1);

                    // Definisikan tautan untuk setiap halaman berdasarkan bahasa
                    $aboutLink = ($lang_segment === 'en/') ? 'about' : 'tentang-kami';
                    $articleLink = ($lang_segment === 'en/') ? 'blogs' : 'blog';
                    $productLink = ($lang_segment === 'en/') ? 'training-topics' : 'materi-pelatihan';
                    $activitiesLink = ($lang_segment === 'en/') ? 'clients' : 'klien';
                    $contactLink = ($lang_segment === 'en/') ? 'contact' : 'kontak';

                    // Buat array untuk menggantikan segmen berdasarkan bahasa
                    $replace_map = [
                        'tentang-kami' => 'about',
                        'blog' => 'blogs',
                        'materi-pelatihan' => 'training-topics',
                        'klien' => 'clients',
                        'kontak' => 'contact'
                    ];

                    // Ambil bagian dari URL tanpa segmen bahasa
                    $url_without_lang = substr($current_url, strlen($lang_segment));

                    // Tentukan bahasa yang ingin digunakan
                    $new_lang_segment = ($lang_segment === 'en/') ? 'id/' : 'en/';

                    // Gantikan setiap segmen dalam URL berdasarkan bahasa yang aktif
                    foreach ($replace_map as $indonesian_segment => $english_segment) {
                        if ($lang_segment === 'en/') {
                            // Jika bahasa yang dipilih adalah 'en', maka ganti segmen ID ke EN
                            $url_without_lang = str_replace($english_segment, $indonesian_segment, $url_without_lang);
                        } else {
                            // Jika bahasa yang dipilih adalah 'id', maka ganti segmen EN ke ID
                            $url_without_lang = str_replace($indonesian_segment, $english_segment, $url_without_lang);
                        }
                    }

                    // Tautan dengan bahasa yang baru
                    $clean_url = $new_lang_segment . ltrim($url_without_lang, '/');

                    // Tautan Bahasa Inggris
                    $english_url = base_url($clean_url);

                    // Tautan Bahasa Indonesia
                    $indonesia_url = base_url($clean_url);
                    ?>

                    <!-- Link navigasi dengan bahasa yang sedang aktif -->
                    <a href="<?= base_url($lang . '/') ?>" class="nav-item nav-link <?= uri_string() == ($lang . '/') ? 'active' : '' ?>">
                        <?php echo lang('Blog.headerHome'); ?>
                    </a>
                    <a href="<?= base_url($lang . '/' . $aboutLink) ?>" class="nav-item nav-link <?= uri_string() == ($lang . '/' . $aboutLink) ? 'active' : '' ?>">
                        <?php echo lang('Blog.headerAbout'); ?>
                    </a>
                    <a href="<?= base_url($lang . '/' . $articleLink) ?>" class="nav-item nav-link <?= (uri_string() == ($lang . '/' . $articleLink) || strpos(uri_string(), $lang . '/' . $articleLink . '/') === 0) ? 'active' : '' ?>">
                        <?php echo lang('Blog.headerBlogs'); ?>
                    </a>
                    <a href="<?= base_url($lang . '/' . $productLink) ?>" class="nav-item nav-link <?= (uri_string() == ($lang . '/' . $productLink) || strpos(uri_string(), $lang . '/' . $productLink . '/') === 0) ? 'active' : '' ?>">
                        <?php echo lang('Blog.headerTraining'); ?>
                    </a>
                    <a href="<?= base_url($lang . '/' . $activitiesLink) ?>" class="nav-item nav-link <?= (uri_string() == ($lang . '/' . $activitiesLink) || strpos(uri_string(), $lang . '/' . $activitiesLink . '/') === 0) ? 'active' : '' ?>">
                        <?php echo lang('Blog.headerClients'); ?>
                    </a>
                    <a href="<?= base_url($lang . '/' . $contactLink) ?>" class="nav-item nav-link <?= uri_string() == ($lang . '/' . $contactLink) ? 'active' : '' ?>">
                        <?php echo lang('Blog.headerContact'); ?>
                    </a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link drop" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo lang('Blog.headerLanguage'); ?> <i class="fa fa-caret-down"></i>
                        </a>
                        <div class="dropdown-menu text-capitalize" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= $english_url ?>">English</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= $indonesia_url ?>">Indonesia</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    <?php endforeach; ?>
</div>

<style>
    .navbar {
        background-color: #f8f9fa !important;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s;
    }

    .navbar-scrolled {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .nav-link {
        color: #000;
        transition: color 0.3s;

    }

    .nav-link.active {
        position: relative;
        color: #fb0404 !important;
        font-weight: bold;
    }

    .nav-link.active::after {
        content: '';
        display: block;
        width: 100%;
        height: 3px;
        /* background-color: ; */
        position: absolute;
        bottom: -5px;
        left: 0;
    }

    .nav-link:hover {
        color: #fb0404;
    }

    .navbar-toggler {
        border-color: rgba(0, 0, 0, 0.1);
    }

    .dropdown-menu {
        border-radius: 0;
        border-color: #fb0404;
    }

    .dropdown-item {
        color: #444;
    }

    .dropdown-item:hover {
        background-color: #fb0404;
        color: white;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var navbar = document.querySelector('.navbar');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });
    });
</script>