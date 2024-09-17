<nav id="navbar" class="navbar">
    <ul>
        <li class="">
            <a href="<?= base_url('user/home') ?>" class="nav-link text-left"><?php echo lang('Blog.headerHome'); ?></a>
        </li>
        <li class="">
            <a href="<?= base_url('user/about') ?>" class="nav-link text-left"><?php echo lang('Blog.headerAbout'); ?></a>
        </li>
        <li>
            <a href="<?= base_url('user/produk') ?>" class="nav-link text-left"><?php echo lang('Blog.headerProducts'); ?></a>
        </li>
        <li>
            <a href="<?= base_url('user/aktivitas') ?>" class="nav-link text-left"><?php echo lang('Blog.headerActivities'); ?></a>
        </li>
        <li>
            <a href="<?= base_url('user/contact') ?>" class="nav-link text-left"><?php echo lang('Blog.headerContact'); ?></a>
        </li>
        <li>
            <ul class="dropdown"><a href="#"><?php echo lang('Blog.headerLanguage');?><i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                <li><a href="<?= site_url('lang/en')?>">English</a></li>
                <li><a href="<?= site_url('lang/in')?>">Indonesia</a></li>
                </ul>
            </ul>
        </li>                                      
    </ul>
</nav>