<?php

if (!defined('ROOT_PATH')) {
    exit('Access denied');
}

$product = getProducts();
$products = $product['products'] ?? [];

?>

<?php foreach ($products as $row): ?>
    <?php
    $id = $row['id'];
    $name = $row['name'];
    $description = $row['description'];
    $price = convertPrice($row['price']);
    $image = $row['image'];
    $image_path = PRODUCTS_UPLOADS_URL . '/';
    ?>
    <div class="col-6 col-lg-5-cols mb-3">
        <div class="card border-0 shadow-sm h-100 overflow-hidden product-card rounded-1">

            <!-- Product Image -->
            <div class="position-relative bg-light overflow-hidden"
                style="aspect-ratio: 1 / 1;">

                <button type="button"
                    class="btn btn-light rounded-circle shadow-sm position-absolute top-0 end-0 m-2 d-flex align-items-center justify-content-center z-2"
                    style="width: 30px; height: 30px; padding: 0;">
                    <i class="bi bi-heart text-dark" style="font-size: .8rem;"></i>
                </button>

                <img src="<?= $image_path . htmlspecialchars($image); ?>"
                    alt="<?= htmlspecialchars($name); ?>"
                    class="w-100 h-100 product-img"
                    style="object-fit: cover;">

            </div>

            <!-- Product Details -->
            <div class="card-body p-2">

                <div class="d-flex align-items-center mb-1">
                    <i class="bi bi-check-circle-fill text-success me-1"
                        style="font-size: .65rem;"></i>
                    <span class="text-success fw-semibold"
                        style="font-size: .65rem;">
                        In Stock
                    </span>
                </div>

                <h6 class="mb-2 text-muted fw-normal text-truncate"
                    title="<?= htmlspecialchars($name); ?>">
                    <?= htmlspecialchars($name); ?>
                </h6>

                <div class="d-flex align-items-center gap-1 product-price-row">

                    <span class="fw-bold text-dark price-text">
                        <?= number_format($price, 2) ?> <?= getCurrency() ?>
                    </span>

                    <a href="index.php?cart=<?= urlencode($id) ?>"
                        class="btn cart-btn d-inline-flex align-items-center justify-content-center gap-1 rounded-pill fw-semibold">
                        <i class="bi bi-cart3"></i>
                        <span>Cart</span>
                    </a>

                </div>

                <!-- Stretched Link -->
                <a href="<?= PRODUCTS_URL ?>/views/product_details.php?product_id=<?= urlencode($id); ?>" class="stretched-link"></a>

            </div>

        </div>

    </div>
<?php endforeach; ?>