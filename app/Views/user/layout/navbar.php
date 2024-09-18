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
                    <a href="<?= base_url('/') ?>" class="nav-item nav-link <?= uri_string() == '' ? 'active' : '' ?>">
                        <?php echo lang('Blog.headerHome'); ?>
                    </a>
                    <a href="<?= base_url('about') ?>" class="nav-item nav-link <?= uri_string() == 'about' ? 'active' : '' ?>">
                        <?php echo lang('Blog.headerAbout'); ?>
                    </a>
                    <a href="<?= base_url('artikel') ?>" class="nav-item nav-link <?= (uri_string() == 'artikel' || strpos(uri_string(), 'artikel/detail') === 0) ? 'active' : '' ?>">
                        <?php echo lang('Blog.headerBlogs'); ?>
                    </a>
                    <a href="<?= base_url('product') ?>" class="nav-item nav-link <?= (uri_string() == 'product' || strpos(uri_string(), 'product/detail') === 0) ? 'active' : '' ?>">
                        <?php echo lang('Blog.headerTraining'); ?>
                    </a>
                    <a href="<?= base_url('activities') ?>" class="nav-item nav-link <?= uri_string() == 'activities' ? 'active' : '' ?>">
                        <?php echo lang('Blog.headerClients'); ?>
                    </a>
                    <a href="<?= base_url('contact') ?>" class="nav-item nav-link <?= uri_string() == 'contact' ? 'active' : '' ?>">
                        <?php echo lang('Blog.headerContact'); ?>
                    </a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link drop" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo lang('Blog.headerLanguage'); ?> <i class="fa fa-caret-down"></i>
                        </a>
                        <div class="dropdown-menu text-capitalize" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= site_url('lang/en') ?>">English</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= site_url('lang/in') ?>">Indonesia</a>
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
        background-color: ;
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