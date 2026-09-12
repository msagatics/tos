<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Affordable Tanzania Store') ?></title>

    <?php
    $styles = [
        'bootstrap.min.css',
        'style.css',
        'variable.css'
    ];
    foreach($styles as $style): ?>
    <link rel="stylesheet" href="<?= CSS_URL ?>/<?= $style ?>?v=<?= time(); ?>">
    <?php endforeach; ?>
    <link rel="stylesheet" href="<?= ASSETS_URL ?>/bootstrap-icons/bootstrap-icons.min.css">
</head>
<body class="d-flex flex-column min-vh-100">