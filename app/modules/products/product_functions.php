<?php
require_once CONFIG_PATH . "/db.php";

function getProducts()
{
    global $con;

    $products = [];

    if (isset($_GET['category']) && $_GET['category'] !== '') {

        $category = (int) $_GET['category'];

        $sql = "SELECT * FROM products 
                WHERE category_id = ?
                ORDER BY RAND() 
                LIMIT 10";

        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "i", $category);
    } else {

        $sql = "SELECT * FROM products 
                ORDER BY RAND() 
                LIMIT 10";

        $stmt = mysqli_prepare($con, $sql);
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }

    mysqli_free_result($result);
    mysqli_stmt_close($stmt);

    return [
        'products' => $products
    ];
}

function getProductsPaginated()
{
    global $con;

    $limit = 20;
    $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
    $offset = ($page - 1) * $limit;

    // Count products
    $sql = "SELECT COUNT(*) AS total FROM products";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $totalProducts = mysqli_fetch_assoc($result)['total'];

    mysqli_stmt_close($stmt);

    $totalPages = ceil($totalProducts / $limit);

    //Fetch products
    $sql = "SELECT * FROM products ORDER BY RAND() DESC LIMIT ?, ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $offset, $limit);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $products = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
    mysqli_free_result($result);
    mysqli_stmt_close($stmt);

    return [
        'products' => $products,
        'page' => $page,
        'totalPages' => $totalPages
    ];
}

function getProductsByKeyword()
{
    global $con;

    $products = [];

    if (isset($_GET['keyword']) && trim($_GET['keyword']) !== '') {

        $keyword = trim($_GET['keyword']);

        $sql = "SELECT *
                FROM products
                WHERE FIND_IN_SET(?, REPLACE(keywords, ', ', ',')) > 0
                ORDER BY RAND()
                LIMIT 10";

        $stmt = mysqli_prepare($con, $sql);

        if (!$stmt) {
            die("Database error: " . mysqli_error($con));
        }

        mysqli_stmt_bind_param($stmt, "s", $keyword);
    } else {

        // No keyword selected
        $sql = "SELECT *
                FROM products
                ORDER BY RAND()
                LIMIT 10";

        $stmt = mysqli_prepare($con, $sql);

        if (!$stmt) {
            die("Database error: " . mysqli_error($con));
        }
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }

    mysqli_free_result($result);
    mysqli_stmt_close($stmt);

    return [
        'products' => $products
    ];
}
