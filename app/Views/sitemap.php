<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitemap - Competent Academy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h1 {
            font-size: 28px;
            color: #222;
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            text-align: center;
            color: #555;
        }
        .sitemap-container {
            display: flex;
            justify-content: space-around;
            max-width: 800px;
            margin: 0 auto;
            gap: 20px;
        }
        .sitemap-section {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
        }
        .sitemap-section h2 {
            font-size: 20px;
            margin-top: 0;
            color: #222;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin: 8px 0;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            color: #0056b3;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h1>Sitemap</h1>
    <p>Berikut adalah daftar halaman yang tersedia di situs kami dalam bahasa Indonesia dan Inggris:</p>

    <div class="sitemap-container">
        <div class="sitemap-section">
            <h2>Bahasa Indonesia</h2>
            <ul>
                <?php foreach ($data as $key => $urls): ?>
                    <?php if (strpos($key, '_id') !== false): ?>
                        <?php if (is_array($urls)): ?>
                            <?php foreach ($urls as $url): ?>
                                <li><a href="<?= $url ?>"><?= $url ?></a></li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li><a href="<?= $urls ?>"><?= $urls ?></a></li>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="sitemap-section">
            <h2>English</h2>
            <ul>
                <?php foreach ($data as $key => $urls): ?>
                    <?php if (strpos($key, '_en') !== false): ?>
                        <?php if (is_array($urls)): ?>
                            <?php foreach ($urls as $url): ?>
                                <li><a href="<?= $url ?>"><?= $url ?></a></li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li><a href="<?= $urls ?>"><?= $urls ?></a></li>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</body>
</html>
