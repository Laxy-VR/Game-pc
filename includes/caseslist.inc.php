<a href="/gamepc/index.php?page=addcase" class="add-product-button">Add Product</a>
<?php
try {
    require_once('db/connection.php');
    $query = "SELECT CS_ID, CS_name, CS_Manufacturer, CS_price, CS_img, CS_active FROM pc_case";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() === 0) {
        ?>
        <h1>Cases</h1>
        <?php
    } else {
        ?>
        <div class="product-list">
            <?php
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <div class="product">
                    <a href="/gamepc/index.php?page=case_product_details&id=<?= $row['CS_ID'] ?>">
                        <img src="<?= $row['CS_img'] ?>">
                        <h2><?= $row['CS_name'] ?></h2>
                        <p>Brand: <?= $row['CS_Manufacturer'] ?></p>
                        <p>Price: €<?= $row['CS_price'] ?></p>
                        <p>Active: <?= ($row['CS_active'] == 'Yes' ? 'Yes' : 'No') ?></p>
                    </a>
                    <div class="product-actions">
                        <a href="/gamepc/index.php?page=case_edit&id=<?= $row['CS_ID'] ?>&category=case" class="edit-button">
                            <img src="images/edit.png" alt="Edit">
                        </a>
                        <a href="php/deleteproduct.php?id=<?= $row['CS_ID'] ?>&category=case" class="delete-button">
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
