<?php

if (!isset($title)) {
    $title = 'Home - Tanzania Online Store';
}

include __DIR__ . '/../app/config/constants.php';
require LAYOUTS_PATH . '/navbar.php';

?>

<div class="container bg-dark text-white rounded-1 overflow-hidden position-relative p-0 my-3" style="height: 350px;">

    <!-- Background Slider -->
    <div id="grocerySlider" class="carousel-fade slide position-absolute top-0 start-0 w-100 h-100" data-bs-ride="carousel" data-bs-interval="6000">
        <div class="carousel-inner h-100">

            <div class="carousel-item active h-100">
                <img src="<?= PRODUCTS_UPLOADS_URL ?>/bread.jpg"
                    class="w-100 h-100 object-fit-cover img-fluid"
                    alt="Fresh groceries"
                    style="filter: blur(1px); opacity: 0.85; transform: scale(1.02);">
            </div>

            <div class="carousel-item h-100">
                <img src="<?= PRODUCTS_UPLOADS_URL ?>/football.jpg"
                    class="w-100 h-100 object-fit-cover img-fluid"
                    alt="Fresh groceries"
                    style="filter: blur(1px); opacity: 0.85; transform: scale(1.02);">
            </div>

            <div class="carousel-item h-100">
                <img src="<?= PRODUCTS_UPLOADS_URL ?>/handbag.jpg"
                    class="w-100 h-100 object-fit-cover img-fluid"
                    alt="Fresh groceries"
                    style="filter: blur(1px); opacity: 0.85; transform: scale(1.02);">
            </div>

        </div>
    </div>

    <!-- Directional Gradient Overlay (Darker behind text, clear on the right) -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
        style="z-index: 1; background: linear-gradient(90deg, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.5) 50%, rgba(0,0,0,0.1) 100%);"></div>

    <!-- Foreground Content -->
    <div class="row h-100 g-0 position-relative" style="z-index: 2;">
        <div class="col-12 col-md-6 ps-4 ps-md-5 py-4 d-flex flex-column justify-content-center h-100">

            <small class="text-light fw-bold tracking-wide">
                FIND IT. LOVE IT. GET IT
            </small>

            <h1 class="fw-bold my-3 display-6 text-white">
                Good Things<br>
                Great Prices.
            </h1>

            <p class="text-light small mb-4" style="max-width: 300px; text-shadow: 0 1px 3px rgba(0,0,0,0.8);">
                Your marketplace for products you'll love, prices you'll appreciate, and discoveries you'll remember.
            </p>

            <div>
                <a href="#" class="btn btn-success rounded-pill px-4 py-1 fw-semibold" style="font-size: .9rem;">
                    SHOP NOW
                    <span class="ms-2">→</span>
                </a>
            </div>

        </div>
    </div>

</div>

<div class="container-fluid min-vh-100 py-4">
    <div class="container p-0">
        <div class="row g-3">

            <!-- Sidebar -->
            <aside class="col-lg-3 col-xl-2 sidebar-sticky d-none d-lg-flex">
                <div class="card border-0 shadow-sm rounded-1 overflow-hidden">

                    <!-- Sidebar Header -->
                    <!-- <div class="card-header rounded-top-1 bg-dark text-white border-0 py-2">
                        <h5 class="mb-0 fw-semibold d-flex align-items-center">
                            <i class="bi bi-shop me-2"></i>
                            Shop
                        </h5>
                    </div> -->

                    <div class="card-body p-0 px-3 pb-3 m-0 ">

                        <hr class="">

                        <!-- Categories -->
                        <div class="mb-4">

                            <div class="d-flex align-items-center mb-2">
                                <span class="fw-bold text-dark">Categories</span>
                            </div>

                            <div class="list-group list-group-flush">

                                <?php getCategories(); ?>

                            </div>
                        </div>

                        <hr class="my-3">

                        <!-- Settings -->
                        <div>
                            <div class="d-flex align-items-center mb-2">
                                <span class="fw-bold text-dark">Account & Support</span>
                            </div>

                            <div class="list-group list-group-flush">

                                <a href=""
                                    class="list-group-item list-group-item-action border-0 rounded-3 px-2 py-2">
                                    <i class="bi bi-box-arrow-in-right me-2 text-secondary"></i>
                                    Sign in
                                </a>

                                <a href=""
                                    class="list-group-item list-group-item-action border-0 rounded-3 px-2 py-2">
                                    <i class="bi bi-credit-card me-2 text-secondary"></i>
                                    Payments
                                </a>

                                <a href=""
                                    class="list-group-item list-group-item-action border-0 rounded-3 px-2 py-2">
                                    <i class="bi bi-chat-dots me-2 text-secondary"></i>
                                    Customer service
                                </a>

                                <a href=""
                                    class="list-group-item list-group-item-action border-0 rounded-3 px-2 py-2">
                                    <i class="bi bi-question-circle me-2 text-secondary"></i>
                                    FAQ
                                </a>

                                <a href=""
                                    class="list-group-item list-group-item-action border-0 rounded-3 px-2 py-2">
                                    <i class="bi bi-telephone me-2 text-secondary"></i>
                                    Contact us
                                </a>

                                <a href=""
                                    class="list-group-item list-group-item-action border-0 rounded-3 px-2 py-2">
                                    <i class="bi bi-truck me-2 text-secondary"></i>
                                    Track Orders
                                </a>

                            </div>
                        </div>

                    </div>
                </div>
            </aside>

            <!-- Products -->
            <main class="col-lg-9 col-xl-10">

                <div class="mb-5">

                    <!-- Header -->

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="fw-bold text-dark fs-3 mb-0">Latest Collection</h2>
                        <a href="index.php?new_arrivals=1" class="text-decoration-none fw-semibold small d-flex align-items-center gap-1" style="color: #d9531e;">
                            View All <i class="bi bi-chevron-right small"></i>
                        </a>
                    </div>

                    <!-- Scrollable keyword Filter Pills -->
                    <div class="d-flex align-items-center gap-2 overflow-auto text-nowrap py-1">

                        <?php
                        $selectedKeyword = strtolower(trim($_GET['keyword'] ?? ''));
                        ?>

                        <!-- All -->
                        <a href="index.php"
                            class="btn rounded-pill px-3 py-1 border-0 small fw-medium"
                            style="background-color: <?= $selectedKeyword === '' ? '#d9531e' : '#f8f9fa'; ?>; color: <?= $selectedKeyword === '' ? '#fff' : '#6c757d'; ?>; font-size: 0.875rem; ">
                            All
                        </a>

                        <?php

                        $keywords = [
                            'shoes'     => 'Shoes',
                            'speaker'   => 'Speakers',
                            'baby'      => 'Baby',
                            'beauty'    => 'Beauty',
                            'phone'     => 'Phones',
                            'car'       => 'Cars',
                            'groceries' => 'Groceries',
                            'home'      => 'Home'
                        ];

                        foreach ($keywords as $keyword => $title):

                            $isSelected = ($selectedKeyword === strtolower($keyword));

                        ?>

                            <a href="index.php?keyword=<?= urlencode($keyword); ?>"
                                class="btn rounded-pill px-3 py-1 small fw-medium border-0"
                                style="
               background-color: <?= $isSelected ? '#d9531e' : '#f8f9fa'; ?>;
               color: <?= $isSelected ? '#fff' : '#6c757d'; ?>;
               font-size: 0.875rem;
           ">
                                <?= htmlspecialchars($title); ?>
                            </a>

                        <?php endforeach; ?>

                    </div>

                </div>

                <!-- Product Grid -->
                <div class="row g-4 mb-4">

                    <?php if (!empty($_GET['keyword'])): ?>

                        <?php
                        // Show products according to keyword
                        include PRODUCTS_PATH . '/views/product_by_keyword.php';
                        ?>

                    <?php else: ?>

                        <?php
                        // Show all/default products
                        include PRODUCTS_PATH . '/views/product_card.php';
                        ?>

                    <?php endif; ?>

                </div>

                <!-- Header -->

                <div class="d-flex justify-content-between align-items-center">

                    <h2 class="fw-bold text-dark fs-3 mb-0">New & Noteworthy</h2>

                    <a href="index.php?new_arrivals=1" class="text-decoration-none fw-semibold small d-flex align-items-center gap-1" style="color: #d9531e;">
                        View All <i class="bi bi-chevron-right small"></i>
                    </a>

                </div>

                <!-- Product Paginated Grid -->
                <div class="row g-4 mt-5">

                    <?php include PRODUCTS_PATH . '/views/product_card_paginated.php'; ?>

                </div>

            </main>

        </div>
    </div>
</div>

<?php include LAYOUTS_PATH . '/footer.php'; ?>