<div class="container-fluid p-0 mb-5">
    <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($tbslider as $key => $slider) : ?>
                <div class="carousel-item <?php echo ($key == 0) ? 'active' : ''; ?>">
                    <img class="w-100 lazyload" src="<?= base_url('asset-user/images/' . $slider->file_foto_slider); ?>"
                        alt="<?= pathinfo($slider->file_foto_slider, PATHINFO_FILENAME); ?>">
                </div>
            <?php endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#blog-carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#blog-carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>