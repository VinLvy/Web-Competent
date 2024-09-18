<div class="container-fluid footer text-white mt-2 pt-2 px-0 position-relative" style="background-color: #040404; background-image: url(''); background-size: cover;">
    <?php foreach ($profil as $footer) : ?>
        <?php
            // Extract phone number from WhatsApp link
            $whatsapp_url = $footer->link_whatsapp;
            preg_match('/\d+/', $whatsapp_url, $matches);
            $phone_number = isset($matches[0]) ? $matches[0] : 'N/A';
        ?>
        <div class="container-fluid text-center text-white border-top mt-2 py-4 px-sm-3 px-md-5">
            <p class="mb-2 text-white">
                <i class="fas fa-phone-alt text-blue"></i>
                <a href="tel:+<?= $phone_number; ?>" class="text-white text-decoration-none"><?= $footer->no_hp; ?></a>
            </p>
            <p class="mb-2 text-white">
                <i class="fas fa-envelope text-blue"></i>
                <a href="mailto:<?= $footer->email; ?>" class="text-white text-decoration-none"><?= $footer->email; ?></a>
            </p>
            <hr style="border: 1px solid #fff; width: 50%; margin: 20px auto;">
            <p class="mb-2 text-white">Copyright &copy;. All Rights Reserved.</p>
            <p class="m-0 text-white">Designed by Luv</p>
        </div>
    <?php endforeach; ?>
</div>
