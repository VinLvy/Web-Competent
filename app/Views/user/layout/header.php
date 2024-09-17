<header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                <?php foreach ($profil as $header) :  ?>
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                <a href="<?= base_url('/') ?>" class="logo">
                    <img src="<?= base_url('asset-user/images/') . $header->logo_perusahaan ?>" alt="<?= $header->nama_perusahaan ?>" class="img-fluid logo-img" style="height: 80px; width: 150px;">
                </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li>
                                                <a href="<?= base_url('/') ?>" class="nav-link text-left" data-page="home"><?php echo lang('Blog.headerHome'); ?></a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('about') ?>" class="nav-link text-left" data-page="about"><?php echo lang('Blog.headerAbout'); ?></a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('product') ?>" class="nav-link text-left" data-page="product"><?php echo lang('Blog.headerProducts'); ?></a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('activities') ?>" class="nav-link text-left" data-page="activities"><?php echo lang('Blog.headerActivities'); ?></a></a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('contact') ?>" class="nav-link text-left" data-page="contact"><?php echo lang('Blog.headerContact'); ?></a>
                                            </li>
                                            <li><a href=""><?php echo lang('Blog.headerLanguage');?><i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="<?= site_url('lang/en')?>">En</a></li>
                                                    <li><a href="<?= site_url('lang/in')?>">In</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                                <div class="social_wrap d-flex align-items-center justify-content-end">
                                    <div class="number">
                                        <p> <i class="fa fa-phone"></i><?= $header->no_hp; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;  ?>
                </div>
            </div>
        </div>
    </header>