<a href="/gamepc/index.php?page=add_ram" class="add-product-button">Add Product</a>
<?php
try {
    require_once('db/connection.php');
    $query = "SELECT R_ID, R_name, R_Manufacturer, R_price, R_img, R_active FROM ram";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() === 0) {
        ?>
        <h1>RAM Cards</h1>
        <?php
    } else {
        ?>
        <div class="product-list">
            <?php
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <div class="product">
                    <a href="/gamepc/index.php?page=RAM_product_details&id=<?= $row['R_ID'] ?>">
                        <img src="<?= $row['R_img'] ?>">
                        <h2><?= $row['R_name'] ?></h2>
                        <p>Brand: <?= $row['R_Manufacturer'] ?></p>
                        <p>Price: €<?= $row['R_price'] ?></p>
                        <p>Active: <?= ($row['R_active'] == 'Yes' ? 'Ja' : 'Nee') ?></p>
                    </a>
                    <div class="product-actions">
                        <a href="index.php?page=RAM_edit&id=<?= $row['R_ID'] ?>&category=RAM" class="edit-button">
                            <img src="images/edit.png" alt="Edit">
                        </a>
                        <a href="php/deleteproduct.php?id=<?= $row['R_ID'] ?>&category=ram" class="delete-button">
                            <img src="images/delete.png" alt="Delete">
                        </a>
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
