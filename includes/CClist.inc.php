<a href="/gamepc/index.php?page=CC_add" class="add-product-button">Add Product</a>
<?php
if ($_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
try {
    require_once('db/connection.php');
    $query = "SELECT CC_ID, CC_name, CC_Manufacturer, CC_price, CC_img, CC_active FROM cpu_cooler";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() === 0) {
        ?>
        <h1>CPU Coolers</h1>
        <?php
    } else {
        ?>
        <div class="product-list">
            <?php
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <div class="product">
                    <a href="/gamepc/index.php?page=CC_product_details&id=<?= $row['CC_ID'] ?>">
                        <img src="<?= $row['CC_img'] ?>">
                        <h2><?= $row['CC_name'] ?></h2>
                        <p>Brand: <?= $row['CC_Manufacturer'] ?></p>
                        <p>Price: €<?= $row['CC_price'] ?></p>
                        <p>Active: <?= ($row['CC_active'] == 'Yes' ? 'Yes' : 'No') ?></p>
                    </a>
                    <div class="product-actions">
                        <a href="/gamepc/index.php?page=CC_edit&id=<?= $row['CC_ID'] ?>&category=cpu_cooler" class="edit-button"><img src="images/edit.png" alt="Edit"></a>
                        <a href="php/deleteproduct.php?id=<?= $row['CC_ID'] ?>&category=cpu_cooler" class="delete-button"><img src="images/delete.png" alt="Delete"></a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
