<?php
require_once CONFIG_PATH . "/db.php";

function getCategories()
{
    global $con;

    $icons = [
        'Electronics'            => 'bi-tv',
        'Fashion'                => 'bi-bag',
        'Beauty & Personal Care' => 'bi-heart-pulse',
        'Home & Living'          => 'bi-house',
        'Automotive & Vehicles'  => 'bi-car-front',
        'Sports & Outdoors'      => 'bi-bicycle',
        'Groceries & Food'       => 'bi-basket',
        'Agriculture'            => 'bi-flower1',
        'Baby & Kids'            => 'bi-controller'
    ];

    $sql = "SELECT id, title FROM categories";

    $stmt = mysqli_prepare($con, $sql);

    if (!$stmt) {
        die("Database error: " . mysqli_error($con));
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {

        $id = $row['id'];
        $title = trim($row['title']);
        $icon = $icons[$title] ?? 'bi-grid';

?>

        <a href="index.php?category=<?= urlencode($id); ?>"
            class="list-group-item list-group-item-action border-0 rounded-3 px-2 py-2">

            <i class="bi <?= htmlspecialchars($icon, ENT_QUOTES, 'UTF-8'); ?> me-2 text-secondary"></i>

            <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>

        </a>

<?php
    }
    mysqli_stmt_close($stmt);
}
?>