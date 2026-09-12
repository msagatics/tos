<?php
require_once CONFIG_PATH . '/db.php';
include LAYOUTS_PATH . '/head.php';
include CORE_PATH . '/functions.php';

// Load currency
if (isset($_GET['currency'])) {
    setCurrency($_GET['currency']);
}

?>

<!-- AliExpress Style Responsive Navbar -->
<header class="bg-white shadow-sm sticky-top py-2">
    <div class="container px-2 px-lg-4">

        <!-- Main Header Row -->
        <div class="d-flex align-items-center justify-content-between gap-2 gap-lg-3 py-1">

            <!-- Brand Logo -->
            <a class="navbar-brand fw-bold fs-3 text-dark tracking-tight m-0" href="index.php">
                <span class="text-primary">TA</span>NOS
            </a>

            <!-- Desktop Search Bar -->
            <form action="index.php" method="GET" class="flex-grow-1 mx-lg-4 d-none d-lg-block p-0" style="max-width: 750px;">
                <div class="input-group border border-1 border-dark rounded-pill overflow-hidden bg-white align-items-center">

                    <input type="search" name="search" class="form-control border-0 shadow-none" placeholder="Search products, brands and categories..." aria-label="Search">

                    <button class="btn btn-transparent border-0 text-muted px-2" type="button">
                        <i class="bi bi-qr-code-scan fs-5"></i>
                    </button>

                    <button class="btn btn-dark rounded-circle d-flex me-1 align-items-center justify-content-center" type="submit" style="width: 36px; height: 36px;">
                        <i class="bi bi-search text-white"></i>
                    </button>

                </div>
            </form>

            <!-- Right Actions (1. Person, 2. Cart, 3. Search) -->
            <div class="d-flex align-items-center gap-2 gap-lg-4 text-nowrap">

                <!-- App Link (Desktop Only) -->
                <div class="d-none d-xl-flex align-items-center gap-2">
                    <i class="bi bi-qr-code fs-3 text-dark"></i>
                    <div class="lh-sm">
                        <span class="d-block small fw-bold">Download</span>
                        <span class="d-block text-muted" style="font-size: 0.75rem;">TANOS App</span>
                    </div>
                </div>

                <!-- Currency / Country -->
                <div class="dropdown d-none d-lg-block">

                    <a href="#"
                        class="text-dark text-decoration-none dropdown-toggle d-flex align-items-center gap-1 fw-semibold small"
                        data-bs-toggle="dropdown">

                        <span>
                            <?= getCurrency() === 'USD' ? '🇺🇸' : '🇹🇿' ?>
                        </span>

                        <?= getCurrency() ?>

                    </a>

                    <ul class="dropdown-menu border-0 shadow rounded-3 fs-7">

                        <li>
                            <a class="dropdown-item"
                                href="?currency=TZS">
                                🇹🇿 TZS
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                                href="?currency=USD">
                                🇺🇸 USD
                            </a>
                        </li>

                    </ul>

                </div>

                <!-- 1. Person Icon (Desktop: Dropdown | Mobile: Offcanvas Trigger) -->

                <!-- Mobile Trigger -->
                <button class="btn p-0 border-0 d-lg-none text-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#userAccountMenu">
                    <i class="bi bi-person fs-2"></i>
                </button>

                <!-- Desktop Trigger -->
                <div class="dropdown d-none d-lg-block">
                    <a href="#" class="text-dark text-decoration-none dropdown-toggle d-flex align-items-center gap-2" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person fs-3"></i>
                        <div class="lh-sm text-start">
                            <span class="d-block text-muted" style="font-size: 0.725rem;">Welcome</span>
                            <span class="d-block fw-bold small">Sign in / Register</span>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow rounded-3 p-3 mt-2" style="min-width: 220px;">
                        <li><a class="btn btn-primary w-100 fw-bold btn-sm mb-2" href="login.php">Sign In / Register</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item small py-2" href="#"><i class="bi bi-box-seam me-2"></i>My Orders</a></li>
                        <li><a class="dropdown-item small py-2" href="wishlist.php"><i class="bi bi-heart me-2"></i>Wishlist</a></li>
                    </ul>
                </div>

                <!-- 2. Cart Icon -->
                <a href="cart.php" class="text-dark text-decoration-none d-flex align-items-center gap-2">
                    <div class="position-relative">
                        <i class="bi bi-cart3 fs-3"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark" style="font-size: 0.65rem;">0</span>
                    </div>
                    <span class="fw-bold small d-none d-lg-inline">Cart</span>
                </a>

                <!-- 3. Search Toggle Button (Mobile Only, Far Right) -->
                <button class="btn btn-light border-0 d-lg-none p-1" type="button" data-bs-toggle="collapse" data-bs-target="#mobileSearchBox" aria-expanded="false">
                    <i class="bi bi-list fs-4 text-dark"></i>
                </button>

            </div>
        </div>

        <!-- Collapsible Mobile Search Input -->
        <div class="collapse d-lg-none mt-2" id="mobileSearchBox">
            <form action="index.php" method="GET">

                <div class="input-group border border-1 border-dark rounded-pill overflow-hidden bg-white p-1">

                    <input type="search" name="search" class="form-control border-0 shadow-none px-3 py-1 text-dark" placeholder="Search products, brands..." aria-label="Search">

                    <button class="btn btn-dark rounded-circle p-1 d-flex align-items-center justify-content-center" type="submit" style="width: 32px; height: 32px;">
                        <i class="bi bi-search text-white small"></i>
                    </button>

                </div>
            </form>
        </div>

        <!-- Horizontal Category Scroll Bar -->
        <div class="d-flex align-items-center gap-2 gap-lg-3 overflow-auto text-nowrap pt-2 pb-1 small text-secondary">

            <div class="dropdown">
                <button class="btn btn-light bg-light border-0 rounded-pill px-3 py-1 fw-bold d-flex align-items-center gap-1 small" data-bs-toggle="dropdown">
                    <span>Welcome<i class="bi bi-hand-thumbs-up ms-1"></i></span>
                </button>
            </div>
            h"><
                <div>
                <a href="index.php?deals=1" class="text-danger fw-bold text-decoration-none px-2 py-1">SuperDeals</a>
                <a href="index.php?choice=1" class="text-dark fw-medium text-decoration-none px-2 py-1">Choice</a>
                <a href="#" class="text-dark fw-medium text-decoration-none px-2 py-1">Automotive</a>
                <a href="#" class="text-dark fw-medium text-decoration-none px-2 py-1">Appliances</a>
                <a href="#" class="text-dark fw-medium text-decoration-none px-2 py-1">Women's Clothing</a>
                <a href="#" class="text-dark fw-medium text-decoration-none px-2 py-1">Men's Clothing</a>
                <a href="#" class="text-dark fw-medium text-decoration-none px-2 py-1">Toys & Games</a>
                <a href="#" class="text-dark fw-medium text-decoration-none px-2 py-1">Furniture</a>
                <a href="#" class="text-dark fw-medium text-decoration-none px-2 py-1">Beauty & Health</a>
        </div>

    </div>

    </div>
</header>

<!-- Mobile Account Bottom Sheet / Drawer -->
<div class="offcanvas offcanvas-bottom h-auto rounded-top-1 d-lg-none" tabindex="-1" id="userAccountMenu">
    <!-- <div class="offcanvas-header border-bottom py-3">
        <h5 class="offcanvas-title fw-bold fs-6">Account</h5>
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div> -->
    <div class="offcanvas-body p-4">
        <a href="login.php" class="btn btn-dark w-100 fw-bold py-2 mb-3">Sign In / Register</a>
        <div class="list-group list-group-flush border-0">
            <a href="#" class="list-group-item list-group-item-action border-0 px-0 py-2"><i class="bi bi-box-seam me-2"></i>My Orders</a>
            <a href="wishlist.php" class="list-group-item list-group-item-action border-0 px-0 py-2"><i class="bi bi-heart me-2"></i>Wishlist</a>
        </div>
    </div>
</div>

<script src="<?= JS_URL ?>/bootstrap.bundle.min.js"></script>